<?php
class Message extends AppModel {
	var $name = 'Message';
	var $displayField = 'titre';
	var $validate = array(
		'titre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le titre du message est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'maxlength' => array(
				'rule' => array('maxlength', 255),
				'message' => 'Le titre est trop long (255 cractères)',
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

	var $hasAndBelongsToMany = array(
		'Personne' => array(
			'className' => 'Personne',
			'joinTable' => 'messages_personnes',
			'foreignKey' => 'message_id',
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
	
	public function beforeSave ()
	{
		$date = new Date();
		$this->data['Message']['date_envoi'] = $date->format('Y-m-d H:i:s');
		$this->data['Message']['personne_id'] = $this->Auth->read('id');
		// $this->data['Message']['personne_id'] = $this->Session->read('Auth.Personne.id');
		return true;
	}

}
?>