<?php $this->title = 'Intranet | Administration | Les modules'; ?>
<div class="page-header">
	<h1>Affecter un module</h1>
</div>

<?php echo $this->Form->create('ModulesTypeModule', array('url' => $this->Html->url(array('action' => 'affectertype'), true))); ?>
	
	<div class="clearfix">
	<?php echo $this->Form->input('module_id', array('label' => 'Module', 'class' => 'input', 'options' => $modules)); ?>
	</div>
	<div class="clearfix">
	<?php echo $this->Form->input('type_module_id', array('label' => 'Type de module', 'class' => 'input', 'options' => $typesMod)); ?>
	</div>
	<div class="actions">
	<?php echo $this->Form->submit('Affecter', array('class' => 'btn primary')); ?>
	</div>
<?php echo $this->Form->end(); ?>