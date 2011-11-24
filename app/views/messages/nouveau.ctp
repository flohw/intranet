<?php $this->title = 'Intranet | Messagerie | Nouveau message'; ?>
<div class="page-header">
	<h1>Nouveau message</h1>
</div>

<span class="row">
	<span class="span16">
	<?php
		echo $this->Form->create('Message');
		echo '<div class="clearfix">';
		echo $this->Form->input('titre', array('label' => 'Titre du message', 'class' => 'input'));
		echo '</div>';
		echo '<div class="clearfix">';
		echo $this->Form->input('destinataire_id', array('label' => 'Destinataire', 'options' => $Destinataires, 'class' => 'input'));
		echo '</div>';
		echo '<div class="clearfix">';
		echo $this->Form->input('message', array('label' => 'Contenu du message', 'type' => 'textarea', 'class' => 'xxlarge input'));
		echo '</div>';
		echo '<div class="actions">';
		echo $this->Form->submit('Envoyer', array('class' => 'btn primary'));
		echo '</div>';
		echo $this->Form->end();
	?>
	</span>
</span>