<?php
class PersonnesController extends AppController
{
	var $name = "Personnes";
	var $uses = array('Personne', 'Statut');
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function connexion() {
	}
	
	function deconnexion() {
		$this->redirect($this->Auth->logout());
	}

	function edition($id)
	{
		if ($this->Auth->user('id') != $id)
		{
			$this->Session->setFlash('Vous ne pouvez pas modifier le profil d\'une autre personne', 'message');
			$this->redirect(array('action' => 'edition', $this->Auth->user('id')));
		}
		if(!empty($this->data))
		{
			$this->Personne->set($this->data);
			if ($this->Personne->validates()) 
			{
				$this->Personne->save();
				$this->Session->setFlash('Modifications enregistrées.', 'message', array('class' => 'success'));
			}
			else
				$this->Session->setFlash('Le formulaire comporte des erreurs !', 'message');	
		}
		else
		{
			$this->Personne->recursive = -1;
			$this->data = $this->Personne->findById($id);
		}
	}

	function index() {
	}

	function annuaire() {
		if (!isset($this->data) || (isset($this->data) && $this->data['Personne']['rech']==""))
		{
			if (!isset($this->data) || (isset($this->data) && $this->data['Personne']['statut']==""))
			{ 
				$d['statut'] = ""; 
				$d['personne'] = $this->Personne->find('all');
			}
			else
			{
				$d['statut'] = $this->data['Personne']['statut'];
				$d['personne'] = $this->Personne->find('all', array('conditions'=>array('Personne.statut_id'=>$d['statut']), 'recursive'=>-1)); 
			}
			
		}
		else
		{
			$d['statut'] = $this->data['Personne']['statut'];
			if ($d['statut']=="")
				$d['personne'] = $this->Personne->find('all', array('conditions'=>array(
					'OR'=>array(
						'Personne.nom LIKE'=>'%'.$this->data['Personne']['rech'].'%',
						'Personne.prenom LIKE'=>'%'.$this->data['Personne']['rech'].'%')
					 ), 
					'recursive'=>-1));
			else
				$d['personne'] = $this->Personne->find('all', array('conditions'=>array(
					'Personne.statut_id'=>$d['statut'], 
					'OR'=>array(
						'Personne.nom LIKE'=>'%'.$this->data['Personne']['rech'].'%',
						'Personne.prenom LIKE'=>'%'.$this->data['Personne']['rech'].'%')
					 ), 
					'recursive'=>-1));
		}
		$d['statuts'] = $this->Statut->find('list');	//pour le select
		$this->set($d);
	}
}

?>