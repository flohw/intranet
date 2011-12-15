<?php 

class EvenementsController extends AppController
{
	var $name ='Evenements';
	var $uses = array('Evenement', 'EvenementsPersonne', 'TypeEvenement', 'Personne', 'Groupe', 'Semestre');

//fonction editer
function editer($id = null)
{
	$i = $this->Auth->user('id');

	//on ajoute / modifie / supprime
	if (isset($this->data))
	{
	 if ($this->data['Action']=="Supprimer")
	 {
	 	$this->EvenementsPersonne->deleteAll('evenement_id="'.$id.'"', false);
	 	$this->Evenement->deleteAll('`Evenement`.`id`="'.$id.'"', false);
	 	$this->Session->setFlash('Evenement supprimé !', 'message', array('class' => 'success'));
	 	$this->redirect(array('action' => 'editer'));
	 }
	 else
	 {
		if (!is_null($id)) $this->data['Evenement']['id']=$id; $b = ''; $c=''; $d=''; $copy = $this->data;
		if (!empty($this->data['Evenements_personnes']['personne']))
		 {
		 //met les personnes dans un tableau
			 $a=substr_count($this->data['Evenements_personnes']['personne'], ','); 
			 if ($a != 0) $people = explode(',', $this->data['Evenements_personnes']['personne']);
			 else $people[] = $this->data['Evenements_personnes']['personne'];

		 //verifie que les login existent, remplace les login par les id
			 foreach ($people as $p)
			 {
				$p = trim($p); $p = rtrim($p); //supprime les espaces eventuels
				$a = $this->Personne->find('first', array('conditions' => array('Personne.login' => $p)));
				if (empty($a)) $b .= $p.', ';
				else $people_[$a['Personne']['id']] = $a['Personne']['id'];
			 }
			 if (!empty($b))
			 {
				$b = substr($b, 0, -2);	//on enleve la derniere virgule
				$b='Login introuvable : '.$b."</br>";
			 }
		 }
		if (!empty($this->data['Evenements_personnes']['semestre']))
		 {
		 //met les semestres dans un tableau
			 $a=substr_count($this->data['Evenements_personnes']['semestre'], ','); 
			 if ($a != 0) $semestre = explode(',', $this->data['Evenements_personnes']['semestre']);
			 else $semestre[] = $this->data['Evenements_personnes']['semestre'];

		 //verifie que les semestres existent, remplace les groupe par les id
			 foreach ($semestre as $p)
			 {
				$p = trim($p); $p = rtrim($p); //supprime les espaces eventuels
				$p = 'Semestre '.$p;
				$a = $this->Semestre->find('first', array('conditions' => array('Semestre.nom' => $p)));
				if (empty($a)) $c .= $p.', ';
				else $semestre_[] = $a['Semestre']['id'];
			 }
			 if (!empty($c))
			 {
				$c = substr($c, 0, -2);	//on enleve la derniere virgule
				$c='Semestre introuvable : '.$c."</br>";
			 }
		 }
		if (!empty($this->data['Evenements_personnes']['groupe']))
		 {
		 //met les groupes dans un tableau
			 $a=substr_count($this->data['Evenements_personnes']['groupe'], ','); 
			 if ($a != 0) $groupe = explode(',', $this->data['Evenements_personnes']['groupe']);
			 else $groupe[] = $this->data['Evenements_personnes']['groupe'];

		 //verifie que les groupes existent, remplace les groupe par les id
			 foreach ($groupe as $p)
			 {
				$p = trim($p); $p = rtrim($p); //supprime les espaces eventuels
				$groupe_ = $this->Groupe->find('list', array('conditions' => array('Groupe.nom' => $p)));
				if (empty($groupe_)) $d .= $p.', ';
			 }
			 if (!empty($d)) 
			 {
				$d = substr($d, 0, -2);	//on enleve la derniere virgule
				$d='Groupe introuvable : '.$d."</br>";
			 }
		 }

		//=> affiche un message d'erreur si un login/groupe/semestre incorrect
			$b .= $c.$d; unset($c); unset($d);

			if (empty($this->data['Evenements_personnes']['groupe']) && 
				empty($this->data['Evenements_personnes']['semestre']) && 
				empty($this->data['Evenements_personnes']['personne'])) 
				$b='Vous devez choisir des participants';

			if (!empty($this->data['Evenements_personnes']['groupe']) && 
				empty($this->data['Evenements_personnes']['semestre'])) 
				$b='Vous ne pouvez pas choisir de groupe sans choisir de semestre';

			if (!empty($b)) { $this->data = $copy; $this->Session->setFlash($b, 'message'); }

		//=> sinon enregistre
			else
			{
				//on commence par enregistrer l'evenement
				$this->data['Evenement']['personne_id']=$i; 
				$this->Evenement->create(); 
				$this->Evenement->set($this->data);

				if ($this->Evenement->validates())
				{
					$this->Evenement->save();

					//on recupere l'id de l'evenement
					 if ($this->data['Action']=="ajouter") { $id = $this->Evenement->getLastInsertId(); $ajouter = ''; } 
					 else { $this->EvenementsPersonne->deleteAll('evenement_id="'.$id.'"', false); }
					
					//=> on remplit le tableau de participants
					if (!empty($this->data['Evenements_personnes']['semestre']) && 
						!empty($this->data['Evenements_personnes']['groupe']))
					 {
						 $b='`groupe_id` IN (SELECT `id` FROM `groupes` WHERE (`semestre_id`="'.$semestre_[0].'"'; 
						 for($k=1; $k<count($semestre_); $k++) 
						 	 $b.=' OR `semestre_id`="'.$semestre_[$k].'"';

						 $b.=') AND (`nom`="'.$groupe[0].'"';
						 for($k=1; $k<count($groupe); $k++) 
						 {
						 	 $p = $groupe[$k]; $p = trim($p); $p = rtrim($p); //supprime les espaces eventuels
						 	 $b.=' OR `nom`="'.$p.'"';
						 }

						 $b.='))'; 

						 $a_ = $this->Personne->find('list', array(
							 'recursive' => -1, 
							 'fields'=>'Personne.id',
							 'conditions'=>$b));

						  $people_ = array_merge($people_, $a_);
					 }
					else if (!empty($this->data['Evenements_personnes']['semestre']))
					 {
					 	 $b='`groupe_id` IN (SELECT `id` FROM `groupes` WHERE `semestre_id`="'.$semestre_[0].'"'; 
						 for($k=1; $k<count($semestre_); $k++) 
						 	 $b.=' OR `semestre_id`="'.$semestre_[$k].'"';

						 $b.=')';

						 $a_ = $this->Personne->find('list', array(
							'recursive' => -1, 
							'fields'=>'Personne.id',
							'conditions'=>$b));

						 $people_ = array_merge($people_, $a_);
					 }
					//sinon groupe et semestre sont vides => people_ est deja remplit

					//on enregistre les participants
					unset($this->data);
					$this->data['EvenementsPersonne']['evenement_id']=$id;
					$people_ = array_unique($people_);
					 foreach ($people_ as $p)
					 {
					 	$this->data['EvenementsPersonne']['personne_id']=$p;
					 	$this->EvenementsPersonne->create();	//pour qu'il insert et non update !
					 	$this->EvenementsPersonne->set($this->data);
					 	$this->EvenementsPersonne->save();				 	
					 }
				 
				 $this->data = $copy; if(isset($ajouter)) $id=NULL; 
				 $this->Session->setFlash('Evenement sauvegardé !', 'message', array('class' => 'success'));
				}
				else
				{
					$this->data=$copy;
					$this->Session->setFlash('L\'evenement est incorrect', 'message');
				}
			}
	 }
	}
	//on affiche les informations de l'evenement selectionne
	else
	{
		$this->data = $this->Evenement->find('first', array('recursive' => -1, 'conditions' => array('id' => $id)));
		$p_ = $this->Personne->find('list', array('recursive' => -1, 'conditions'=>'`id` IN (SELECT `personne_id` FROM `evenements_personnes` WHERE `evenement_id`="'.$id.'")'));
		$b = ''; foreach ($p_ as $p) $b .= $p.', '; $b = substr($b, 0, -2);
		$this->data['Evenements_personnes']['personne'] = $b;
	}

	//dans tous les cas on affiche les evenements que l'utilisateur a enregistre
	$d['evenements'] = $this->Evenement->find('list', array('conditions'=>array('personne_id'=>$i)));
	$d['type'] = $this->TypeEvenement->find('list');
	$d['action'] = (is_null($id)) ? 'ajouter' : 'editer';
	$this->set($d);
} 
//fin fonction editer

} //fin class

?>