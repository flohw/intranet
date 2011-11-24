<?php
class Personne extends AppModel {
	var $name = 'Personne';
	var $displayField = 'login';
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
				'rule' => array('date'),
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
		'mot_de_passe' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le mot de passe est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'login' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le login est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Le login doit être une chaine de caractères',
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
		'Abscence' => array(
			'className' => 'Abscence',
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
	
	public function afterFind ($results)
	{
		foreach ($results as $k => $p)
			unset($results[$k]['Personne']['mot_de_passe']);
		return $results;
	}

}
?>