<?php
class StagesController extends AppController
{
	var $name = 'Stages';
	var $uses = array('Stage', 'DocumentsStage');
	
	// Acceuil des stages (présentation, docs utiles...) (tous)
	function index() 
	{
		$o['offres'] = $this->Stage->find('all');
		$o['docoffre'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'stages-offres')));
		$o['docutile'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'stages-utiles')));
		$this->set($o);
	}
	
	// Projets tuteures 1A (tous)
	function pt1()
	{
		$o['docetu'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'PT1A')));
		$this->set($o);
	}
	
	// Projets tuteures 2A (tous)
	function pt2()
	{
		$o['docetu'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'PT2A')));
		$o['docrap'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'PT2A-rapports')));
		$this->set($o);
	}
	
	// PPP (tous)
	function ppp()
	{
		$o['docetu'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'PPP')));
		$o['docpost'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'posters')));
		$this->set($o);
	}
}
?>