<?php

	class NotesController extends AppController
	{
		public $uses = array('Note');
		
		public function beforeFilter() { parent::beforeFilter(); }
		
		public function index ()
		{
			if ($this->Auth->user('statut_id') < $this->statuts['prof'])
			{
				$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
				$this->redirect($this->referer());
			}
			if (isset($this->data))
			{
				$data = $this->data['Note'];
				$data['module'] = explode('-', $this->data['Note']['module']);
				$data['type_module'] = $data['module'][0];
				$data['module'] = $data['module'][1];
				$this->redirect(array('action' => 'ajouter', $data['groupe'], $data['module'], $data['type_module']));
			}
			$d['groupes'] = $this->Note->Personne->Groupe->getGroupeList();
			$this->Note->ModulesTypeModule->bindModel(array('belongsTo' => array('Module' => array('className' => 'Module', 'foreignKey' => 'module_id'))));
			$d['modules'] = $this->Note->ModulesTypeModule->Module->findModuleType($this->Auth->user('id'));
			$this->set($d);
		}
		
		public function ajouter ($idGroupe, $idModule, $idTypeModule)
		{
			if ($this->Auth->user('statut_id') < $this->statuts['prof'])
			{
				$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
				$this->redirect($this->referer());
			}
			$this->Note->Personne->recursive = -1;
			$d['personnes'] = $this->Note->Personne->findAllByGroupeId($idGroupe);
			if (empty($d['personnes']))
			{
				$this->Session->setFlash('Ce groupe est vide', 'message');
				$this->redirect($this->referer());
			}
			$module = $this->Note->ModulesTypeModule->find('first', array('conditions' => array('module_id' => $idModule,
																							'type_module_id' => $idTypeModule)));
			if (empty($module))
			{
				$this->Session->setFlash('Ce module n\'est pas associé à ce type de module ou n\'existe pas', 'message');
				$this->redirect($this->referer());
			}
			
			if (isset($this->data))
			{
				$this->Note->set($this->data);
				if ($this->Note->validates())
				{
					$coef = $this->data['Note']['coefficient'];
					unset($this->data['Note']['coefficient']);
					foreach ($this->data['Note'] as $n)
					{
						$this->Note->create();
						$n['Note'] = $n;
						unset($n['personne_id'], $n['note']);
						$n['Note']['modules_type_modules_id'] = $module['ModulesTypeModule']['id'];
						$this->Note->recursive = -1;
						$note = $this->Note->find('first', array('conditions' => array('personne_id' => $n['Note']['personne_id'],
														'modules_type_modules_id' => $n['Note']['modules_type_modules_id'])));
						if (!empty($note))
							$n['Note']['id'] = $note['Note']['id'];
						$this->Note->save($n, false);
					}
					$this->Session->setFlash('Les notes ont bien été enregistrées !', 'message', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				}
				else
					$this->Session->setFlash('Une des notes est négative ou vide !', 'message');
			}
			else
				$this->data = $this->Note->findNotes($module['ModulesTypeModule']['id'], $idGroupe);
			
			$this->set($d);
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}