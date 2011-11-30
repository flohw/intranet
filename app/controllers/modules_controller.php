<?php
class ModulesController extends AppController
{
	var $name = 'Modules';
	var $uses = array('Module', 'LibelleModule', 'Document');

	function index($sem=1)
	{
		$m['modules'] = $this->LibelleModule->modulesBySem($sem);
		$m['semestre'] = $this->Module->Semestre->find('first', array('conditions' => array('Semestre.id' => $sem), 'recursive' =>-1));
		$this->set($m);
	}

	function gestion()
	{
		$m['modules'] = $this->Module->find('all');

		$this->set($m);
	}

	function editer($id='') 
	{
		$m['modules'] = $this->Module->find('all', array('conditions' => array('Module.id' => $id)));
		$this->set($m);
	}
}
?>