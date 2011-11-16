<?php
class TypeEvenement extends AppModel {
	var $name = 'TypeEvenement';
	var $displayField = 'nom';
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le type d\'évènement est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'maxlength' => array(
				'rule' => array('maxlength'),
				'message' => 'Le type d\'évènement est trop long (45 caractères)',
			),
		),
	);

	var $hasMany = array(
		'Evenement' => array(
			'className' => 'Evenement',
			'foreignKey' => 'type_evenement_id',
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