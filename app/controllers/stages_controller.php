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

	function pt1()
	{
		$o['docetu'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'etu1')));
		$this->set($o);
	}

	function pt2()
	{
		$o['docetu'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'etu2')));
		$o['docrap'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'rapports')));
		$this->set($o);
	}

	function ppp()
	{
		$o['docetu'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'etuppp')));
		$this->set($o);
	}
}
?>