<?php $this->title = 'Intranet | Administration | Les semestres'; ?>
<div class="page-header">
	<h1>Les semestres</h1>
</div>

<div class="row">
	<div class="span5">
		<ul>
		<?php foreach ($semestres as $s): $s = current($s); ?>
			<li><?php echo $this->Html->link($s['nom'], array('action' => 'index', $s['id'])); ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	
	<div class="span11">
	<?php echo $this->Form->create('Semestre'); ?>
	<?php echo $this->Form->input('id'); ?>
	<div class="clearfix">
		<?php echo $this->Form->input('nom', array('label' => 'Nom du semestre', 'class' => 'input')); ?>
	</div>
	<div class="actions">
	<?php echo $this->Form->submit('Enregistrer', array('class' => 'btn primary')); ?>
	</div>
	<?php echo $this->Form->end(); ?>
	</div>
</div>