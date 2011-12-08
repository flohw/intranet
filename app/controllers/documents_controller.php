<?php
class DocumentsController extends AppController
{
	var $name = 'Documents';
	var $uses = array('Document', 'Module');

	function presenter($id) 
	{
		$mod['abre'] = $this->Module->find('first', array('conditions' => array('Module.id' => $id), 'recursive' => 1));
		$mod['docs'] = $this->Document->find('all', array('conditions' => array('Document.module_id' => $id), 'recursive' => 1));
		// Mise à jour du cache des notifications
		$r = array();
		$notifs = Cache::read('notifs', 'notifs');
		foreach ($mod['docs'] as $d)
		{
			if (in_array($d['Document']['id'], $notifs['documents']))
			{
				unset($notifs['documents'][$d['Document']['id']]);
				$notifs['total'] = $notifs['total'] - 1;
			}
		}
		Cache::write('notifs', $notifs, 'notifs');
		$this->set($mod);
	}		
}
?>