<?php 

class EvenementsController extends AppController
{
	var $name ='Evenements';
	var $uses = array('Evenement', 'TypeEvenement');

	//Edtion/Ajout d'un évènement (Professeur)
	function index ($id = null)
	{
		if (isset($this->data) AND $this->Auth->user('statut_id') >= $this->statuts['prof'])
		{
			$personnes = explode(',', $this->data['Evenement']['personnes']);
			$personnes = $this->Evenement->Personne->findDisplayName($personnes);
			if (!$personnes['all'])
				$this->Session->setFlash('Certains utilisateurs n\'existent pas, vérifiez les noms', 'message');
			else
			{
				$this->data['Evenement']['personne_id'] = $this->Auth->user('id');
				$this->Evenement->set($this->data);
				if ($this->Evenement->validates())
				{
					$this->Evenement->save();
					$this->Evenement->EvenementsPersonne->deleteAll(array('evenement_id' => $this->Evenement->id));
					foreach ($personnes['personnes'] as $id => $p)
					{
						$this->Evenement->EvenementsPersonne->id = null;
						$d['EvenementsPersonne']['personne_id'] = $id;
						$d['EvenementsPersonne']['evenement_id'] = $this->Evenement->id;
						$this->Evenement->EvenementsPersonne->save($d, array('validate' => false));
					}
					$this->Session->setFlash('L\'évènement a bien été ajouté', 'message', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				}
				else
					$this->Session->setFlash('L\'évènement est incorrect', 'message');
			}
		}
		elseif (!isset($this->data) AND !is_null($id) AND $this->Auth->user('statut_id') >= $this->statuts['prof'])
			$this->data = $this->Evenement->findEvenement($id);
		
		
		if ($this->Auth->user('statut_id') >= $this->statuts['admin'])
			$d['evenements'] = $this->Evenement->findEvenement();
		else
			$d['evenements'] = $this->Evenement->findNewEvenements($this->Auth->user('display'), $this->Auth->user('id'));
		$d['personnes'] = $this->Evenement->Personne->find('list');
		$d['groupes'] = $this->Evenement->Personne->Groupe->getGroupeList('list');
		$d['type'] = $this->TypeEvenement->find('list');
		$this->set($d);
	}
	
	// Ajoute un évènement pour un groupe (Profs)
	public function groupe ($id = null)
	{
		if ($this->Auth->user('statut_id') < $this->statuts['prof'])
		{
			$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
			$this->redirect($this->referer());
		}
		if (isset($this->data))
		{
			unset($this->Evenement->validate['personnes']);
			$this->Evenement->validate['groupes'] = $this->Evenement->validGroupe['groupes'];
			$this->data['Evenement']['personne_id'] = $this->Auth->user('id');
			$this->Evenement->set($this->data);
			if ($this->Evenement->validates())
			{
				$groupes = explode(',', $this->data['Evenement']['groupes']);
				$personnes = $this->Evenement->Personne->Groupe->findDisplayName($groupes);
				if (!$personnes['all'])
					$this->Session->setFlash('Certains groupes n\'existent pas, vérifiez les groupes', 'message');
				elseif (empty($personnes['personnes']))
					$this->Session->setFlash('Il n\'y a personne dans ce groupe', 'message');
				else
				{
					$this->Evenement->save();
					$this->Evenement->EvenementsPersonne->deleteAll(array('evenement_id' => $this->Evenement->id));
					foreach ($personnes['personnes'] as $id => $p)
					{
						$this->Evenement->EvenementsPersonne->id = null;
						$d['EvenementsPersonne']['personne_id'] = $id;
						$d['EvenementsPersonne']['evenement_id'] = $this->Evenement->id;
						$this->Evenement->EvenementsPersonne->save($d, array('validate' => false));
					}
					$this->Session->setFlash('L\'évènement a été ajouté', 'message', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				}
			}
			else
				$this->Session->setFlash('L\'évènement est incorrect', 'message');
		}
		if ($this->Auth->user('statut_id') >= $this->statuts['admin'])
			$d['evenements'] = $this->Evenement->findEvenement();
		else
			$d['evenements'] = $this->Evenement->findNewEvenements($this->Auth->user('login'), $this->Auth->user('id'));
		$d['personnes'] = $this->Evenement->Personne->find('list');
		$d['groupes'] = $this->Evenement->Personne->Groupe->getGroupeList('list');
		$d['type'] = $this->TypeEvenement->find('list');
		$this->set($d);
		$this->render('index');
	}
	
	public function voir ($id)
	{
		$d['e'] = $this->Evenement->findEvenementByIdPers($id, $this->Auth->user('id'));
		if (empty($d['e']))
		{
			$this->Session->setFlash('Vous n\'êtes pas convié à cet évènement ou il n\'existe pas', 'message');
			$this->redirect($this->referer());
		}
		$this->set($d);
	}
	
	public function supprimer ($id)
	{
		if ($this->Auth->user('statut_id') < $this->statuts['prof'])
		{
			$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page', 'message');
			$this->redirect(array('action' => 'index'));
		}
		$this->Evenement->recursive = -1;
		$e = $this->Evenement->findById($id);
		if (empty($e) OR $e['Evenement']['personne_id'] != $this->Auth->user('id'))
		{
			$this->Session->setFlash('Vous n\'avez pas le droit de supprimer cet évènement', 'message');
			$this->redirect($this->referer());
		}
		$this->Evenement->EvenementsPersonne->deleteAll(array('evenement_id' => $id));
		$this->Evenement->delete($id);
		$this->Session->setFlash('L\'évènement a été supprimé !', 'message', array('class' => 'success'));
		$this->redirect($this->referer());
	}
	

}

?>