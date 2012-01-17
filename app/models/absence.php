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
				'message' => 'La date n\'est pas encore passée',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'personne_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Cette personne n\'existe pas',
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
	
	public function beforeValidate ()
	{
		$p = $this->Personne->find('first', array('conditions' => array('display' => $this->data['Absence']['personne_id'])));
		$this->data['Absence']['personne_id'] = $p['Personne']['id'];
		return true;
	}
	
	public function beforeSave ()
	{
		return true;
	}
	
	public function afterFind ($result)
	{
		foreach ($result as $k => $r)
			$result[$k]['Absence']['date'] = substr($result[$k]['Absence']['date'], 0, 16);
		return $result;
	}
	
	
}
?>