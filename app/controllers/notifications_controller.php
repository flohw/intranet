<?php

	class NotificationsController extends AppController
	{
		public $uses = array('Message', 'Document', 'Evenement');
		
		public function beforeFilter() { parent::beforeFilter(); }
		
		// Récupération des évènements non lus (tous)
		public function index()
		{
			$d['messages'] = $this->Message->findNewMessages($this->Auth->user('id'));
			$d['documents'] = $this->Document->findNewDocuments($this->Auth->user('last_login'), $this->Auth->user('id'));
			$this->set($d);
		}
	}