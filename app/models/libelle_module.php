<?php
class LibelleModule extends AppModel {
	var $name = 'LibelleModule';
	var $displayField = 'nom';
	var $actsAs = array('Containable');
	var $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le libellé du module est vide',
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);

	var $hasMany = array(
		'Module' => array(
			'className' => 'Module',
			'foreignKey' => 'libelle_module_id',
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
	
	public function modulesBySem ($sem)
	{
		$this->contain('Module.Personne');
		$datas = $this->find('all', array('recursive' => 2));
		foreach ($datas as $k => $data)
		{
			foreach ($data['Module'] as $kk => $d)
			{
				if ($d['semestre_id'] != $sem)
					unset($datas[$k]['Module'][$kk]);
				else
				{
					foreach ($d['Personne'] as $c => $d)
					{
						unset($datas[$k]['Module'][$kk]['Personne'][$c]);
						$datas[$k]['Module'][$kk]['Personne'][$d['id']] = $d['prenom'].' '.$d['nom'];
					}
				}
			}
			
			if (empty($datas[$k]['Module']))
				unset($datas[$k]);
		}
		
		return $datas;
	}

}
?>