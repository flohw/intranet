<?php

	class GroupesController extends AppController
	{
		public $uses = array('Groupe');
		
		public function beforeFilter() { parent::beforeFilter(); }
		
		public function index($groupeID = null)
		{
			$groupeID = (is_null($groupeID)) ? $this->Auth->user('groupe_id') : $groupeID;
			$d['groupes'] = $this->Groupe->find('all', array('recursive' => 0, 'order' => 'Semestre.nom, Groupe.nom'));
			if (empty($d['groupes']))
			{
				$this->Session->setFlash('Ce groupe n\'existe pas', 'message');
				$this->redirect(array('action' => 'index', $this->Auth->user('groupe_id')));
			}
			$d['membres'] = $this->Groupe->Personne->findAllByGroupeId($groupeID);
			$d['groupeID'] = $groupeID;
			$this->set($d);
		}
		
		public function editer ($id = null)
		{
			if ($this->Auth->user('statut_id') < $this->statuts['admin'])
			{
				$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
				$this->redirect($this->referer());
			}
			
			if (isset($this->data))
			{
				$this->Groupe->set($this->data);
				if ($this->Groupe->validates())
				{
					$this->Groupe->save();
					$action = (!empty($this->data['Groupe']['id'])) ? 'édité' : 'créé';
					$this->Session->setFlash('Le groupe a bien été '.$action.' !', 'message', array('class' => 'success'));
					$this->redirect(array('action' => 'index', $this->Groupe->id));
				}
				else
					$this->Session->setFlash('Il y a des erreurs dans le formulaire', 'message');
			}
			elseif (!is_null($id))
				$this->data = $this->Groupe->findById($id);
			$d['semestres'] = $this->Groupe->Semestre->find('list');
			$this->set($d);
		}
	}