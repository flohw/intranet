<?php
class Groupe extends AppModel {
	var $name = 'Groupe';
	var $displayField = 'nom';
	var $order = 'Semestre.nom, Groupe.nom';
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nom du groupe est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Le nom du groupe doit être une chaine de caractères alphanumériques',
			),
			'unique' => array(
				'rule' => array('groupeUnique'),
				'message' => 'Le groupe existe déjà pour le semestre',
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
			'order' => 'Semestre.nom'
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
	
	public function groupeUnique ($check)
	{
		$this->recursive = -1;
		$g=$this->find('first', array('conditions' => array('nom' => $check['nom'], 'semestre_id' => $this->data['Groupe']['semestre_id'])));
		return (empty($g)) OR $g['Groupe']['id'] == $this->data['Groupe']['id'];
	}
	
	public function getGroupeList ()
	{
		$gr = $this->find('all', array('recursive' => 0));
		$r = array();
		foreach ($gr as $g)
			$r[$g['Groupe']['id']] = $g['Semestre']['nom'].' - '.$g['Groupe']['nom'];
		return $r;
	}

}
?>