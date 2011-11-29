<?php
class ModulesController extends AppController
{

	var $name = 'Modules';

	function presentation_s1($sem=1) {
		$m['modules'] = $this->Module->find('all', array('conditions' => array('Module.semestre_id' => $sem), 'recursive' => -1)); /* , 'group' => array('Module.libelle_module_id')*/
		$this->set($m);
	}

	function gestion()
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