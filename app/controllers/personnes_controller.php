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
		$this->Personne->recursive = -1;
		$this->data = $this->Personne->findById($id);
	}

	function index() {
		$statuts = $this->Statut->find('all');
		return $statuts;
	}

	function annuaire($statut='') {
		if (!isset($this->data) || (isset($this->data) && $this->data['Personne']['rech']==""))
		{
			if (!isset($this->data))
			{
			$d['statut'] = $statut;	
			$d['personne'] = $this->Personne->find('all', array('conditions'=>array('Personne.statut_id'=>$statut), 'recursive'=>-1));
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
			$d['personne'] = $this->Personne->find('all', array('conditions'=>array(
				'Personne.statut_id'=>$d['statut'], 
				'OR'=>array(
					'Personne.nom LIKE'=>'%'.$this->data['Personne']['rech'].'%',
					'Personne.prenom LIKE'=>'%'.$this->data['Personne']['rech'].'%')
				 ), 
				'recursive'=>-1));
		}
		$this->set($d);
	}
}

?>