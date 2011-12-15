<?php
class Absence extends AppModel {
	var $name = 'Absence';
	var $displayField = 'date';
	var $validate = array(
		'justification' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'La justification de l\'absence est obligatoire',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'update',
			),
		),
		'date'=> array(
			'notempty' => array (
				'rule' => array ('notempty'), 
				'message' => 'Date vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'notempty' => array (
				'rule' => array ('verifDate'), 
				'message' => 'Date invalide',
				'allowEmpty' => false,
				'required' => true,
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
		)
	);

	public function verifDate ($check) {
		return $check['date'] <= date('Y-m-d H:i:s');
	}
	
	
}
?>