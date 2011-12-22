<?php

	class Note extends AppModel
	{
		var $name = 'Note';
		var $belongsTo = array(
			'Personne' => array(
				'className' => 'Personne',
				'foreignKey' => 'personne_id',
			),
			'ModulesTypeModule' => array(
				'foreignKey' => 'modules_type_modules_id',
			),
		);
		var $validate = array(
			'coefficient' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'allowEmpty' => false,
					'requried' => true,
					'message' => 'Le coefficient est vide',
				),
				'zero' => array(
					'rule' => array('comparison', '>=', 0),
					'message' => 'Le coefficient ne peut pas être négatif'
				),
			),
		);
		
		public function findNotes ($modulesTypeID, $idGroupe)
		{
			$pe = $this->Personne->findAllByGroupeId($idGroupe);
			$r = array();
			foreach ($pe as $p)
				$r[$p['Personne']['id']] = $p['Personne']['id'];
			$mod = $this->find('all', array('conditions' => array('modules_type_modules_id' => $modulesTypeID, 'personne_id' => $r)));
			$r = array();
			foreach ($mod as $k => $m)
			{
				if ($k == 0) $r['coefficient'] = $m['Note']['coefficient'];
				$r[$m['Personne']['id']] = array('note' => $m['Note']['note'], 'personne_id' => $m['Personne']['id']);
			}
			return array('Note' => $r);
		}
	}
