<?php
class PersonnesController extends AppController
{
	var $name = "Personnes";
	function connexion() {
	}
	
	function deconnexion() {
		$this->redirect($this->Auth->logout());
	}
}

?>