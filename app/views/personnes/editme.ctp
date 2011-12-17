<?php $this->title = 'Intranet | Editer mon mot de passe'; ?>
<div class="page-header">
	<h1>Editer mot mot de passe</h1>
</div>

<span class="row">
	<span class="span16">
<?php	echo $this->Form->create('Personne'); ?>
		<div class="clearfix">
<?php	echo $this->Form->input('mot_de_passe', array('label' => 'Ancien mot de passe')); ?>
		</div>
		<div class="clearfix">
<?php	echo $this->Form->input('mot_de_passe_change', array('label' => 'Nouveau mot de passe')); ?>
		</div>
		<div class="clearfix">
<?php	echo $this->Form->input('mot_de_passe_conf', array('label' => 'Confirmation du mot de passe')); ?>
		</div>
		<div class="actions">
<?php	echo $this->Form->submit('Changer de mot de passe', array('class' => 'btn primary')); ?>
		</div>
	</span>
</span>