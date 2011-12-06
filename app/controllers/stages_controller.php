<?php
class StagesController extends AppController
{
	var $name = 'Stages';
	var $uses = array('Stage', 'DocumentsStage');

	function index() 
	{
		$o['offres'] = $this->Stage->find('all');
		$o['docoffre'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'offres')));
		$o['docutile'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'utile')));
		$this->set($o);
	}
}
?>