<?php

	class NotificationsController extends AppController
	{
		public $uses = array('Message', 'Document', 'Evenement');
		
		public function beforeFilter() {
			parent::beforeFilter();
		}
		
		public function index($id)
		{
			$d['messages'] = $this->Message->findNewMessages($id);
			$d['documents'] = $this->Document->findNewDocuments($this->Auth->user('last_login'));
			$d['evenements'] = $this->Evenement->findNewEvenements($id, $this->Auth->user('last_login'));
			$this->set($d);
		}
	}