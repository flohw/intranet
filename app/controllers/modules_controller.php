<?php
class ModulesController extends AppController
{
	var $name = 'Modules';
	var $uses = array('Module', 'LibelleModule');
	
	public function beforeFilter ()
	{
		parent::beforeFilter();
		if ($this->Auth->user('statut_id') < $this->statuts['prof'])
		{
			$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
			$this->redirect($this->referer());
		}
	}
	
	// Liste des modules en fonction du semestre (tous)
	function index($sem=1)
	{
		$m['myMod'] = $this->Module->findModules($this->Auth->user('id'));
		$m['modules'] = $this->LibelleModule->modulesBySem($sem);
		$m['semestre'] = $this->Module->Semestre->find('first', array('conditions' => array('Semestre.id' => $sem), 'recursive' =>-1));
		$this->set($m);
	}
	
	// Editer un module (nb heures, coef...) (Prof qui sont responcable du module)
	function editer($id=null) 
	{
		if (isset($this->data))
		{
			$this->data['Personne']['id'] = $this->Auth->user('id');
			$this->Module->set($this->data);
			if ( $this->Module->validates())
			{
				$this->Module->saveAll();
				$this->Session->setFlash('Module enregistré !', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else
				$this->Session->setFlash('Le module n\'a pas pu être enregistré', 'message');
		}
		else
		{
			if (!is_null($id) AND !in_array($this->Auth->user('login'), $this->Module->findProfsModule($id)))
			{
				$this->Session->setFlash('Vous n\'avez pas le droit de gérer un module dont vous n\'êtes pas responçcable', 'message');
				$this->redirect($this->referer());
			}
			$this->data = $this->Module->find('first', array('conditions' => array('Module.id' => $id)));
		}

		
		$d['sem'] = $this->Module->Semestre->find('list');
		$d['libel'] = $this->LibelleModule->find('list');
		$this->set( $d);
		
	}
	
	// Edition d'un libellé de module (admin)
	function editmod($id = null)
	{
		if ($this->Auth->user('statut_id') < $this->statuts['admin'])
		{
			$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
			$this->redirect($this->referer());
		}
		if (isset($this->data))
		{
			$this->LibelleModule->set($this->data);
			if ( $this->LibelleModule->validates())
			{
				$this->LibelleModule->save();
				$this->Session->setFlash('Libellé enregistré !', 'message', array('class' => 'success'));
				if ($id != null) 
					$this->redirect(array('action' => 'index'));
				else
					$this->redirect(array('action' => 'editer'));
			}
			else
				$this->Session->setFlash('Le libellé n\'a pas pu être enregistré', 'message');
		}
		elseif ($id != null)
			$this->data = $this->LibelleModule->find('first', array('conditions' => array('LibelleModule.id' => $id)));
	}
}
?>