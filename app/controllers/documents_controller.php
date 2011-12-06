<?php
class DocumentsController extends AppController
{
	var $name = 'Documents';
	var $uses = array('Document');

	function presenter($id) 
	{
		$mod['docs'] = $this->Document->find('all', array('conditions' => array('Document.module_id' => $id), 'recursive' => 1));
		$mod['abre'] = $this->Document->find('first', array('conditions' => array('Document.module_id' => $id), 'recursive' => 1));
		
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