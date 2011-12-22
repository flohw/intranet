<?php $this->title = 'Intranet | Administration | Les Types de modules'; ?>
<div class="page-header">
	<h1>Les Types de modules</h1>
</div>

<span class="row">
	<span class="span5">
		<ul>
<?php	foreach ($types as $d): ?>
			<li>
			<?php echo $d['Departement']['nom']; ?>
			<?php if (!empty($d['TypeModule'])): ?>
				<ul>
				<?php foreach ($d['TypeModule'] as $t): ?>
					<li><?php echo $this->Html->link($t['nom'], array('action' => 'edittype', $t['id'])); ?></li>
				<?php endforeach; ?>
				</ul>
			<?php else: ?>
				<span class="label notice">Aucun type de module pour ce département</span>
			<?php endif; ?>
			</li>
<?php	endforeach; ?>
		</ul>
<?php echo $this->Html->link('Nouveau type de module', array('action' => 'edittype'), array('class' => 'btn primary')); ?>
	</span>
	
	<span class="span11">
<?php	echo $this->Form->create('TypeModule', array('url' => $this->Html->url(array('action' => 'edittype'), true))); ?>
<?php	echo $this->Form->input('id'); ?>
		<div class="clearfix">
<?php	echo $this->Form->input('nom', array('label' => 'Nom', 'class' => 'input')); ?>
		</div>
		<div class="clearfix">
<?php	echo $this->Form->input('nb_max_eleves', array('label' => 'Nombre maximal d\'élèves', 'class' => 'input')); ?>
		</div>
		<div class="clearfix">
<?php	echo $this->Form->input('departement_id', array('label' => 'Dans le département', 'class' => 'input', 'options' => $departements)); ?>
		</div>
		
		<div class="actions">
<?php	echo $this->Form->submit('Enregistrer', array('class' => 'btn primary')); ?>
		</div>
<?php 	echo $this->Form->end(); ?>
	</span>
</span>