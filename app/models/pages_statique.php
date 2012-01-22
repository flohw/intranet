<?php
class PagesStatique extends AppModel {
	var $name = 'PagesStatique';
	var $validate = array(
		'titre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le titre ne peut pas être vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'contenu' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le contenu de la page ne peut pas être vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);

	var $hasAndBelongsToMany = array(
		'DocumentsStatique' => array(
			'className' => 'DocumentsStatique',
			'joinTable' => 'pages_statiques_documents_statiques',
			'foreignKey' => 'pages_statique_id',
			'associationForeignKey' => 'documents_statique_id',
			'unique' => true,
		)
	);
}
?>