<?php

	class Note extends AppModel
	{
		var $name = 'Note';
		var $actsAs = array('Containable');
		var $belongsTo = array(
			'Personne' => array(
				'className' => 'Personne',
				'foreignKey' => 'personne_id',
			),
			'Module' => array(
				'foreignKey' => 'module_id',
				'className' => 'Module',
			),
			'TypeModule' => array(
				'foreignKey' => 'type_module_id',
				'className' => 'TypeModule',
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
		
		public function findNotes ($idGroupe, $idModule, $idTypeModule)
		{
			$pe = $this->Personne->findAllByGroupeId($idGroupe);
			$r = array();
			foreach ($pe as $p)
				$r[$p['Personne']['id']] = $p['Personne']['id'];
			
			$mod = $this->find('all', array('conditions' => array('type_module_id' => $idTypeModule, 'module_id' => $idModule, 'personne_id' => $r)));
			$r = array();
			foreach ($mod as $k => $m)
			{
				if ($k == 0) $r['coefficient'] = $m['Note']['coefficient'];
				$r[$m['Personne']['id']] = array('note' => $m['Note']['note'], 'personne_id' => $m['Personne']['id']);
			}
			return array('Note' => $r);
		}
		
		public function findMesNotes ($idPers)
		{
			$this->contain(array('TypeModule', 'Module'));
			$notes = $this->find('all', array('conditions' => array('personne_id' => $idPers)));
			$r = array();
			foreach ($notes as $n)
			{
				$moduleID = $n['Module']['id'];
				$typeModuleID = $n['TypeModule']['id'];
				$r[$moduleID]['abreviation'] = $n['Module']['abreviation'];
				$r[$moduleID]['moyenne'] = 0;
				$r[$moduleID]['coefficient'] = 0;
				$r[$moduleID]['Note'][$typeModuleID]['nom'] = $n['TypeModule']['nom'];
				$r[$moduleID]['Note'][$typeModuleID]['coefficient'] = $n['Note']['coefficient'];
				$r[$moduleID]['Note'][$typeModuleID]['note'] = $n['Note']['note'];
				$moyenne = 0;
				foreach ($r[$moduleID]['Note'] as $note)
				{
					$r[$moduleID]['coefficient'] += $note['coefficient'];
					$r[$moduleID]['moyenne'] += $note['note'] * $note['coefficient'];
				}
				$r[$moduleID]['moyenne'] /= $r[$moduleID]['coefficient'];
			}
			return $r;
		}
	}
