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

		public function index() {	
			$re = "";

			if ($this->Auth->user('statut_id') == $this->statuts['eleve']) {
				$info = $this->Groupe->find('first', array('recursive'=>0, 'conditions' => array('Groupe.id' => $this->Auth->user('groupe_id'))));

				if ($info['Semestre']['nom']=="Semestre 1") { 
					if ($info['Groupe']['nom']=="A1" || $info['Groupe']['nom']=="A2") $re = 452;
					if ($info['Groupe']['nom']=="B1" || $info['Groupe']['nom']=="B2") $re = 453;
					if ($info['Groupe']['nom']=="C1" || $info['Groupe']['nom']=="C2") $re = 454;
					if ($info['Groupe']['nom']=="D1" || $info['Groupe']['nom']=="D2") $re = 455;
				}
				else if ($info['Semestre']['nom']=="Semestre 2") { 
					if ($info['Groupe']['nom']=="A1" || $info['Groupe']['nom']=="A2") $re = 1842;
					if ($info['Groupe']['nom']=="B1" || $info['Groupe']['nom']=="B2") $re = 1845;
					if ($info['Groupe']['nom']=="C1" || $info['Groupe']['nom']=="C2") $re = 1848;
					if ($info['Groupe']['nom']=="D1" || $info['Groupe']['nom']=="D2") $re = 1851;
				}
				else if ($info['Semestre']['nom']=="Semestre 3") { 
					if ($info['Groupe']['nom']=="A1" || $info['Groupe']['nom']=="A2") $re = 467;
					if ($info['Groupe']['nom']=="B1" || $info['Groupe']['nom']=="B2") $re = 468;
					if ($info['Groupe']['nom']=="C1" || $info['Groupe']['nom']=="C2") $re = 469;
					if ($info['Groupe']['nom']=="D1" || $info['Groupe']['nom']=="D2") $re = 470;
				}
				else if ($info['Semestre']['nom']=="Semestre 4") { 
					if ($info['Groupe']['nom']=="A1" || $info['Groupe']['nom']=="A2") $re = 1163;
					if ($info['Groupe']['nom']=="B1" || $info['Groupe']['nom']=="B2") $re = 1532;
					if ($info['Groupe']['nom']=="C1" || $info['Groupe']['nom']=="C2") $re = 1836;
					if ($info['Groupe']['nom']=="D1" || $info['Groupe']['nom']=="D2") $re = 1839;
				}
				else if ($info['Semestre']['nom']=="Semestre 1d") $re = 1221;
				else if ($info['Semestre']['nom']=="Semestre 2d") $re = 1229;
				else if ($info['Semestre']['nom']=="Semestre 3d") $re = 1232;
				else if ($info['Semestre']['nom']=="Semestre 4d") $re = 1978;
				else if ($info['Semestre']['nom']=="Année spéciale") $re = 449;
				else if ($info['Semestre']['nom']=="Licence Pro") $re = 105;
			}

			$d['ressource'] = $re;
			$this->set($d);
		}
	}