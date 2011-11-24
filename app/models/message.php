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
		'Expediteur' => array(
			'className' => 'Personne',
			'foreignKey' => 'personne_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Destinataire' => array(
			'className' => 'Personne',
			'foreignKey' => 'destinataire_id'
		),
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