<?php
class ModulesController extends AppController
{
	var $name = 'Modules';
	var $uses = array('Module', 'LibelleModule');

	function index($sem=1)
	{
		$m['modules'] = $this->LibelleModule->modulesBySem($sem);
		$m['semestre'] = $this->Module->Semestre->find('first', array('conditions' => array('Semestre.id' => $sem), 'recursive' =>-1));
		$this->set($m);
	}

	function editer($id=null) 
	{
		if (isset($this->data)) {
			$this->Module->set($this->data);
			if ( $this->Module->validates()) {
				$this->Module->save();
				$this->Session->setFlash('Module enregistré !', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else
				$this->Session->setFlash('Le module n\'a pas pu etre enregistre', 'message');
		}
		else 
			$this->data = $this->Module->find('first', array('conditions' => array('Module.id' => $id)));

		
		$d['sem'] = $this->Module->Semestre->find('list');
		$d['libel'] = $this->LibelleModule->find('list');
		$this->set( $d);
		
	}
}
?>