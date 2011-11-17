<?php
class AppController extends Controller
{
	var $helpers = array('Html', 'Form', 'Session');
	var $components = array('Session', 'Auth');
	
	function beforeFilter()
	{
		$this->Auth->loginAction = array('controller' => 'personnes', 'action' =>'connexion');
		$this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display', 'personnes_home');
		$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
		$this->Auth->fields = array('username' => 'login', 'password' => 'mot_de_passe');
		$this->Auth->userModel = 'Personne';
		$this->Auth->authError = 'Vous n\'êtes pas autorisé à accéder à cette page !';
		if (low($this->name)=='pages')
		{
			if (preg_match('#personnes_#', low($this->action)))
				$this->Auth->deny($this->action);
			else
				$this->Auth->allow("*");
		}
	}
}

?>