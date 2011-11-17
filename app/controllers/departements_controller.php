<?php
class DepartementsController extends AppController
{

	var $name = 'Departements';


	function index() {
		$resul_rech = $this->Departement->find('all');
		$this->set('departements',$resul_rech);
	}


	function nouveau() {
		if(isset($this->data))
		{
			echo '<script>alert(\'hello\')</script>';
			$this->Departement->set($this->data);
			if ($this->Departement->validates())
			{
				$this->Departement->save();
				$this->Session->setFlash("Departement sauvegardé !");
				$this->redirect(array('action' => 'nouveau'));
			}
			else
				$this->Session->setFlash("Le departement est incorrect");
		}
		$d['departements'] = $this->Departement->find('list');
		$this->set($d);
	}

	function modifier($id =null) {
		$resul_rech = $this->Departement->find('list');
		$this->set('departements',$resul_rech);
	}
}

?>