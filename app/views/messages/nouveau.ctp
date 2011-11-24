<?php $this->title = 'Intranet | Messagerie | Nouveau message'; ?>
<div class="page-header">
	<h1>Nouveau message</h1>
</div>

<span class="row">
	<span class="span16">
	<?php
		echo $this->Form->create('Message');
		echo '<div class="clearfix">';
		echo $this->Form->input('titre');
		echo '</div>';
		echo '<div class="clearfix">';
		echo $this->Form->input('expediteur');
		echo '</div>';
		echo '<div class="clearfix">';
		echo $this->Form->input('message');
		echo '</div>';
		echo '<div class="actions">';
		echo $this->Form->input('Enoyer', array('class' => 'btn primary'));
		echo '</div>';
	?>
	</span>
</span>