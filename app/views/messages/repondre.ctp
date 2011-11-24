<?php $this->title = 'Intranet | Messagerie | Répondre'; ?>

<div class="page-header">
	<h1><?php echo $message['titre']; ?> <small>Répondre</small></h1>
</div>

<span class="row">
	<span class="span16">
	<?php
		echo $this->Form->create('Message', array('url' => $this->Html->url(array('controller' => 'messages', 'action' => 'repondre', $message['id']), true)));
		echo $this->Form->input('id', array('value' => $message['id']));
		echo $this->Form->input('personne_id', array('value' => $this->Session->read('Auth.Personne.id'), 'type' => 'hidden'));
		echo '<div class="clearfix">';
		echo $this->Form->input('message', array('label' => 'Contenu du message', 'type' => 'textarea', 'class' => 'xxlarge input'));
		echo '</div>';
		echo '<div class="actions">';
		echo $this->Form->submit('Evoyer', array('class' => 'btn primary'));
		echo '</div>';
		echo $this->Form->end();
	?>
	</span>
</span>