<?php

	class SemestresController extends AppController
	{
		public $name = 'Semestres';
		public $uses = array('Semestre');
		
		public function beforeFilter() {
			parent::beforeFilter();
		}
		
		public function getSemestres()
		{
			return $this->Semestre->find('all', array('recursive' => -1));
		}
	}