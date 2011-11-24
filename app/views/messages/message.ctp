<?php $this->title = 'Intranet | Messagerie | Lecture d\'un message'; ?>
<?php $personne = $message['Personne']; $message = $message['Message']; ?>
<div class="page-header">
	<h1><?php echo $message['titre']; ?></h1>
</div>

<span class="row">
	<span class="span3">
		<?php debug($personne); ?>
	</span>
	<span class="span13">
		<?php debug($message); ?>
	</span>
</span>