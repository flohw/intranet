<?php
class Dossier extends AppModel {
	var $name = 'Dossier';
	var $displayField = 'nom';
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nom du dossier est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Document' => array(
			'className' => 'Document',
			'foreignKey' => 'dossier_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function beforeSave ()
	{
		$this->data['Dossier']['slug'] = low(Inflector::slug($this->data['Dossier']['slug'], '-'));
		return true;
	}

}
?>