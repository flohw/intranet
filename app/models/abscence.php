<?php
class Abscence extends AppModel {
	var $name = 'Abscence';
	var $displayField = 'date';
	var $validate = array(
		'justification' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'La justification de l\'abscence est obligatoire',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'update',
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
	
	public function beforeSave ()
	{
		$this->data['Abscence']['date'] = date('Y-m-d H:i:s');
		return true;
	}
}
?>