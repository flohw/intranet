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
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Le nom du semestre doit être une chaine de caractères',
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

}
?>