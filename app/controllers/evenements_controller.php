<?php 

class EvenementsController extends AppController
{
	var $name ='Evenements';
	var $uses = array('Evenement', 'EvenementsPersonne', 'TypeEvenement', 'Personne');

	function editer($id = null)
	{
		$i = $this->Auth->user('id');
		if (isset($this->data))
		{
			 $b = ''; $copy = '';
			 if ($this->data['Action']=="ajouter")
			 {
			 $copy = $this->data['Evenements_personnes']; //laisse l'ancienne valeur ds le champ si erreur

			 //supprime les espaces eventuels
				$a=substr_count($this->data['Evenements_personnes']['personne'], ' '); 
				if ($a != 0) $this->data['Evenements_personnes']['personne'] = str_replace(' ','',$this->data['Evenements_personnes']['personne']);

			 //met les personnes dans un tableau
				$a=substr_count($this->data['Evenements_personnes']['personne'], ','); 
				if ($a != 0) $people = explode(',', $this->data['Evenements_personnes']['personne']);
				else $people[] = $this->data['Evenements_personnes']['personne'];

			 //verifie que les login existent 
				unset($this->data['Evenements_personnes']);
				foreach ($people as $id=>$p)
				{
					$a = $this->Personne->find('first', array('conditions' => array('Personne.login' => $p)));
					if (empty($a)) $b .= $p.', ';
					else $people_[] = $a['Personne']['id'];
				}
			 }
			 else $people_ = NULL;
			 //=> affiche un message d'erreur si un n'existe pas
				if (!empty($b))
				{
					$this->data['Evenements_personnes'] = $copy;
					$b = substr($b, 0, -2);	//on enleve la derniere virgule
					$this->Session->setFlash('Login introuvable : '.$b, 'message');
				}
			 //=> sinon enregistre
				else
				{
					//on commence par enregistrer l'evenement
					$this->data['Evenement']['personne_id']=$i;
					if (!is_null($id)) $this->data['Evenement']['id']=$id;
					$this->Evenement->set($this->data);
					if ($this->Evenement->validates())
					{
						$this->Evenement->save();

						//pour l'instant on ne peut pas modifier les destinataires
						if ($this->data['Action']=="ajouter")
						{
							$id = $this->Evenement->getLastInsertId();
							unset($this->data);

							//puis evenement_personnes
							$this->data['EvenementsPersonne']['evenement_id']=$id;
							 foreach ($people_ as $p)
							 {
							 	$this->data['EvenementsPersonne']['personne_id']=$p;
							 	$this->EvenementsPersonne->create();	//pour qu'il insert et non update !
							 	$this->EvenementsPersonne->set($this->data);
							 	$this->EvenementsPersonne->save();				 	
							 }
						}

						 $this->Session->setFlash('Evenement sauvegardé !', 'message', array('class' => 'success'));
						 //$this->redirect(array('action' => 'editer'));
					}
					else
					{
						$this->data['Evenements_personnes']=$copy;
						$this->Session->setFlash('L\'evenement est incorrect', 'message');
					}
				}
		}
		else
		{
			$this->data = $this->Evenement->find('first', array('recursive' => -1, 'conditions' => array('id' => $id)));
		}
		$d['evenements'] = $this->Evenement->find('list', array('conditions'=>array('personne_id'=>$i)));
		$d['type'] = $this->TypeEvenement->find('list');
		$d['action'] = (is_null($id)) ? 'ajouter' : 'editer';
		$this->set($d);
	}
}

?>