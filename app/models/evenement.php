<?php
class Evenement extends AppModel {
	var $name = 'Evenement';
	var $displayField = 'titre';
	var $validate = array(
		'titre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le titre de l\'évènement est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'date_debut' => array(
			'date' => array(
				'rule' => array('verifDateDebut'),
				'message' => 'La date de début est déjà passée',
			),
		),
		'date_fin' => array(
			'date' => array(
				'rule' => array('verifDateFin'),
				'message' => 'La date de fin est après la date de début',
			),
		),
	);

	var $belongsTo = array(
		'TypeEvenement' => array(
			'className' => 'TypeEvenement',
			'foreignKey' => 'type_evenement_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Personne' => array(
			'className' => 'Personne',
			'joinTable' => 'evenements_personnes',
			'foreignKey' => 'evenement_id',
			'associationForeignKey' => 'personne_id',
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
	
	public function verifDateDebut ($check)
	{
		$date = $check['date_debut']['year'].'-'.$check['date_debut']['month'].'-'.$check['date_debut']['day'];
		$ajd = new Date();
		return $date >= $ajd->format('Y-m-d');
	}
	
	public function verifDateFin ($check)
	{
		$dateDebut = $this->data['Evenement']['date_debut'];
		$dateDebut = $dateDebut['year'].'-'.$dateDebut['month'].'-'.$dateDebut['day'];
		$dateFin = $check['date_fin']['year'].'-'.$check['date_fin']['month'].'-'.$check['date_fin']['day'];
		return $dateFin >= $dateDebut;
	}

}
?>