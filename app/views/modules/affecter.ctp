<?php $this->title = 'Intranet | Administration | Affecter un Enseignant'; ?>
<div class="page-header">
	<h1>Affecter un module à un professeur</h1>
</div>

<span class="row">
	<span class="16">
	<?php echo $this->Form->create('ModulesPersonne', array('url' => $this->Html->url(array('controller' => 'modules', 'action' => 'affecter')))); ?>
	
		<div class="clearfix">
		<?php echo $this->Form->input('personne_id', array('label' => 'Enseignant', 'options' => $personnes, 'class' => 'input')); ?>
		</div>
		
		<div class="clearfix">
		<?php echo $this->Form->input('module_id', array('label' => 'Module', 'options' => $modules, 'class' => 'input')); ?>
		</div>
		
		<div class="actions">
		<?php echo $this->Form->submit('Affecter', array('class' => 'btn primary')); ?>
		</div>
	<?php echo $this->Form->end(); ?>
	</span>
</span>