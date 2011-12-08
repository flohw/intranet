<?php
class Evenement extends AppModel {
	var $name = 'Evenement';
	var $displayField = 'titre';
	var $actsAs = array('Containable');
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
				'message' => 'La date de fin est avant la date de début !',
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
		$date = $check['date_debut'];
		$today = date("Y-m-d H:i:s");  
		return $date >= $today;
	}
	
	public function verifDateFin ($check)
	{
		$dateDebut = $this->data['Evenement']['date_debut'];
		$dateFin = $this->data['Evenement']['date_fin'];
		return $dateFin >= $dateDebut;
	}
	
	public function findNewEvenements ($id)
	{
		$this->contain('Personne.EvenementsPersonne');
		$events = $this->find('all', array('conditions' => array('date_fin >=' => date('Y-m-d H:i:s'))));
		foreach ($events as $k => $e)
		{
			foreach ($e['Personne'] as $kp => $p)
			{
				if ($p['id'] != $id)
					unset($events[$k]['Personne'][$kp]);
				else
					unset($events[$k]['Personne'][$kp]['mot_de_passe']);
			}
			if (count($events[$k]['Personne']) == 0)
				unset($events[$k]);
		}
		return $events;
	}
	
	public function findNotifsNewEvenements ($id)
	{
		$events = $this->findNewEvenements($id);
		$r = array();
		foreach ($events as $e)
			$r[$e['Evenement']['id']] = $e['Evenement']['id'];
		return $r;
	}

}
?>