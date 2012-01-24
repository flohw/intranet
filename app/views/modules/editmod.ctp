<?php $this->title = 'Intranet | ';
	$this->title .= ($this->data != null) ? 'Editer un libellé' : 'Ajouter un libellé'; ?>

<div class="page-header">
	<?php $sousTitre = (isset($this->data['LibelleModule']['id'])) ? 'Editer' : 'Ajouter'; ?>
	<h1>Gestion des libellés des modules <small><?php echo $sousTitre; ?> un libellé</small></h1>
</div>

<div class="row">
	<div class="span4">
		<h4>Libellés existants</h4>
		<ul>
		<?php foreach ($modules as $id => $m): ?>
			<li><?php echo $this->Html->link($m, array('action' => 'editmod', $id)); ?></li>
		<?php endforeach; ?>
		</ul>
		<?php echo $this->Html->link('Nouveau libellé', array('action' => 'editmod'), array('class' => 'btn primary')); ?>
	</div>
	
	<div class="span12">
		<?php echo $this->Form->create('LibelleModule', array('url' => $this->Html->url(array('controller' => 'modules', 'action' => 'editmod'), true))); ?>
		<?php echo $this->Form->input('id'); ?>
		<div class="clearfix">
			<?php echo $this->Form->input('nom', array('label' => 'Libellé du module', 'class'=> 'input')); ?>
		</div>
		<div class="actions">
			<?php echo $this->Form->submit('Enregistrer', array('class'=> 'btn primary')); ?>
		</div>
		<?php echo $this->Form->end();  ?>

	</div>
</div>
