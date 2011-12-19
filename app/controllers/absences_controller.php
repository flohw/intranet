<?php 	

class AbsencesController extends AppController {
	
	var $name = 'Absences';
	var $uses = array('Absence', 'Personne');

	function index() {

		if (isset($this->data))
		{
			$this->Absence->set($this->data);
			if ($this->Absence->validates())
			{
				$this->Absence->save();
				$this->Session->setFlash('Absence sauvegardé !', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else
				$this->Session->setFlash('L\'absence est incorrecte', 'message');
		}

		$pers['personnes'] = $this->Personne->find('list', array('conditions' => array('statut_id' => 10)));
		$pers['absences'] = $this->Absence->find('all');
		$this->set($pers);
	}


	function editer($id) {
		
		if (isset($this->data))
		{
			$this->Absence->set($this->data);
			if ($this->Absence->validates())
			{
				$this->Absence->save();
				$this->Session->setFlash('Modifications sauvegardées !', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			
		}
		$a['personnes'] = $this->Personne->find('list', array('conditions' => array('statut_id' => 10)));
		$this->data = $this->Absence->find('first', array('conditions' => array('Absence.id' => $id), 'recursive' => -1));
		$this->set($a);
	}

}






 ?>