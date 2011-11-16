<?php
class Groupe extends AppModel {
	var $name = 'Groupe';
	var $displayField = 'nom';
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nom du groupe est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			// Si on peut que la lettre du groupe
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Le nom du groupe doit être un caractère alphanumérique',
			),
			'maxLength' => array(
				'rule' => array('maxlength', 1),
				'message' => 'Le nom du groupe doit être une lettre',
			),
		),
		'nb_max_eleves' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nombre d\'élèves du groupe est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Ce n\'est pas un nombre',
			),
		),
	);

	var $belongsTo = array(
		'Semestre' => array(
			'className' => 'Semestre',
			'foreignKey' => 'semestre_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Personne' => array(
			'className' => 'Personne',
			'foreignKey' => 'groupe_id',
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
	
	// Si c'est une lettre pour le groupe
	public function beforeSave ()
	{
		$this->data['Groupe']['nom'] = 'Groupe '.$this->data['Groupe']['nom'];
		return true;
	}

}
?>