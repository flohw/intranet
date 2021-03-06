<?php
class PersonnesController extends AppController
{
	var $name = "Personnes";
	var $uses = array('Personne', 'Statut');
	var $paginate = array('Personne' => array('limit' => 10));
	var $components = array('RequestHandler');
	var $helpers = array('Paginator', 'Js');
	
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
			$this->data['Personne']['mot_de_passe'];
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
		if(isset($this->data))
		{
			if (empty($this->data['Personne']['id']))
				$this->data['Personne']['last_login'] = date('Y-m-d H:i:s');
			$this->Personne->set($this->data);
			if ($this->Personne->validates()) 
			{
				if (empty($this->data['Personne']['id']))
				{
					$mdp = '';
					$caracteres = array_rand($this->caracteres, 8);
					foreach($caracteres as $i)
						$mdp .= $this->caracteres[$i];
					$this->data['Personne']['mot_de_passe'] = $this->Auth->password($mdp);
					$pers = ucwords($this->data['Personne']['prenom']).' '.strtoupper($this->data['Personne']['nom']).':';
					$pers.= $mdp.':'.$this->data['Personne']['login']."\n";
					$f = fopen(WWW_ROOT.'files/groupes/'.$this->data['Personne']['groupe_id'].'.txt', 'a');
					if ($f === false)
						$this->Session->setFlash('Le fichier n\'a pas pût être ouvert ou créé, réessayez', 'message');
					else
					{
						fwrite($f, $pers);
						fclose($f);
					}
				}
				$this->Personne->set($this->data);
				$this->Personne->save();
				$this->Session->setFlash('Modifications enregistrées.', 'message', array('class' => 'success'));
				$this->redirect(array('controller' => 'groupes', 'action' => 'index', $this->data['Personne']['groupe_id']));
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
			if (empty($this->data) AND !is_null($id))
				$this->redirect(array('action' => 'edition', $this->Auth->user('id')));
		}
		$d['depts'] = $this->Personne->Departement->find('list');
		$d['statuts'] = $this->Statut->find('list');
		$d['groupes'] = $this->Personne->Groupe->getGroupeList(true);
		$this->set($d);
	}
	
	// Annuaire des personnes enregistrées
	function annuaire($nom = null, $statut = null)
	{
		$this->Personne->recursive = -1;
		$d['personne'] = $this->paginate('Personne');
		if (!is_null($nom))
		{
			$this->data['Personne']['rech'] = ($nom == '~') ? '' : $nom;
			$this->data['Personne']['statut'] = $statut;
		}
		if (isset($this->data))
		{
			
			$st = $this->data['Personne']['statut'];
			if (empty($this->data['Personne']['statut']))
			{
				$st = $this->Personne->Statut->find('list');
				foreach ($st as $k => $s)
					$st[$k] = $k;
			}
			$this->paginate = array('Personne' => array(
				'limit' => 10,
				'conditions' => array(
					'Personne.statut_id' => $st,
					'OR' => array(
						'Personne.nom LIKE' => '%'.$this->data['Personne']['rech'].'%',
						'Personne.prenom LIKE' => '%'.$this->data['Personne']['rech'].'%',
					),
				),
			));
			$d['personne'] = $this->paginate('Personne');
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