<?php
class LibelleModule extends AppModel {
	var $name = 'LibelleModule';
	var $displayField = 'nom';
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le libellé du module est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);

	var $hasMany = array(
		'Module' => array(
			'className' => 'Module',
			'foreignKey' => 'libelle_module_id',
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