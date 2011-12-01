<?php
class Message extends AppModel {
	var $name = 'Message';
	var $displayField = 'titre';
	var $recursive = 0;
	var $validate = array(
		'titre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le titre du message est vide',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'create',
			),
			'maxlength' => array(
				'rule' => array('maxlength', 255),
				'message' => 'Le titre est trop long (255 cractères)',
				'on' => 'create',
			),
		),
		'message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le message ne peut pas être vide',
				'allowEmpty' => false,
				'required' => true
			),
		),
		'destinataire' => array(
			'personneid' => array(
				'rule' => array('personneId'),
				'message' => 'La personne n\'existe pas',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'La personne n\'est pas renseignée',
				'allowEmpty' => false,
				'required' => true
			),
		),
	);

	var $belongsTo = array(
		'Expediteur' => array(
			'className' => 'Personne',
			'foreignKey' => 'personne_id',
			'fields' => 'id, login, nom, prenom',
		),
		'Destinataire' => array(
			'className' => 'Personne',
			'foreignKey' => 'destinataire_id',
			'fields' => 'id, login, nom, prenom',
		),
	);
		
	public function personneId ($check)
	{
		return !empty($this->data['Message']['destinataire_id']);
	}
	
	public function findMyMessages ($id)
	{
		$messages = $this->find('all', array('conditions' => array('or' => array(
																		'destinataire_id' => $id,
																		'personne_id' => $id)
																	),
																	'order' => 'titre'));
		foreach ($messages as $k => $m)
		{
			if ($m['Message']['personne_id'] == $id AND $m['Message']['supprime_exp'] OR
				$m['Message']['destinataire_id'] == $id AND $m['Message']['supprime_dest'])
				unset($messages[$k]);
		}
		
		return $messages;
	}

}
?>