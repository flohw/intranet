<?php $this->title = 'Intranet | Editer Modules'; ?>

<div class="page-header">
	<?php $sousTitre = (isset($this->data['Module']['id'])) ? 'Editer' : 'Ajouter'; ?>
	<h1>Gestion des modules <small><?php echo $sousTitre; ?> un module</small></h1>
</div>
<?php

	echo $this->Form->create('Module');
	echo $this->Form->input('id');
	echo '<div class="clearfix">';
	echo $this->Form->input('libelle_module_id', array('label' => 'Libellé du module', 'class'=> 'input', 'options'=> $libel));
	echo '</div>';
	echo '<div class="clearfix">';
	echo	$this->Form->input('abreviation', array('label' => 'Abreviation', 'class'=> 'input'));
	echo '</div>';
	echo '<div class="clearfix">';
	echo	$this->Form->input('semestre_id', array('label' => 'Semestre', 'options'=> $sem, 'class'=> 'input'));
	echo '</div>';
	echo '<div class="clearfix">';
	echo	$this->Form->input('coefficient', array('label' => 'Coefficient', 'class'=> 'input'));
	echo '</div>';
	echo '<div class="clearfix">';
	echo	$this->Form->input('volume_horaire', array('label' => 'Volume horaire', 'class'=> 'input'));
	echo '</div>';
	echo '<div class="clearfix">';
	echo	$this->Form->input('description', array('label' => 'Une description', 'class'=> 'input'));
	echo '</div>';
	echo '<div class="actions">';
	echo $this->Form->submit('Enregistrer', array('class'=> 'btn primary'));
	echo '</div>';
	echo $this->Form->end();

?>