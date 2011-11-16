<?php
class TypeModule extends AppModel {
	var $name = 'TypeModule';
	var $displayField = 'nom';
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le type du module est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'nb_max_eleves' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nombre d\'élèves est vide',
				'allowEmpty' => false,
				'required' => false,
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Le nombre d\'élèves n\'est pas un nombre',
			),
		),
	);

	var $belongsTo = array(
		'Departement' => array(
			'className' => 'Departement',
			'foreignKey' => 'departement_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Module' => array(
			'className' => 'Module',
			'joinTable' => 'modules_type_modules',
			'foreignKey' => 'type_module_id',
			'associationForeignKey' => 'module_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>