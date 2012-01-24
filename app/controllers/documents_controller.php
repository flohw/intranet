<?php
class DocumentsController extends AppController
{
	var $name = 'Documents';
	var $uses = array('Document', 'DocumentsStage', 'DocumentsStatique', 'Module', 'PagesStatique');
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

	// affichage des documents mis en ligne par un prof donne
	function lister() 
	{
		if ($this->Auth->user('statut_id') >= $this->statuts['prof'])
		{
			$this->Session->setFlash('Vous n\'avez pas le droit d\'accéder à cette page', 'message');
			$this->redirect($this->referer());
		}
		
		$d['documentsStage'] = $this->DocumentsStage->find('all', array(
			'recursive' => -1, 
			'order' => array('DocumentsStage.categorie ASC'), 
			'conditions' => array('personne_id' => $id)));
		
		$d['documents'] = $this->Document->find('all', array(
			'order' => array('Document.module_id DESC'), 
			'conditions'=> array('personne_id' => $this->Auth->user('id'))));
		$this->set($d);
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
		$d = array_merge(array('typesImages' => $this->typesImages), array('typesPDF' => $this->typesPDF),
						array('typesWord' => $this->typesWord), array('typesExcel' => $this->typesExcel));
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
	function modules($id = 0)
	{
		$d = array_merge(array('typesImages' => $this->typesImages), array('typesPDF' => $this->typesPDF),
						array('typesWord' => $this->typesWord), array('typesExcel' => $this->typesExcel));
		$d['docs'] = $this->Document->findMyDocuments($this->Auth->user('id'));
		$d['modules'] = $this->Module->findModules($this->Auth->user('id'));
		$i = $first = 0;
		foreach ($d['modules'] as $idm => $m) {
			$first = ($i++ == 0) ? $idm : $first;
			if ($idm == $id AND $id != 0)
				$d['select'] = $id;
		}
		$d['select'] = (isset($d['select'])) ? $d['select'] : $first;
			
		
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
		$this->layout = null;
		$this->render(false);
		$h = getallheaders();
		foreach ($h as $k => $v)
			$h[low($k)] = $v;
		$o = new stdClass();
		$isStatique = $isModule = false;
		$categorie = $h['x-param-folder'];
		$folder = 'files/'.$categorie.'/';
		if (preg_match('#files/modules/[A-Z0-1]+#', $folder))
			$isModule = true;
		elseif (preg_match('#files/documents/[0-9]+#', $folder))
			$isStatique = true;
		
		if ($h['action'] == 'upload')
		{
			$source = file_get_contents('php://input');	// Fichier à uploader
			
			$typeFichier = $h['x-file-type'];			// Type MIME
			// Types MIME acceptés
			$types = $this->typesImages;
			$acceptsFolders = array('files/stages-utiles/', 'files/PT1A/', 'files/PT2A/', 'files/PPP/',
										'files/stages-offres/', 'files/PT2A-rapports/', 'files/posters/');
			if ($categorie != 'posters')
				$types = array_merge($types, $this->typesPDF, $this->typesWord, $this->typesExcel);
			
			// Verification existance fichier
			$this->PagesStatique->recursive = $this->Module->recursive = $this->Document->recursive = $this->DocumentsStage->recursive = -1;
			$modele = 'Document';
			if (!$isModule AND !$isStatique)
			{
				$modele .= 'sStage';
				$fichier = $this->$modele->find('first', array('conditions' => array('nom' => $h['x-file-name'],'categorie'=>$categorie)));
			}
			elseif ($isModule)
			{
				$moduleId = $this->Module->findById($h['x-param-module']);
				$fichier = $this->$modele->find('first', array('conditions' => array('nom' => $h['x-file-name'], 'module_id' => $moduleId['Module']['id'])));
				if (!is_dir($folder))
					mkdir($folder);
			}
			elseif ($isStatique)
			{
				$modele .= 'sStatique';
				$pageID = $this->PagesStatique->findById($h['x-param-page']);
				$fichier = $this->$modele->find('first', array('conditions' => array('nom' => $h['x-file-name'])));
				if (!empty($fichier))
				{
					$pid = array();
					foreach ($fichier['PagesStatique'] as $p)
						$pid[] = $p['id'];
					if (!in_array($pageID['PagesStatique']['id'], $pid))
						$fichier[$modele]['nom'] = null;
				}
				if (!is_dir($folder))
					mkdir($folder);
			}
			if (!in_array($typeFichier, $types))
				$o->error = 'Format non supporté ('.$typeFichier.')';
			elseif ($fichier[$modele]['nom'] == $h['x-file-name'] AND !isset($h['x-param-value']))
				$o->error = 'Le fichier existe déjà ('.$h['x-file-name'].')';
			elseif (!in_array($folder, $acceptsFolders) AND !$isModule AND !$isStatique)
				$o->error = 'Le dossier n\'existe pas ('.$folder.')';
			else
			{
				// Si on remplace un fichier
				if (isset($h['x-param-value']) AND is_file(WWW_ROOT.$folder.$h['x-param-value']))
				{
					$this->$modele->delete($h['x-param-id']);
					unlink(WWW_ROOT.$folder.$h['x-param-value']);
				}
				file_put_contents(WWW_ROOT.$folder.$h['x-file-name'], $source);
				$o->name = $h['x-file-name'];
				// Création de l'image à placer
				App::import('Helper', 'Html');
				$html = new HtmlHelper();
				if (in_array($typeFichier, $this->typesImages))
					$o->content = $html->image('/'.IMAGES_URL.'icones/fichierImage.png', array('class' => 'place'));
				elseif (in_array($typeFichier, $this->typesPDF))
					$o->content = $html->image('/'.IMAGES_URL.'icones/fichierPDF.png', array('class' => 'place'));
				elseif (in_array($typeFichier, $this->typesWord))
					$o->content = $html->image('/'.IMAGES_URL.'icones/fichierWord.png', array('class' => 'place'));
				elseif (in_array($typeFichier, $this->typesExcel))
					$o->content = $html->image('/'.IMAGES_URL.'icones/fichierExcel.png', array('class' => 'place'));
				
				// Creation du document pour la bdd
				if (!$isModule AND !$isStatique)
					$d[$modele]['categorie'] = $categorie;
				elseif ($isModule)
					$d[$modele]['module_id'] = $moduleId['Module']['id'];
				elseif ($isStatique)
				{
					$d['PagesStatique']['id'] = $pageID['PagesStatique']['id'];
				}
				
				$d[$modele]['nom'] = $h['x-file-name'];
				$d[$modele]['date_ajout'] = date('Y-m-d H:i:s');
				$d[$modele]['type_mime'] = $typeFichier;
				$d[$modele]['personne_id'] = $this->Auth->user('id');
				
				$this->$modele->create();
				$this->$modele->save($d);
				$o->id = $this->$modele->id;
			}
		}
		elseif ($h['action'] == 'delete')
		{
			$modele = 'Document';
			if (!$isModule AND !$isStatique)
				$modele .= 'sStage';
			elseif ($isStatique)
				$modele.= 'sStatique';
			$this->$modele->delete($h['x-param-id']);
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