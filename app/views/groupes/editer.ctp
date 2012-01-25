<?php
	$sousTitre = (!empty($this->data['Groupe']['id'])) ? 'Editer' : 'Ajouter';
	$this->title = 'Intranet | Administration | '.$sousTitre.' un groupe'; ?>
<div class="page-header">
	<h1>
		<?php echo $sousTitre; ?> un groupe
		<?php echo ($sousTitre == 'Editer') ? '<small>'.$this->data['Groupe']['nom'].'</small>' : null; ?>
	</h1>
</div>

<span class="row">
	<span class="span16">
	<?php echo $this->Form->create('Groupe'); ?>
	<?php echo $this->Form->input('id'); ?>
	<div class="clearfix">
		<?php echo $this->Form->input('nom', array('label' => 'Nom du groupe', 'class' => 'input')); ?>
	</div>
	<div class="clearfix">
		<?php echo $this->Form->input('semestre_id', array('label' => 'Pour le semestre', 'class' => 'input', 'options' => $semestres)); ?>
	</div>
	<div class="clearfix">
		<?php echo $this->Form->input('nb_max_eleves', array('label' => 'Nombre d\'élèves', 'class' => 'input')); ?>
	</div>
	<div class="actions">
		<?php echo $this->Form->submit('Envoyer', array('class' => 'btn primary')); ?>
	</div>
	<?php echo $this->Form->end(); ?>
	</span>
</span>