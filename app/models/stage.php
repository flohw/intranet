<?php
class Stage extends AppModel {
	var $name = 'Stage';
	var $displayField = 'display';
	var $validate = array(
		'entreprise' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nom de l\'entreprise doit être renseignée',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'ville' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'La ville doit être renseignée',
				'allowEmpty' => false,
				'required' => true,
			),		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => true,
				'message' => 'Vous devez renseigner une description',
			),
		),
		'fichier' => array(
			'file' => array(
				'rule' => array('verifFile'),
				'message' => 'Le fichier est invalide',
			),
		),
	);

	var $belongsTo = array(
		'Departement' => array(
			'className' => 'Departement',
			'foreignKey' => 'departements_id',
			'conditions' => '',
			'fields' => '',
		)
	);
	
	public function verifFile ($check)
	{
		$check = current($check);
		$typesImages = array('image/png', 'image/gif', 'image/jpeg');
		$typesPDF = array('application/pdf');
		$typesWord = array('application/msword', 'application/vnd.oasis.opendocument.text');
		$typesExcel = array('application/excel', 'application/vnd.ms-excel', 'application/x-excel',
						'application.x-msexcel', 'application/vnd.oasis.opendocument.spreadsheet');
		$docs = array_merge($typesImages, $typesPDF, $typesWord, $typesExcel);
		if (!empty($check['tmp_name']) AND !in_array($check['type'], $docs))
			return false;
		else
			return true;
	}

	public function beforeFind ()
	{
		$this->virtualFields = array('display' => 'CONCAT('.$this->alias.'.entreprise, " dans ", '.$this->alias.'.ville)');
	}
}
?>