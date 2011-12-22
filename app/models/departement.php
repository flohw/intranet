<?php
class Departement extends AppModel {
	var $name = 'Departement';
	var $displayField = 'nom';
	var $actsAs = array('Containable');
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nom du département est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'maxlength' => array(
				'rule' => array('maxlength', 60),
				'message' => 'Le nom du département est trop long (60 caractères)',
			),
			'isunique' => array(
				'rule' => array('isunique'),
				'message' => 'Ce nom de département existe déjà',
			),
		),
		'nb_max_eleves' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Ce n\'est pas un nombre',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nombre d\'élèves est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'abreviation' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'L\'abréviation est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'L\'abréviation doit être une chaine de caractères',
			),
		),
	);

	var $hasMany = array(
		'Personne' => array(
			'className' => 'Personne',
			'foreignKey' => 'departement_id',
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
		'TypeModule' => array(
			'className' => 'TypeModule',
			'foreignKey' => 'departement_id',
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