<?php

	class MessagesController extends AppController
	{
		public $name = 'Messages';
		public $uses = array('Message', 'Personne', 'MessagesPersonne');
		
		public function beforeFilter() { parent::beforeFilter(); }
		
		public function index()
		{
			
		}
		
		public function envoyes ()
		{
			$d['messages'] = $this->Message->find('all', array(	'conditions' => array('personne_id' => $this->Auth->user('id')),
																'recursive' => -1,
																'order' => 'titre'));
			$this->set($d);
		}
		
		public function message ($id)
		{
			$d['message'] = $this->Message->find('first', array('conditions' => array(	'destinataire_id' => $this->Auth->user('id'),
																						'Message.id' => $id), 'recursive' => 0));
			if (empty($d['message']))
			{
				$this->Session->setFlash('Le message ne vous appartient pas', 'message');
				$this->redirect(array('action' => 'index'));
			}
			
			$this->set($d);
		}
		
		public function nouveau ()
		{
			
		}
	}