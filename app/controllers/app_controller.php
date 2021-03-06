<?php
class AppController extends Controller
{
	var $helpers = array('Html', 'Form', 'Session', 'Cache');
	var $components = array('Session', 'Auth', 'Cookie');
	var $statuts = array('admin' => 30, 'prof' => 20, 'eleve' => 10);
	var $typesImages = array('image/png', 'image/gif', 'image/jpeg');
	var $typesPDF = array('application/pdf');
	var $typesWord = array('application/msword', 'application/vnd.oasis.opendocument.text');
	var $typesExcel = array('application/excel', 'application/vnd.ms-excel', 'application/x-excel',
					'application.x-msexcel', 'application/vnd.oasis.opendocument.spreadsheet');
	// Pour la génération de mot de passe
	var $caracteres = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
							'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
							0,1,2,3,4,5,6,7,8,9);
	
	function beforeFilter()
	{
		// Configuration du composant Auth
		$this->Auth->loginAction = array('controller' => 'personnes', 'action' =>'connexion');
		$this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display', 'personnes_home');
		$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
		$this->Auth->fields = array('username' => 'login', 'password' => 'mot_de_passe');
		$this->Auth->userModel = 'Personne';
		$this->Auth->authError = 'Vous n\'êtes pas autorisé à accéder à cette page !';
		$this->Auth->flashElement = 'auth_error';
		
		// Configuration du composant Cookie
		$this->Cookie->name = 'auth';
		$this->Cookie->time = '1 year';
		$this->Cookie->domaine = 'intranet';
		$this->Cookie->key = '9dM8o9T3a4oNrs3JRpF94muHYrX9CWG6';
		
		if (low($this->name)=='pages')
		{
			if (preg_match('#personnes_#', low($this->params['pass'][0])))
				$this->Auth->deny($this->action);
			else
				$this->Auth->allow("*");
		}
		
		// Si on est pas connecté et qu'on a le cookie de connexion
		if (!$this->Auth->user('id') AND $this->Cookie->read('Personne'))
		{
			$this->loadModel('Personne');
			$p = $this->Personne->find('first', array('conditions' => array(	'login' => $this->Cookie->read('Personne.login'),
																		'mot_de_passe' => $this->Cookie->read('Personne.mot_de_passe')),
												'recursive' => -1));
			if (!empty($p))
				$this->Session->write('Auth.Personne', $p['Personne']);
			else
			{
				$this->Session->setFlash('Le cookie de connexion n\'est pas valide', 'message');
				if ($this->action != 'connexion')
					$this->redirect($this->Auth->loginAction);
			}
		}
		
		// Definition du layout son on est connecté, en fonction du statut
		if ($this->Auth->user('id'))
		{
			switch ($this->Auth->user('statut_id'))
			{
				case 10:
					$this->layout = 'eleve';
					break;
				case 20:
					$this->layout = 'professeur';
					break;
				case 30:
					$this->layout = 'admin';
					break;
			}
			if (low($this->action) == 'display' AND $this->params['pass'][0] == 'home')
				$this->redirect(array('controller' => 'pages', 'action' => 'display', 'personnes_home'));
			// Récupération des notifications, nouveaux documents et nouveaux messages
			$notifs = Cache::read('notifs', 'notifs');
			if ($notifs === false)
			{
				$this->loadModel('Message');
				$this->loadModel('Document');
				$this->loadModel('Evenement');
				$notifs['messages'] = $this->Message->findNotifsNewMessages($this->Auth->user('id'));
				$notifs['documents'] = $this->Document->findNotifsNewDocuments($this->Auth->user('last_login'), $this->Auth->user('id'));
				$notifs['evenements']['evenements'] = $this->Evenement->findNotifsNewEvenements($this->Auth->user('id'));
				$notifs['evenements']['evenementsDay'] = $this->Evenement->findNotifsEvenementsDay($this->Auth->user('display'), $this->Auth->user('id'));
				$notifs['total'] = count($notifs['messages']) + count($notifs['documents']);
				$notifs['evenements']['total'] = count($notifs['evenements']['evenements']);
				Cache::write('notifs', $notifs, 'notifs');
			}
			$n['notifs'] = $notifs;
			$this->set($n);
			
			// lien pour l'emploi du temps
			$re = null;

			if ($this->Auth->user('statut_id') == $this->statuts['eleve']) {
				$this->loadModel('Groupe');
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
		$this->set('statutsID', $this->statuts);
	}
}

?>