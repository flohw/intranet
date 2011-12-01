<?php
class StagesController extends AppController
{
	var $name = 'Stages';
	var $uses = array('Stage');

	function index() 
	{
		$o['offres'] = $this->Stage->find('all');
		$this->set($o);
	}		
}
?>