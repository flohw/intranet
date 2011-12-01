<?php
class DocumentsController extends AppController
{
	var $name = 'Documents';
	var $uses = array('Document');

	function presenter($id) 
	{
		$mod['docs'] = $this->Document->find('all', array('conditions' => array('Document.module_id' => $id), 'recursive' => 1));
		$mod['abre'] = $this->Document->find('first', array('conditions' => array('Document.module_id' => $id), 'recursive' => 1));
		$this->set($mod);
	}		
}
?>