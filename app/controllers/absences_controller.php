<?php 	

class AbsencesController extends AppController {
	
	var $name = 'Absences';
	var $uses = array('Absence', 'Personne');

	function index($id = null) {

		if (isset($this->data))
		{
			$this->Absence->set($this->data);
			if ($this->Absence->validates())
			{
				$this->Absence->save($this->Absence->data, false);
				$this->Session->setFlash('Absence sauvegardé !', 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('L\'absence est incorrecte', 'message');
			}
		}
		elseif (!is_null($id))
			$this->data = $this->Absence->find('first', array('conditions' => array('Absence.id' => $id), 'recursive' => -1));

		$pers['personnes'] = $this->Personne->find('list', array('conditions' => array('statut_id' => $this->statuts['eleve'])));
		$pers['absences'] = $this->Absence->find('all');
		$this->set($pers);
	}

}

?>