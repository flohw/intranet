<?php
class SemestresController extends AppController
	{
		public $name = 'Semestres';
		public $uses = array('Semestre');
		
		public function beforeFilter() { parent::beforeFilter(); }
		
		public function index ($id = null)
		{
			if ($this->Auth->user('statut_id') < $this->statuts['admin'])
			{
				$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
				$this->redirect($this->referer());
			}
			
			$this->Semestre->recursive = -1;
			if (isset($this->data))
			{
				$this->Semestre->set($this->data);
				if ($this->Semestre->validates())
				{
					$this->Semestre->save();
					$this->Session->setFlash('Le semestre a bien été enregistré', 'message', array('class' => 'success'));
					$this->data = array();
				}
				else
					$this->Session->setFlash('Le semestre est invalide', 'message');
			}
			elseif (!is_null($id) AND !isset($this->data))
				$this->data = $this->Semestre->findById($id);
				
			$d['semestres'] = $this->Semestre->find('all');
			$this->set($d);
		}
		
		// Récupération de la liste des semestres (tous)
		public function getSemestres() {
			return $this->Semestre->find('all', array('recursive' => -1));
		}
	}