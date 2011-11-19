<?php $this->title = 'Intranet | Administration | ';
	$this->title .= ($action == 'editer') ? 'Editer un département' : 'Nouveau département'; ?>

<div class="page-header">
	<h1>
	<?php
	if ($action == 'editer')
		echo 'Editer un département';
	else
		echo 'Ajouter un nouveau département';
	?>
	</h1>
</div>

<span class="row">
	<span class="span3">
		Départements existants :
		<ul>
		<?php
			foreach ($departements as $id => $dep)
				echo '<li>'.$this->Html->link($dep, array('action' => 'editer', $id)).'</li>';
		?>
		</ul>
	</span>
	<span class="span11 offset2">
	<?php
		echo $this->Form->create('Departement');
		echo '<div class="clearfix">';
		echo $this->Form->input('nom', array('label' => 'Nom du département', 'class' => 'input'));
		echo '</div>';
		echo '<div class="clearfix">';
		echo $this->Form->input('nb_max_eleves', array('label' => 'Nombre maximal d\'élèves', 'class' => 'input'));
		echo '</div>';
		echo '<div class="clearfix">';
		echo $this->Form->input('abreviation', array('label' => 'Abréviation', 'class' => 'input'));
		echo '</div>';
		echo '<div class="actions">';
		echo $this->Form->submit('Enregistrer', array('class'=>'btn primary'));
		echo '</div>';
		echo $form->end();
	?>
	</span>
</span>