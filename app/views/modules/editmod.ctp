<?php $this->title = 'Intranet | Editer Modules '; ?>

<div class="page-header">
	<h1>Gestion des libelles des modules</h1>
	<h2>Editer un Libelle </h2>
</div>

<?php $this->Form->create('Module'); ?>
<?php
echo $this->Form->input('id');
echo '<div class="clearfix">';
echo	$this->Form->input('libelle_module_id', array('label' => 'Libellé du module', 'class'=> 'input', 'options'=> $libel));

echo '</div><div class="clearfix">';
echo	$this->Form->input('abreviation', array('label' => 'Abreviation', 'class'=> 'input'));
echo '</div><div class="clearfix">';
echo	$this->Form->input('semestre_id', array('label' => 'Semestre', 'options'=> $sem, 'class'=> 'input'));
echo '</div><div class="clearfix">';
echo	$this->Form->input('coefficient', array('label' => 'Coefficient', 'class'=> 'input'));
echo '</div><div class="clearfix">';
echo	$this->Form->input('volume_horaire', array('label' => 'Volume horaire', 'class'=> 'input'));
echo '</div><div class="clearfix">';
echo	$this->Form->input('description', array('label' => 'Une description', 'class'=> 'input'));
echo '</div>';
echo	'<div class="actions">';
echo	$this->Form->submit('Enregistrer', array('class'=> 'btn primary'));
echo	'</div>';
echo	$this->Form->end();

?>