<?php
class Module extends AppModel {
	var $name = 'Module';
	var $displayField = 'abreviation';
	var $actsAs = array('Containable');
	var $validate = array(
		'abreviation' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'L\'abréviation du module est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Le nom doit être une chaine alphanumérique',
			),
			'maxlength' => array(
				'rule' => array('maxlength', 45),
				'message' => 'Le nom du module est trop longue (45 caractères)',
			)
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'La description du module est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'coefficient' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le coefficient est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Le coefficient doit être un nombre',
			),
			'zero' => array(
				'rule' => array('comparison', '>', 0),
				'message' => 'le coefficient ne peut pas être égal à zéro',
			),
		),
		'volume_horaire' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le volume horaire est vide',
				'allowEmpty' => false,
				'required' => true,
			),
			'zero' => array(
				'rule' => array('comparison', '>', 0),
				'message' => 'Le volume horaire ne peut pas être égal à zéro',
			),
		),
	);

	var $hasMany = array(
		'Document' => array(
			'className' => 'Document',
			'foreignKey' => 'module_id',
		),
	);

	var $belongsTo = array(
		'LibelleModule' => array(
			'className' => 'LibelleModule',
			'foreignKey' => 'libelle_module_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Semestre' => array(
			'className' => 'Semestre',
			'foreignKey' => 'semestre_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Personne' => array(
			'className' => 'Personne',
			'joinTable' => 'modules_personnes',
			'foreignKey' => 'module_id',
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
		),
		'TypeModule' => array(
			'className' => 'TypeModule',
			'joinTable' => 'modules_type_modules',
			'foreignKey' => 'module_id',
			'associationForeignKey' => 'type_module_id',
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
	
	public function findModules ($idPers)
	{
		$pers = $this->ModulesPersonne->find('all', array('conditions' => array('personne_id' => $idPers)));
		$r = array();
		foreach ($pers as $p)
		{
			$mod = $this->find('first', array('conditions' => array('id' => $p['ModulesPersonne']['module_id']), 'recursive' => -1));
			$r[$mod['Module']['id']] = $mod['Module']['abreviation'];
		}
		return $r;
	}
	
	public function findProfs ($idProf)
	{
		$this->Personne->recursive = 2;
		$pers = $this->Personne->findById($idProf);
		foreach ($pers['Module'] as $k => $p)
			unset($pers['Module'][$k]['ModulesPersonne'], $pers['Module'][$k]['Document'], $pers['Module'][$k]['TypeModule']);
		
		return $pers['Module'];
	}
	
	public function findProfsModule ($idModule)
	{
		$pe = $this->findById($idModule);
		$pe =$pe['Personne'];
		$r = array();
		foreach ($pe as $p)
			$r[$p['id']] = $p['login'];
		return $r;
	}
	
	public function findModuleType ($idProf)
	{
		$this->TypeModule->contain(array(
				'Module.Personne' => array(
					'conditions' => array('Personne.id' => $idProf))));
		$modules = $this->TypeModule->find('all');
		$r = array();
		foreach ($modules as $k => $mod)
		{
			$r[$mod['TypeModule']['nom']] = array();
			foreach ($mod['Module'] as $kk => $m)
			{
				if (!empty($m['Personne']))
					$r[$mod['TypeModule']['nom']][$mod['TypeModule']['id'].'-'.$m['id']] = $m['abreviation'];
			}
		}
		return $r;
	}

}
?>