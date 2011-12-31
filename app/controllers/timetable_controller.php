<?php
	class TimetableController extends AppController
	{
		public $name = 'Timetable';
		public $uses = array();
		
		public function beforeFilter() { parent::beforeFilter(); }
		
		public function batiment() { }
		
		public function maintenance() { }

		public function reglement() { }

		public function docofficiels() { }

		public function astuces() { }

		public function universites() {}
	}