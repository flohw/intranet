<?php $this->title = 'Intranet | Administration | Affecter un Enseignant'; ?>
<div class="page-header">
	<h1>Affecter un module à un professeur</h1>
</div>

<span class="row">
	<span class="16">
	<?php echo $this->Form->create('Module'); ?>
	
		<div class="clearfix">
		<?php echo $this->Form->input('Personne.id', array('label' => 'Enseignant', 'options' => $personnes, 'class' => 'input')); ?>
		</div>
		
		<div class="clearfix">
		<?php echo $this->Form->input('Module.id', array('label' => 'Module', 'options' => $modules, 'class' => 'input')); ?>
		</div>
		
		<div class="actions">
		<?php echo $this->Form->submit('Affecter', array('class' => 'btn primary')); ?>
		</div>
	<?php echo $this->Form->end(); ?>
	</span>
</span>