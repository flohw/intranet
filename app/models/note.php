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
		
		public function findMesNotes ($idPers, $idGroupe)
		{
			$this->recursive = $this->Module->recursive = $this->Personne->Groupe->recursive = -1;
			$this->Module->contain(array('TypeModule'));
			$g = $this->Personne->Groupe->findById($idGroupe);
			$mod = $this->Module->find('all', array('conditions' => array('semestre_id' => $g['Groupe']['semestre_id'])));
			$r = array();
			$moy = $coef = 0;
			foreach ($mod as $m)
			{
				if (!empty($m['TypeModule']))
				{
					$moduleId = $m['Module']['id'];
					$r[$moduleId]['abreviation'] = $m['Module']['abreviation'];
					$r[$moduleId]['coefficient'] = 1;
					$r[$moduleId]['moyenne'] = 0;
					$r[$moduleId]['Note'] = array();
					foreach ($m['TypeModule'] as $tm)
					{
						$typeModuleId = $tm['id'];
						$r[$moduleId]['Note'][$typeModuleId]['nom'] = $tm['nom'];
						$n = $this->find('first', array('conditions' => array(	'personne_id' => $idPers,
																				'module_id' => $moduleId,
																				'type_module_id' => $tm['id'])));
						if (!empty($n))
						{
							$r[$moduleId]['moyenne'] = $r[$moduleId]['coefficient'] = 0;
							$r[$moduleId]['Note'][$typeModuleId]['coefficient'] = $n['Note']['coefficient'];
							$r[$moduleId]['Note'][$typeModuleId]['note'] = $n['Note']['note'];
							foreach ($r[$moduleId]['Note'] as $note)
							{
								$r[$moduleId]['coefficient'] += $note['coefficient'];
								$r[$moduleId]['moyenne'] += $note['note'] * $note['coefficient'];
							}
							$r[$moduleId]['moyenne'] /= $r[$moduleId]['coefficient'];
						}
						else
							$r[$moduleId]['moyenne'] = 'Pas de note';
					}
					if (is_numeric($r[$moduleId]['moyenne']))
					{
						$moy += $r[$moduleId]['moyenne'] * $r[$moduleId]['coefficient'];
						$coef += $r[$moduleId]['coefficient'];
					}
				}
			}
			if ($coef != 0)	$moy = $moy / $coef;
			else			$moy = 'Pas de note';
			return array('notes' => $r, 'moyenne' => $moy);
		}
	}
