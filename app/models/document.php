<?php
class Document extends AppModel {
	var $name = 'Document';
	var $displayField = 'nom';
	var $validate = array(
		'fichier' => array(
			'verifFichier' => array(
				'rule' => array('verifFichier'),
				'message' => 'Le fichier n\'est pas présent ou n\'est pas du bon type (image, pdf, word, excel)',
			),
		),
	);

	var $belongsTo = array(
		'Personne' => array(
			'className' => 'Personne',
			'foreignKey' => 'personne_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Module' => array(
			'className' => 'Module',
			'foreignKey' => 'module_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function beforeSave ()
	{
		$this->data['Document']['date_ajout'] = date('Y-m-d H:i:s');
		return true;
	}
		
	public function verifFichier ($check)
	{
		$check = current($check);
		if (empty($check['name']))
			return false;
		$typesImages = array('image/png', 'image/gif', 'image/jpeg');
		$typesPDF = array('application/pdf');
		$typesWord = array('application/msword', 'application/vnd.oasis.opendocument.text');
		$typesExcel = array('application/excel', 'application/vnd.ms-excel', 'application/x-excel',
							'application.x-msexcel', 'application/vnd.oasis.opendocument.spreadsheet');
		
		if (!in_array($check['type'], array_merge($typesImages, $typesPDF, $typesWord, $typesExcel)))
			return false;
		return true;
	}
	
	public function findNewDocuments($date, $idPersonne = null)
	{
		$cond = array('date_ajout >=' => $date);
		if (!is_null($idPersonne))
			$cond = array_merge($cond, array('personne_id <>' => $idPersonne));
		$docs = $this->find('all', array('conditions' => $cond));
		return $docs;
	}
	
	public function findNotifsNewDocuments($date, $idPersonne = null)
	{
		$docs = $this->findNewDocuments($date, $idPersonne);
		$r = array();
		foreach ($docs as $d)
			$r[$d['Document']['id']] = $d['Document']['id'];
		return $r;
	}
	
	public function findMyDocuments ($id)
	{
		$docs = $this->find('all', array('conditions' => array('personne_id' => $id), 'recursive' => 0));
		$modules = $this->Module->findModules($id);
		$r = array();
		foreach ($modules as $idModule => $m)
		{
			$r[$m]['module_id'] = $idModule;
			foreach ($docs as $i => $d)
			{
				if ($d['Module']['id'] == $idModule)
				{
					$r[$m][] = $d['Document'];
					unset($docs[$i]);
				}
			}
		}
		return $r;
	}
}
?>