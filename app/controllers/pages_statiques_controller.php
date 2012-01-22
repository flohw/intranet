<?php

	class PagesStatiquesController extends AppController
	{
		var $name = 'PagesStatiques';
		var $uses = array('DocumentsStatique', 'PagesStatique');
		public function beforeFilter() { parent::beforeFilter(); }
		
		public function index($page)
		{
			$p['p'] = $this->PagesStatique->findById($page);
			if (empty($p['p']))
			{
				$this->Session->setFlash('Cette page n\'existe pas', 'message');
				$this->redirect($this->referer());
			}
			$this->set($p);
		}
		
		public function editer ($page)
		{
			if ($this->Auth->user('statut_id') < $this->statuts['prof'])
			{
				$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page', 'message');
				$this->redirect($this->referer());
			}
			if (isset($this->data))
			{
				$this->PagesStatique->set($this->data);
				if ($this->PagesStatique->validates())
				{
					$this->PagesStatique->save();
					$this->Session->setFlash('La page a été enregistrée', 'message', array('class' => 'success'));
					$this->redirect(array('action' => 'index', $this->PagesStatique->id));
				}
				else
					$this->Session->setFlash('La page comporte des erreurs', 'message');
			}
			else
			{
				$this->data = $this->PagesStatique->findById($page);
				if (empty($this->data))
				{
					$this->Session->setFlash('Cette page n\'existe pas', 'message');
					$this->redirect($this->referer());
				}
			}
		}
	}