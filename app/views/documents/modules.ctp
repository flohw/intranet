<?php $this->title = 'Intranet | Gestion des documents de module'; ?>
<div class="page-header">
	<h1>Gestion des documents de modules</h1>
</div>

<span class="row">
	<span class="span16">
	<?php
		echo $this->Form->create('Document', array('type' => 'file'));
		echo '<div class="clearfix">';
		echo $this->Form->input('fichier', array('label' => 'Fichier', 'class' => 'input', 'type' => 'file'));
		echo '</div>';
		echo '<div class="clearfix">';
		echo $this->Form->input('module_id', array('label' => 'Module', 'class' => 'input', 'options' => $modules));
		echo '</div>';
		echo '<div class="actions">';
		echo $this->Form->submit('Envoyer', array('class' => 'btn primary'));
		echo '</div>';
		echo $this->Form->end();
	?>
	</span>
</span>