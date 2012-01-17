<?php
class StagesController extends AppController
{
	var $name = 'Stages';
	var $uses = array('Stage', 'DocumentsStage', 'Departement');
	
	// Acceuil des stages (présentation, docs utiles...) (tous)
	function index() 
	{
		if (isset($this->data))
		{
			$this->data['Stage']['departements_id'] = $this->Auth->user('departement_id');
			$this->data['Stage']['date_ajout'] = date('Y-m-d H:i:s');
			$this->data['Stage']['document'] =	Inflector::slug($this->data['Stage']['entreprise'], '-').'-'
												.Inflector::slug($this->data['Stage']['ville'], '-').'-';
			$this->Stage->set($this->data);
			if ($this->Stage->validates())
			{
				$this->Stage->save();
				$data = $this->data['Stage'];
				$this->data['Stage'] = array();
				$ext = explode('.', $data['fichier']['name']);
				$ext = $ext[sizeof($ext)-1];
				$this->data['Stage']['document'] = $data['document'].$this->Stage->id.'.'.$ext;
				$this->data['Stage']['id'] = $this->Stage->id;
				$this->Stage->save($this->data, false);
				
				move_uploaded_file($data['fichier']['tmp_name'], 'files/stages-offres/'.$this->data['Stage']['document']);
				$this->Session->setFlash('Nouvelle offre enregistrée', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else
				$this->Session->setFlash('Le formulaire comporte des erreurs, le fichier n\'est peut être pas au bon format (Word, Excel, PDF ou Image)', 'message');
		}
		$o['offres'] = $this->Stage->find('all');
		$o['docoffre'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'stages-offres')));
		$o['docutile'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'stages-utiles')));
		$o['departs'] = $this->Departement->find('list');
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