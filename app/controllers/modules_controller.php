<?php
class ModulesController extends AppController
{

	var $name = 'Modules';

	function index()
	{
		$m['modules'] = $this->Module->find('all');

		$this->set($m);
	}


	function editer($id='') {
		$m['modules'] = $this->Module->find('all', array('conditions' => array('Module.id' => $id)));
		
		$this->set($m);
	}
}
?>