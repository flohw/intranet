<?php $this->title = 'Intranet | Les Notes | Ajouter des notes'; ?>
<div class="page-header">
	<h1>Ajouter des notes</h1>
</div>
<?php echo $this->Form->create('Note'); ?>
	<div class="clearfix">
	<?php echo $this->Form->input('groupe', array('label' => 'Groupe', 'class' => 'input', 'options' => $groupes)); ?>
	</div>
	<div class="clearfix">
	<?php echo $this->Form->input('module', array('label' => 'Type de module', 'class' => 'input', 'options' => $modules)); ?>
	</div>
	
	<div class="actions">
	<?php echo $this->Form->submit('Ajouter des notes', array('class' => 'btn primary')); ?>
	</div>
<?php echo $this->Form->end(); ?>