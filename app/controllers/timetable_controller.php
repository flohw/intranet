<?php
	class TimetableController extends AppController
	{
		public $name = 'Timetable';
		public $uses = array('Groupe');
		
		public function beforeFilter() { parent::beforeFilter(); }
		
		public function batiment() { }
		
		public function salle ($salle)
		{
			$d['salle'] = $salle;
			$d['etage'] = substr($salle, 0, 1);
			$d['numSalle'] = substr($salle, 1);
			$this->set($d);
		}
		
		public function maintenance() { }
	}