<?php

	class NotificationsController extends AppController
	{
		public $uses = array('Message', 'Document', 'Evenement');
		
		public function beforeFilter() {
			parent::beforeFilter();
		}
		
		public function index()
		{
			$d['messages'] = $this->Message->findNewMessages($this->Auth->user('id'));
			$d['documents'] = $this->Document->findNewDocuments($this->Auth->user('last_login'));
			$d['evenements'] = $this->Evenement->findNewEvenements($this->Auth->user('id'));
			$this->set($d);
		}
	}