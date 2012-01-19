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
			if (!empty($this->data['Stage']['fichier']['name']) AND !$this->data['Stage']['supprimer'])
				$this->data['Stage']['document'] =	Inflector::slug($this->data['Stage']['entreprise'], '-').'-'
													.Inflector::slug($this->data['Stage']['ville'], '-').'-';
			elseif ($this->data['Stage']['supprimer'] == true)
				$this->data['Stage']['document'] = '';
			
			$this->Stage->set($this->data);
			if ($this->Stage->validates())
			{
				$oldDocument = $this->Stage->getDocument($this->Stage->id);
				if (empty($this->data['Stage']['id']))
					$this->Session->setFlash('Nouvelle offre enregistrée', 'message', array('class' => 'success'));
				else
					$this->Session->setFlash('L\'offre a bien été mise à jour', 'message', array('class' => 'success'));
				$this->Stage->save();
				if (!empty($this->data['Stage']['fichier']['name']) AND !$this->data['Stage']['supprimer'])
				{
					if (is_file('files/stages-offres/'.$oldDocument))
						unlink('files/stages-offres/'.$oldDocument);
					$data = $this->data['Stage'];
					$this->data['Stage'] = array();
					$ext = explode('.', $data['fichier']['name']);
					$ext = $ext[sizeof($ext)-1];
					$this->data['Stage']['document'] = $data['document'].$this->Stage->id.'.'.$ext;
					$this->data['Stage']['id'] = $this->Stage->id;
					$this->Stage->save($this->data, false);
					move_uploaded_file($data['fichier']['tmp_name'], 'files/stages-offres/'.$this->data['Stage']['document']);
				}
				elseif ($this->data['Stage']['supprimer'] == true AND is_file('files/stages-offres/'.$oldDocument))
					unlink('files/stages-offres/'.$oldDocument);
				
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
	
	public function supprimer ()
	{
		$h = getallheaders();
		foreach ($h as $k => $v)
			$h[low($k)] = $v;
		$this->layout = null;
		$this->render(false);
		$r = new stdClass();
		if ($this->Auth->user('statut_id') < $this->statuts['prof'])
			$r->content = 'Vous n\'avez pas le droit d\'accéder à cette page';
		else
		{
			$fichier = $this->Stage->findById($h['id']);
			$fichier = $fichier['Stage']['document'];
			if (is_file('files/stages-offres/'.$fichier))
				unlink('files/stages-offres/'.$fichier);
			$this->Stage->delete($h['id']);
			$r->content = 'Le stage a bien été supprimé';
			$r->id = $h['id'];
		}
		return json_encode($r);
	}
	
	public function editer ($id)
	{
		$this->layout = null;
		$this->render(false);
		return json_encode($this->Stage->findById($id));
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