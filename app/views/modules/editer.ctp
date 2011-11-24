<?php 

$this->title = 'Intranet | Editer Modules ';

echo '<div class="page-header">
	<h1>Gestion des modules</h1>
	<h2>Editer un module </h2>
	</div>';

debug($modules);

echo $this->Form->create('module').
	$this->Form->input('libelle_module_id', array('label' => 'Libellé du module', 'placeholder'=>$modules[0]['Module']['libelle_module_id'])).
	$this->Form->input('abreviation', array('label' => 'Abreviation', 'placeholder'=>$modules[0]['Module']['abreviation'])).
	$this->Form->input('semestre_id', array('label' => 'Semestre', 'placeholder'=>$modules[0]['Module']['semestre_id'])).
	$this->Form->input('coefficient', array('label' => 'Coefficient', 'placeholder'=>$modules[0]['Module']['coefficient'])).
	$this->Form->input('volume_horaire', array('label' => 'Volume horaire', 'placeholder'=>$modules[0]['Module']['volume_horaire'])).
	$this->Form->input('description', array('label' => 'Une description', 'placeholder'=>$modules[0]['Module']['description'])).
	'<div class="actions">'.
	$this->Form->submit('Enregistrer').
	'</div>'.
	$this->Form->end();

?>