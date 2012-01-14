<?php
class DocumentsController extends AppController
{
	var $name = 'Documents';
	var $uses = array('Document', 'DocumentsStage', 'Module');
	var $components = array('RequestHandler');
	
	
	function beforeFilter()
	{
		parent::beforeFilter();
		if ($this->action == 'index' OR $this->action == 'modules')
		{
			if ($this->Auth->user('statut_id') < $this->statuts['prof'])
			{
				$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
				$this->redirect($this->referer());
			}
		}
	}
	// Affichage des documents mis en ligne par les professeurs + Upload
	function index ()
	{
		if (isset($this->data))
		{
			$this->Document->set($this->data);
			if ($this->Document->validates())
			{
				move_uploaded_file($this->data['Document']['fichier']['tmp_name'],
									WWW_ROOT.'files/'.$this->data['Document']['pt'].'/affectation.pdf');
				$this->Session->setFlash('Le document a bien été sauvegardé', 'message', array('class' => 'success'));
			}
			else
				$this->Session->setFlash ('Le document n\'a pas été correctement sauvegardé', 'message');
		}
		$d['typesImages'] = array('image/png', 'image/gif', 'image/jpeg');
		$d['typesPDF'] = array('application/pdf');
		$d['typesWord'] = array('application/msword', 'application/vnd.oasis.opendocument.text');
		$d['typesExcel'] = array('application/excel', 'application/vnd.ms-excel', 'application/x-excel',
					'application.x-msexcel', 'application/vnd.oasis.opendocument.spreadsheet');
		$d['docStageUtile'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'stages-utiles')));
		$d['docStageOffres'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'stages-offres')));
		$d['docPT1A'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'PT1A')));
		$d['docPT2A'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'PT2A')));
		$d['docPT2Arapports'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'PT2A-rapports')));
		$d['docPPP'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'PPP')));
		$d['docPosters'] = $this->DocumentsStage->find('all', array('conditions' => array('categorie' => 'posters')));
		$this->set($d);
	}
	
	// Upload de document pour un module
	function modules()
	{
		$d['doc'] = $this->Document->find('all', array('recursive' => -1, 'personne_id' => $this->Auth->user('id')));
		$d['modules'] = $this->Module->findModules($this->Auth->user('id'));
		
		if (isset($this->data))
		{
			$this->Document->set($this->data);
			$this->Document->recursive = -1;
			$doc = $this->Document->find('count', array('conditions' => array(	'nom' => $this->data['Document']['fichier']['name'],
																				'module_id' => $this->data['Document']['module_id'])));
			if ($doc)
				$this->Session->setFlash('Le nom du document existe déjà dans ce module ('.$this->data['Document']['fichier']['name'].')',
													'message');
			elseif ($this->Document->validates())
			{
				// Variable de sauvegarde en BD puis sauvegarde
				$s['Document']['nom'] = $this->data['Document']['fichier']['name'];
				$s['Document']['personne_id'] = $this->Auth->user('id');
				$s['Document']['module_id'] = $this->data['Document']['module_id'];
				$this->Document->validate = array();
				$this->Document->save($s);
				// Déplacement du document dans le répertoire
				$this->Module->recursive = -1;
				$mod = $this->Module->findById($this->data['Document']['module_id']);
				if (!is_dir(WWW_ROOT.'/files/modules/'.$mod['Module']['abreviation']))
					mkdir(WWW_ROOT.'/files/modules/'.$mod['Module']['abreviation']);
				move_uploaded_file($this->data['Document']['fichier']['tmp_name'],
					WWW_ROOT.'/files/modules/'.$mod['Module']['abreviation'].'/'.$this->data['Document']['fichier']['name']);
				$this->Session->setFlash('Le document a bien été enregistré !', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'presenter', $this->data['Document']['module_id']));
			}
			else
				$this->Session->setFlash('Erreur dans le formulaire', 'message');
		}
		
		$this->set($d);
	}
	
	// Affichage des documents pour le module $id
	function presenter($id) 
	{
		$mod['abre'] = $this->Module->find('first', array('conditions' => array('Module.id' => $id), 'recursive' => -1));
		$mod['docs'] = $this->Document->find('all', array('conditions' => array('Document.module_id' => $id), 'recursive' => 0));
		if (empty($mod['docs']))
			echo $this->Session->setFlash('Aucun document pour ce module', 'message', array('class' => 'info'));
		// Mise à jour du cache des notifications
		$r = array();
		$notifs = Cache::read('notifs', 'notifs');
		foreach ($mod['docs'] as $d)
		{
			if (in_array($d['Document']['id'], $notifs['documents']))
			{
				unset($notifs['documents'][$d['Document']['id']]);
				$notifs['total'] = $notifs['total'] - 1;
			}
		}
		Cache::write('notifs', $notifs, 'notifs');
		$mod['profs'] = $this->Module->findProfsModule($id);
		$this->set($mod);
	}
	
	function supprimer ($id)
	{
		if ($this->Auth->user('statut_id') < $this->statuts['prof'])
		{
			$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page !', 'message');
			$this->redirect($this->referer());
		}
		$d = $this->Document->findById($id);
		if ($d['Personne']['id'] != $this->Auth->user('id'))
		{
			$this->Session->setFlash('Vous n\'avez pas le droit de supprimer une document ne vous appartenant pas', 'message');
			$this->redirect($this->referer());
		}
		unlink('files/modules/'.$d['Module']['abreviation'].'/'.$d['Document']['nom']);
		$this->Document->delete($id);
		$this->Session->setFlash('Le document a bien été supprimé');
		$this->redirect($this->referer());
	}
	
	// Methode pour l'ipload de la fonction index (appelée en ajax)
	function upload()
	{
		$this->layout = false;
		$h = getallheaders();
		foreach ($h as $k => $v)
			$h[low($k)] = $v;
		$o = new stdClass();
		$categorie = $h['x-param-folder'];
		$folder = 'files/'.$categorie.'/';
		
		if ($h['action'] == 'upload')
		{
			$source = file_get_contents('php://input');	// Fichier à uploader
			
			$typeFichier = $h['x-file-type'];			// Type MIME
			// Types MIME acceptés
			$types = $typesImages = array('image/png', 'image/gif', 'image/jpeg');
			$acceptsFolders = array('files/stages-utiles/', 'files/PT1A/', 'files/PT2A/', 'files/PPP/',
										'files/stages-offres/', 'files/PT2A-rapports/', 'files/posters/');
			if ($categorie != 'posters')
			{
				$typesPDF = array('application/pdf');
				$typesWord = array('application/msword', 'application/vnd.oasis.opendocument.text');
				$typesExcel = array('application/excel', 'application/vnd.ms-excel', 'application/x-excel',
									'application.x-msexcel', 'application/vnd.oasis.opendocument.spreadsheet');
				$types = array_merge($types, $typesPDF, $typesWord, $typesExcel);
			}
			// Verification existance fichier
			$fichier = $this->DocumentsStage->find('first', array('conditions' => array('nom' => $h['x-file-name'],'categorie'=>$categorie)));
			if (!in_array($typeFichier, $types))
				$o->error = 'Format non supporté ('.$typeFichier.')';
			elseif ($fichier['DocumentsStage']['nom'] == $h['x-file-name'] AND !isset($h['x-param-value']))
				$o->error = 'Le fichier existe déjà ('.$h['x-file-name'].')';
			elseif (!in_array($folder, $acceptsFolders))
				$o->error = 'Le dossier n\'existe pas ('.$folder.')';
			else
			{
				// Si on remplace un fichier
				if (isset($h['x-param-value']) AND is_file(WWW_ROOT.$folder.$h['x-param-value']))
				{
					$this->DocumentsStage->delete($h['x-param-id']);
					unlink(WWW_ROOT.$folder.$h['x-param-value']);
				}
				file_put_contents(WWW_ROOT.$folder.$h['x-file-name'], $source);
				$o->name = $h['x-file-name'];
				// Création de l'image à placer
				App::import('Helper', 'Html');
				$html = new HtmlHelper();
				if (in_array($typeFichier, $typesImages))
					$o->content = $html->image('icones/fichierImage.png', array('class' => 'place'));
				elseif (in_array($typeFichier, $typesPDF))
					$o->content = $html->image('icones/fichierPDF.png', array('class' => 'place'));
				elseif (in_array($typeFichier, $typesWord))
					$o->content = $html->image('icones/fichierWord.png', array('class' => 'place'));
				elseif (in_array($typeFichier, $typesExcel))
					$o->content = $html->image('icones/fichierExcel.png', array('class' => 'place'));
				
				// Creation du document pour la bdd
				$d['DocumentsStage']['nom'] = $h['x-file-name'];
				$d['DocumentsStage']['categorie'] = $categorie;
				$d['DocumentsStage']['date_ajout'] = date('Y-m-d H:i:s');
				$d['DocumentsStage']['type_mime'] = $typeFichier;
				$d['DocumentsStage']['personne_id'] = $this->Auth->user('id');
				$this->DocumentsStage->create();
				$this->DocumentsStage->save($d);
				$o->id = $this->DocumentsStage->id;
			}
		}
		elseif ($h['action'] == 'delete')
		{
			$this->DocumentsStage->delete($h['x-param-id']);
			if (isset($h['x-param-value']) AND is_file(WWW_ROOT.$folder.$h['x-param-value']))
				unlink(WWW_ROOT.$folder.$h['x-param-value']);
			else
				$o->error = 'Le fichier n\'a pas pût être supprimé ('.$folder.$h['x-param-value'].')';
			$o->name = $h['x-param-value'];
			$o->content = '';
		}
			
		echo json_encode($o);
	}
}
?>