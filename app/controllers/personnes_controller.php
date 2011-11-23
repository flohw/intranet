<?php
class PersonnesController extends AppController
{
	var $name = "Personnes";
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function connexion() {
	}
	
	function deconnexion() {
		$this->redirect($this->Auth->logout());
	}

	function gestion() {
		
	}
}

?>