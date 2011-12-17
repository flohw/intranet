<?php
class PersonnesController extends AppController
{
	var $name = "Personnes";
	var $uses = array('Personne', 'Statut');
	
	function beforeFilter() { $this->Auth->autoRedirect = false; parent::beforeFilter(); }
	
	function connexion()
	{
		if (isset($this->data))
		{	// Si on veut rester connecter, on crée les cookies
			if ($this->data['Personne']['autoconnect'] == 1)
			{
				$this->Cookie->write('Personne.login', $this->data['Personne']['login']);
				$this->Cookie->write('Personne.mot_de_passe', $this->data['Personne']['mot_de_passe']);
			}
			// Si la connexion a réussi, on met à jour la date de derniere connexion
			if ($this->Auth->login())
			{
				$this->Personne->id = $this->Auth->user('id');
				$this->Personne->saveField('last_login', date('Y-m-d H:i:s'));
				$this->redirect($this->Auth->loginRedirect);
			}
		}
		elseif ($this->Auth->user('id'))
			$this->redirect(array('controller' => 'pages', 'action' => 'display', 'personnes_home'));
		
	}
	
	function deconnexion()
	{
		Cache::delete('notifs', 'notifs');
		$this->Cookie->delete('Personne');
		$this->Cookie->destroy('Personne');
		$this->redirect($this->Auth->logout());
	}
	
	function editme ()
	{
		if (isset($this->data))
		{
			$this->data['Personne']['id'] = $this->Auth->user('id');
			$this->Personne->set($this->data);
			$this->Personne->validate = $this->Personne->validEleve;
			if ($this->Personne->validates())
			{
				$d['Personne']['id'] = $this->data['Personne']['id'];
				$d['Personne']['mot_de_passe'] = $this->Auth->password($this->data['Personne']['mot_de_passe_change']);
				$this->Personne->save($d, false);
				$this->Session->setFlash('Le mot de passe a bien été changé', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'annuaire'));
			}
			else
			{
				$this->data['Personne'] = array();
				$this->Session->setFlash('Il y a une erreur dans le formulaire', 'message');
			}
		}
	}
	
	// Edition d'un profil (admin)
	function edition($id = null)
	{
		if ($this->Auth->user('statut_id') < $this->statuts['admin'])
		{
			$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
			$this->redirect($this->referer());
		}
		$id = (is_null($id)) ? $this->Auth->user('id') : $id;
		if(isset($this->data))
		{
			$this->Personne->set($this->data);
			if ($this->Personne->validates()) 
			{
				$this->Personne->save();
				$this->Session->setFlash('Modifications enregistrées.', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'annuaire'));
			}
			else
			{
				$this->Session->setFlash('Le formulaire comporte des erreurs !', 'message');	
				$this->data['Personne']['mot_de_passe'] = null;
			}
		}
		else
		{
			$this->Personne->recursive = -1;
			$this->data = $this->Personne->findById($id);
			if (empty($this->data))
				$this->redirect(array('action' => 'edition', $this->Auth->user('id')));
		}
		$d['depts'] = $this->Personne->Departement->find('list');
		$d['statuts'] = $this->Statut->find('list');
		$d['groupes'] = $this->Personne->Groupe->find('list');
		$this->set($d);
	}
	
	// Annuaire des personnes enregistrées
	function annuaire()
	{
		$this->Personne->recursive = -1;
		$d['personne'] = $this->Personne->find('all');
		if (isset($this->data))
		{
			$st = $this->data['Personne']['statut'];
			if (empty($this->data['Personne']['statut']))
			{
				$st = $this->Personne->Statut->find('list');
				foreach ($st as $k => $s)
					$st[$k] = $k;
			}
			$d['personne'] = $this->Personne->find('all', array('conditions' => array(
						'Personne.statut_id' => $st,
						'OR'=>array(
							'Personne.nom LIKE'=>'%'.$this->data['Personne']['rech'].'%',
							'Personne.prenom LIKE'=>'%'.$this->data['Personne']['rech'].'%'
						)
					),
				)
			);
			if(empty($d['personne']))
				$this->Session->setFlash('Aucun résultat n\'a été trouvé', 'message');
		}

		$d['statuts'] = $this->Statut->find('list');
		$this->set($d);
	}
	
	// Suppression d'un profil (admin)
	function supprimer($id)
	{
		if ($this->Auth->user('statut_id') < $this->statuts['admin'])
		{
			$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
			$this->redirect($this->referer());
		}
		$this->Personne->Absence->deleteAll(array('personne_id' => $id), true);
		$this->Personne->Document->deleteAll(array('personne_id' => $id), true);
		$this->Personne->Message->deleteAll(array('or' => array('personne_id' => $id, 'destinataire_id' => $id)), true);
		$this->Personne->Evenement->deleteAll(array('personne_id' => $id));
		$this->Personne->ModulesPersonne->deleteAll(array('personne_id' => $id));
		$this->Personne->deleteAll(array('Personne.id' => $id), true);
		$this->redirect(array('action' => 'annuaire'));
	}

}
?>