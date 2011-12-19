<?php
class DepartementsController extends AppController
{

	var $name = 'Departements';
	
	public function beforeFilter() { parent::beforeFilter(); }
	
	// Edtion/Ajout d'un département (Admin)
	function editer($id = NULL)
	{
		if ($this->Auth->user('statut_id') < $this->statuts['admin'])
		{
			$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
			$this->redirect($this->referer());
		}
		
		if (isset($this->data))
		{
			$this->Departement->set($this->data);
			if ($this->Departement->validates())
			{
				$this->Departement->save();
				$this->Session->setFlash('Département sauvegardé !', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'editer'));
			}
			else
				$this->Session->setFlash('Le département est incorrect', 'message');
		}
		else
			$this->data = $this->Departement->find('first', array('recursive' => -1, 'conditions' => array('id' => $id)));
		
		$d['departements'] = $this->Departement->find('list');
		$d['action'] = (is_null($id)) ? 'ajouter' : 'editer';
		$this->set($d);
	}
}

?>