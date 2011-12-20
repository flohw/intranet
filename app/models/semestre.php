<?php
class Semestre extends AppModel {
	var $name = 'Semestre';
	var $displayField = 'nom';
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nom du semestre est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'Ce nom de semestre existe déjà',
			),
		),
	);

	var $hasMany = array(
		'Groupe' => array(
			'className' => 'Groupe',
			'foreignKey' => 'semestre_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Module' => array(
			'className' => 'Module',
			'foreignKey' => 'semestre_id',
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
	
	public function beforeValidate ()
	{
		$this->data['Semestre']['nom'] = ucfirst($this->data['Semestre']['nom']);
		return true;
	}

}
?>