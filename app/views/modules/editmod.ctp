<?php $this->title = 'Intranet | ';
	$this->title .= ($this->data != null) ? 'Editer un libellé' : 'Ajouter un libellé'; ?>

<div class="page-header">
	<h1>Gestion des libellés des modules</h1>
	<h2>
	<?php
	if (isset($this->data))
		echo 'Editer un libellé';
	else
		echo 'Ajouter un libellé';
	?>
	</h2>
</div>

<?php echo $this->Form->create('LibelleModule', array('url' => $this->Html->url(array('controller' => 'modules', 'action' => 'editmod'), true))); ?>
<?php echo $this->Form->input('id'); ?>
<div class="clearfix">
	<?php echo $this->Form->input('nom', array('label' => 'Libellé du module', 'class'=> 'input')); ?>
</div>
<div class="actions">
	<?php echo $this->Form->submit('Enregistrer', array('class'=> 'btn primary')); ?>
</div>
<?php echo $this->Form->end();  ?>


