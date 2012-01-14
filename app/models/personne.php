<?php
class Personne extends AppModel {
	var $name = 'Personne';
	var $displayField = 'display';
	var $recursive = -1;
	var $findMotPasse = false;
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nom est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'maxlength' => array(
				'rule' => array('maxlength', 80),
				'message' => 'Le nom est trop long (80 caractères)',
			),
		),
		'prenom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le prénom est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'maxlength' => array(
				'rule' => array('maxlength', 80),
				'message' => 'Le prénom est trop long (80 caractères)',
			),
		),
		'adresse' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'L\'adresse est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'date_naissance' => array(
			'date' => array(
				'rule' => array('dateNaissance'),
				'message' => 'Ce n\'est pas une date',
			),
		),
		'telephone' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le numéro de téléphone est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'phone' => array(
				'rule' => array('phone', '#^0[1-9]([-. ]?[0-9]{2}){4}$#'),
				'message' => 'Ce n\'est pas un numéroe de téléphone valide',
			),
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'L\'email est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Ce n\'est pas un email',
			),
		),
		'bureau' => array(
			'validProf' => array(
				'rule' => array('verifBureauProf'),
				'message' => 'Le bureau est vide',
			),
			'validEleve' => array(
				'rule' => array('verifBureauEleve'),
				'message' => 'Le bureau ne peut pas être renseigné',
			),
		),
		'login' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le login est vide',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'create'
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Le login doit être une chaine de caractères',
			),
			'isunique' => array(
				'rule' => array('isUnique'),
				'message' => 'Le login est déjà utilisé'
			),
		),
	);
	
	var $validEleve = array(
		'mot_de_passe' => array(
			'notempty' => array(
				'rule' => array('verifMotPasse'),
				'message' => 'Le mot de passe est vide',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'create'
			),
			'identique' => array(
				'rule' => array('identique'),
				'message' => 'Le mot de passe est incorrect',
			),
		),
		'mot_de_passe_change' => array(
			'different' => array(
				'rule' => array('different'),
				'message' => 'Le mot de passe est identique à l\'ancien',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le mot de passe est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'mot_de_passe_conf' => array(
			'diff' => array(
				'rule' => array('motPasseConf'),
				'message' => 'Les mots de passe diffèrent'
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => true,
				'message' => 'Le mot de passe est vide',
			),
		),
	);

	var $belongsTo = array(
		'Statut' => array(
			'className' => 'Statut',
			'foreignKey' => 'statut_id',
		),
		'Departement' => array(
			'className' => 'Departement',
			'foreignKey' => 'departement_id',
		),
		'Groupe' => array(
			'className' => 'Groupe',
			'foreignKey' => 'groupe_id',
		)
	);

	var $hasMany = array(
		'Note' => array(
			'className' => 'Note',
			'foreignKey' => 'personne_id',
		),
		'Absence' => array(
			'className' => 'Absence',
			'foreignKey' => 'personne_id',
		),
		'Document' => array(
			'className' => 'Document',
			'foreignKey' => 'personne_id',
		),
		'Message' => array(
			'className' => 'Message',
			'foreignKey' => 'personne_id',
		)
	);


	var $hasAndBelongsToMany = array(
		'Evenement' => array(
			'className' => 'Evenement',
			'joinTable' => 'evenements_personnes',
			'foreignKey' => 'personne_id',
			'associationForeignKey' => 'evenement_id',
		),
		'Module' => array(
			'className' => 'Module',
			'joinTable' => 'modules_personnes',
			'foreignKey' => 'personne_id',
			'associationForeignKey' => 'module_id',
		)
	);
	
	public function dateNaissance ($check)
	{
		return $check['date_naissance'] < date('Y-m-d H:i:s');
	}
	
	// Mot de passe non vide
	public function verifMotPasse ($check)
	{
		App::import('Auth', 'Component');
		$Auth = new AuthComponent();
		return $check['mot_de_passe'] != $Auth->password('');
	}
	
	// Mot de passe identique à l'actuel
	public function identique ($check)
	{
		App::import('Auth', 'Component');
		$Auth = new AuthComponent();
		$this->recursive = -1;
		$this->findMotPasse = true;
		$p = $this->findById($this->data['Personne']['id']);
		return $Auth->password($check['mot_de_passe']) == $p['Personne']['mot_de_passe'];
	}
	
	// Mot de passe différent de l'ancien
	public function different ($check)
	{
		return $check['mot_de_passe_change'] != $this->data['Personne']['mot_de_passe'];
	}
	
	// Mot de passe identique au premier
	public function motPasseConf ($check)
	{
		return $check['mot_de_passe_conf'] == $this->data['Personne']['mot_de_passe_change'];
	}
	
	// Bureau Prof
	public function verifBureauProf($check)
	{
		if (empty($check['bureau']) && $this->data['Personne']['statut_id'] >= 20)
			return false;
		else
			return true;
	}
	
	// Bureau Eleve
	public function verifBureauEleve($check)
	{
		if (!empty($check['bureau']) && $this->data['Personne']['statut_id'] < 20)
			return false;
		else
			return true;
	}
	
	public function afterFind ($results)
	{
		if (!is_bool($this->findMotPasse) OR $this->findMotPasse == false)
		{
			foreach ($results as $k => $p)
			{
				if (is_integer($k))
				{
					unset($results[$k]['Personne']['mot_de_passe']);
					if (isset($p['Personne']['date_naissance']))
						$results[$k]['Personne']['date_naissance'] = substr($p['Personne']['date_naissance'], 0, 10);
				}
				elseif (is_string($k) AND $k == 'mot_de_passe')
					unset($results[$k]);
			}
		}
		return $results;
	}
	
	public function findDisplayName ($personnes)
	{
		$this->recursive = -1;
		foreach ($personnes as $k => $p)
		{
			$personnes[$k] = $p = trim($p);
			if (empty($p))
				unset($personnes[$k]);
		}
		$p = $this->find('list', array('conditions' => array('CONCAT(nom, " ", prenom)' => $personnes)));
		return array('personnes' => $p, 'all' => count($personnes) == count($p));
	}
	
	public function beforeFind ($datas)
	{
		$this->virtualFields = array('display' => 'CONCAT('.$this->alias.'.nom, " ", '.$this->alias.'.prenom)');
	}
	
	public function beforeSave ()
	{
		if (isset($this->data['Personne']['nom']))
			$this->data['Personne']['nom'] = strtoupper($this->data['Personne']['nom']);
		if (isset($this->data['Personne']['prenom']))
			$this->data['Personne']['prenom'] = ucwords($this->data['Personne']['prenom']);
		return true;
	}

}
?>