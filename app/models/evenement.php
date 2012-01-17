<?php
class Evenement extends AppModel {
	var $name = 'Evenement';
	var $displayField = 'titre';
	var $actsAs = array('Containable');
	var $validGroupe = array(
		'groupes' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Aucun groupe sélectionné pour cet évènement',
			),
		)
	);
	var $validate = array(
		'titre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le titre de l\'évènement est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'personnes' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => true,
				'message' => 'Aucune personne sélectionnée pour cet évènement',
			)
		),
		'date_debut' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => true,
				'message' => 'La date est vide'
			),
			'date' => array(
				'rule' => array('verifDateDebut'),
				'message' => 'La date de début est déjà passée',
			),
		),
		'date_fin' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => true,
				'message' => 'La date est vide'
			),
			'date' => array(
				'rule' => array('verifDateFin'),
				'message' => 'La date de fin est avant la date de début !',
			),
		),
		'contenu' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => true,
				'message' => 'Vous devez préciser l\'évènement',
			),
			'length' => array(
				'rule' => array('maxLength', 250),
				'message' => 'Le message est trop long (250 caractères maximum)',
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
			'insertQuery' => '',
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
	
	// Pour l'affichage de tous les evenements (admin ou edition de l'evenement $idEvent)
	public function findEvenement ($idEvent = null)
	{
		$this->contain(array('Personne', 'TypeEvenement'));
		if (is_null($idEvent))
			$ev = $this->find('all');
		else
			$ev = $this->find('all', array('conditions' => array('Evenement.id' => $idEvent)));
		foreach ($ev as $k => $e)
		{
			$ev[$k]['Evenement']['type_evenement'] = $e['TypeEvenement']['nom'];
			$ev[$k]['Evenement']['personnes'] = null;
			foreach ($ev[$k]['Personne'] as $p)
				$ev[$k]['Evenement']['personnes'] .= $p['nom'].' '.$p['prenom'].', ';
			
			unset($ev[$k]['Personne']);
		}
		if (is_null($idEvent))
			return $ev;
		else
			return current($ev);
	}
	
	// Affiche les evenements de la personne concernée
	public function findNewEvenements ($loginPersonne, $idPersonne)
	{
		$events = $this->findEvenement();
		foreach ($events as $k => $e)
		{
			$personnes = explode(',', $e['Evenement']['personnes']);
			foreach ($personnes as $kk => $p)
				$personnes[$kk] = trim($p);
			if (!in_array($loginPersonne, $personnes) AND $e['Evenement']['personne_id'] != $idPersonne)
				unset($events[$k]);
		}
		return $events;
	}
	
	// pour le tableau des notifications
	public function findNotifsNewEvenements ($idPersonne)
	{
		$this->contain('Personne.EvenementsPersonne');
		$events = $this->find('all', array('conditions' => array('date_fin >=' => date('Y-m-d H:i:s'))));
		foreach ($events as $k => $e)
		{
			foreach ($e['Personne'] as $kp => $p)
			{
				if ($p['id'] != $idPersonne)
					unset($events[$k]['Personne'][$kp]);
				else
					unset($events[$k]['Personne'][$kp]['mot_de_passe']);
			}
			if (count($events[$k]['Personne']) == 0 AND $e['Evenement']['personne_id'] != $idPersonne)
				unset($events[$k]);
		}
		$r = array();
		foreach ($events as $e)
			$r[$e['Evenement']['id']] = $e['Evenement']['id'];
		return $r;
	}
	
	public function findNotifsEvenementsDay ($loginPersonne, $idPersonne)
	{
		$events = $this->findNewEvenements($loginPersonne, $idPersonne);
		foreach ($events as $n => $e)
		{
			$e = current($e);
			if (!(substr($e['date_debut'], 0, 10) <= date('Y-m-d') AND substr($e['date_fin'], 0, 10) >= date('Y-m-d')))
				unset($events[$n]);
		}
		return $events;
	}
	
	public function findEvenementByIdPers ($idEvent, $idPersonne)
	{
		$this->contain(array('Personne'));
		$events = $this->findById($idEvent);
		$idPers = array();
		foreach ($events['Personne'] as $o => $p)
		{
			$idPers[] = $p['id'];
			$events['Personne'][$o] = $p['nom'].' '.$p['prenom'];
		}
		
		if (!in_array($idPersonne, $idPers) AND $idPersonne != $events['Evenement']['personne_id'])
			$events = array();
		
		return $events;
	}
	
	public function afterFind ($result)
	{
		foreach ($result as $k => $r)
		{
			if (isset($result[$k]['Evenement']['date_debut']))
				$result[$k]['Evenement']['date_debut'] = substr($r['Evenement']['date_debut'], 0, 16);
			if (isset($result[$k]['Evenement']['date_fin']))
				$result[$k]['Evenement']['date_fin'] = substr($r['Evenement']['date_fin'], 0, 16);
		}
		return $result;
	}
	
	public function beforeSave($data)
	{
		$this->data['Evenement']['date_debut'] = trim($this->data['Evenement']['date_debut']);
		$this->data['Evenement']['date_fin'] = trim($this->data['Evenement']['date_fin']);
		return true;
	}

}
?>