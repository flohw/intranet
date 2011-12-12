<?php
class DocumentsController extends AppController
{
	var $name = 'Documents';
	var $uses = array('Document', 'DocumentsStage', 'Module');
	var $components = array('RequestHandler');
	
	function index ()
	{
		$d['typesImages'] = array('image/png', 'image/gif', 'image/jpeg');
		$d['typesPDF'] = array('application/pdf');
		$d['typesWord'] = array('application/msword', 'application/vnd.oasis.opendocument.text');
		$d['typesExcel'] = array('application/excel', 'application/vnd.ms-excel', 'application/x-excel',
					'application.x-msexcel', 'application/vnd.oasis.opendocument.spreadsheet');
		$d['docStage'] = $this->DocumentsStage->find('all');
		$this->set($d);
	}

	function presenter($id) 
	{
		$mod['abre'] = $this->Module->find('first', array('conditions' => array('Module.id' => $id), 'recursive' => 1));
		$mod['docs'] = $this->Document->find('all', array('conditions' => array('Document.module_id' => $id), 'recursive' => 1));
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
		$this->set($mod);
	}
	
	function upload()
	{
		$this->layout = false;
		$h = getallheaders();
		foreach ($h as $k => $v)
		{
			$h[low($k)] = $v;
			unset($h[$k]);
		}
		$o = new stdClass();
		$folder = isset($h['x-param-folder']) ? 'files/'.$h['x-param-folder'].'/' : 'files/';
		if ($h['action'] == 'upload')
		{
			$source = file_get_contents('php://input');
			$typeFichier = $h['x-file-type'];
			$typesImages = array('image/png', 'image/gif', 'image/jpeg');
			$typesPDF = array('application/pdf');
			$typesWord = array('application/msword', 'application/vnd.oasis.opendocument.text');
			$typesExcel = array('application/excel', 'application/vnd.ms-excel', 'application/x-excel',
								'application.x-msexcel', 'application/vnd.oasis.opendocument.spreadsheet');
			$fichier = $this->DocumentsStage->findByNom($h['x-file-name']);
			
			if (!in_array($typeFichier, array_merge($typesImages, $typesPDF, $typesWord, $typesExcel)))
				$o->error = 'Format non supporté ('.$typeFichier.')';
			elseif ($fichier['DocumentsStage']['nom'] == $h['x-file-name'] AND !isset($h['x-param-value']))
				$o->error = 'Le fichier existe déjà ('.$h['x-file-name'].')';
			else
			{
				if (isset($h['x-param-value']) AND is_file(WWW_ROOT.$folder.$h['x-param-value']))
				{
					$this->DocumentsStage->delete($h['x-param-id']);
					unlink(WWW_ROOT.$folder.$h['x-param-value']);
				}
				file_put_contents(WWW_ROOT.$folder.$h['x-file-name'], $source);
				$o->name = $h['x-file-name'];
				
				App::import('Helper', 'Html');
				$html = new HtmlHelper();
				if (in_array($typeFichier, $typesImages))
					$o->content = $html->image('icones/fichierImage.png');
				elseif (in_array($typeFichier, $typesPDF))
					$o->content = $html->image('icones/fichierPDF.png');
				elseif (in_array($typeFichier, $typesWord))
					$o->content = $html->image('icones/fichierWord.png');
				elseif (in_array($typeFichier, $typesExcel))
					$o->content = $html->image('icones/fichierExcel.png');
				$d['DocumentsStage']['nom'] = $h['x-file-name'];
				$d['DocumentsStage']['categorie'] = 'stage';
				$d['DocumentsStage']['date_ajout'] = date('Y-m-d H:i:s');
				$d['DocumentsStage']['type_mime'] = $typeFichier;
				$this->DocumentsStage->save($d);
				$o->id = $this->DocumentsStage->id;
			}
		}
		elseif ($h['action'] == 'delete')
		{
			if (isset($h['x-file-name']) AND is_file(WWW_ROOT.$folder.$h['x-file-name']))
			{
				$this->DocumentsStage->delete($h['x-param-id']);
				unlink(WWW_ROOT.$folder.$h['x-file-name']);
			}
			else
				$o->error = 'Le fichier n\'a pas pût être supprimé ('.$folder.$h['x-file-name'].')';
			$o->name = $h['x-file-name'];
			$o->content = '';
		}
			
		echo json_encode($o);
	}
}
?>