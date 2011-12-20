<?php

	class Note extends AppModel
	{
		var $name = 'Note';
		var $belongsTo = array(
			'Personne' => array(
				'className' => 'Personne',
				'foreignKey' => 'personne_id',
			),
			'Module' => array(
				'className' => 'Module',
				'foreignKey' => 'module_id',
			),
		);
		var $validate = array(
			'note' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'allowEmpty' => false,
					'requried' => true
				),
			)
		);
	}
