<?php $this->title = 'Intranet | Messagerie | Lecture d\'un message | '.$message['Message']['titre']; ?>
<div class="page-header">
	<h1><?php echo $message['Message']['titre']; ?></h1>
</div>
<span class="row">
	<span class="span16">
	<?php echo $this->Html->link('&larr; Boîte de réception', array('action' => 'index'), array('escape' => false)); ?>
	</span>
</span>

<span class="row">
<span class="span16">
<table id="messagerie" class="zebra-striped">
	<thead>
		<tr>
			<th id="auteur-message">Auteur</th>
			<th id="message-message">Message</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($message['Message']['Reponse'] as $r): ?>
		<tr>
			<td>
				Par : <?php echo $r['expediteur_nom']; ?><br />
				Le : <?php echo $r['date_envoi']; ?>
			</td>
			<td>
				<?php echo nl2br($r['message']); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
</span>
</span>

<span class="row">
	<span class="span16">
		<div class="actions">
		<?php echo $this->Html->link('Répondre', array('action' => 'repondre', $message['Message']['id']), array('class' => 'btn success')); ?>
		<?php echo $this->Html->link('Supprimer', array('action' => 'supprimer', $message['Message']['id']), array('class' => 'btn danger'), 'Etes vous sur de vouloir supprimer cette conversation ?'); ?>
		</div>
	</span>
</span>