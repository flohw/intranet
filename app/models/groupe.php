<?php
class Groupe extends AppModel {
	var $name = 'Groupe';
	var $displayField = 'nom';
	var $order = 'Groupe.nom';
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nom du groupe est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Le nom du groupe doit être une chaine de caractères alphanumériques',
			),
			'unique' => array(
				'rule' => array('groupeUnique'),
				'message' => 'Le groupe existe déjà pour le semestre',
			),
		),
		'nb_max_eleves' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nombre d\'élèves du groupe est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Ce n\'est pas un nombre',
			),
		),
	);

	var $belongsTo = array(
		'Semestre' => array(
			'className' => 'Semestre',
			'foreignKey' => 'semestre_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Semestre.nom'
		)
	);

	var $hasMany = array(
		'Personne' => array(
			'className' => 'Personne',
			'foreignKey' => 'groupe_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function groupeUnique ($check)
	{
		$this->recursive = -1;
		$g=$this->find('first', array('conditions' => array('nom' => $check['nom'], 'semestre_id' => $this->data['Groupe']['semestre_id'])));
		return (empty($g)) OR $g['Groupe']['id'] == $this->data['Groupe']['id'];
	}
	
	public function findDisplayName ($groupes)
	{
		$res = array('all' => true, 'personnes' => array());
		$this->recursive = $this->Semestre->recursive = $this->Personne->recursive = -1;
		foreach ($groupes as $k => $g)
		{
			$g = trim($g);
			if (empty($g))
				unset($groupes[$k]);
			else
			{
				$groupes[$k] = explode('-', $g);
				if (count($groupes[$k]) == 2)
				{
					$groupes[$k]['semestre'] = trim($groupes[$k][0]);
					$groupes[$k]['groupe'] = trim($groupes[$k][1]);
					unset($groupes[$k][0], $groupes[$k][1]);
					$sid = $this->Semestre->findByNom($groupes[$k]['semestre']);
					$sid = $sid['Semestre']['id'];
					$gid = $this->find('first', array('conditions' => array('semestre_id' => $sid, 'nom' => $groupes[$k]['groupe'])));
					if (empty($gid))
						$res['all'] = false;
					$res['personnes'] = array_merge($res['personnes'], $this->Personne->find('all', array('conditions' => array('groupe_id' => $gid['Groupe']['id']))));
				}
				else
					$res['all'] = false;
			}
		}
		foreach ($res['personnes'] as $k => $r)
		{
			unset($res['personnes'][$k]);
			$res['personnes'][$r['Personne']['id']] = $r['Personne']['nom'].' '.$r['Personne']['prenom'];
		}
		return $res;
	}
	public function getGroupeList ()
	{
		$se = $this->Semestre->find('list');
		$gr = $this->find('all', array('recursive' => -1));
		$r = array();
		foreach ($se as $id => $s)
		{
			foreach ($gr as $k => $g)
			{
				if ($g['Groupe']['semestre_id'] == $id)
				{
					$r[$s][$g['Groupe']['id']] = $g['Groupe']['nom'];
					unset($gr[$k]);
				}
			}
		}
		return $r;
	}

}
?>