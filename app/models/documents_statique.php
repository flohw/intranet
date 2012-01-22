<?php
class DocumentsStatique extends AppModel {
	var $name = 'DocumentsStatique';
	var $displayField = 'nom';
	var $validate = array(
		'fichier' => array(
			'verifFichier' => array(
				'rule' => array('verifFichier'),
				'message' => 'Le fichier n\'est pas présent ou n\'est pas du bon type (image, pdf, word, excel)',
			),
		),
	);

	var $hasAndBelongsToMany = array(
		'PagesStatiqe' => array(
			'className' => 'PagesStatique',
			'joinTable' => 'pages_statiques_documents_statiques',
			'foreignKey' => 'documents_statique_id',
			'associationForeignKey' => 'pages_statique_id',
			'unique' => true,
		)
	);
		
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
}
?>