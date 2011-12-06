<?php
class AppController extends Controller
{
	var $helpers = array('Html', 'Form', 'Session', 'Cache');
	var $components = array('Session', 'Auth');
	
	function beforeFilter()
	{
		$this->Auth->loginAction = array('controller' => 'personnes', 'action' =>'connexion');
		$this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display', 'personnes_home');
		$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
		$this->Auth->fields = array('username' => 'login', 'password' => 'mot_de_passe');
		$this->Auth->userModel = 'Personne';
		$this->Auth->authError = 'Vous n\'êtes pas autorisé à accéder à cette page !';
		$this->Auth->flashElement = 'auth_error';
		if (low($this->name)=='pages')
		{
			if (preg_match('#personnes_#', low($this->params['pass'][0])))
				$this->Auth->deny($this->action);
			else
				$this->Auth->allow("*");
		}
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
			$notifs = Cache::read('notifs', 'notifs');
			if ($notifs === false)
			{
				$this->loadModel('Message');
				$this->loadModel('Document');
				$this->loadModel('Evenement');
				$notifs['messages'] = $this->Message->findNotifsNewMessages($this->Auth->user('id'));
				$notifs['documents'] = $this->Document->findNotifsNewDocuments($this->Auth->user('last_login'));
				$notifs['evenements'] = $this->Evenement->findNotifsNewEvenements($this->Auth->user('id'), $this->Auth->user('last_login'));
				$notifs['total'] = count($notifs['messages']) + count($notifs['documents']) + count($notifs['evenements']);
				Cache::write('notifs', $notifs, 'notifs');
			}
			$n['notifs'] = $notifs;
			$this->set($n);
		}
	}
}

?>