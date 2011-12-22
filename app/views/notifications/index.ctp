<?php $this->title = 'Intranet | Mes notifications'; ?>
<div class="page-header">
	<h1>Mes Notifications</h1>
</div>

<span class="row">
	<span class="span8">
		<h2>Les messages</h2>
		<?php if (count($messages) == 0): echo 'Il n\'y a aucun nouveau message'; ?>
		<?php else: ?>
				<ul>
		<?php	foreach ($messages as $m): ?>
					<li><strong><?php echo $this->Html->link($m['Message']['titre'], array(	'controller' => 'messages',
																					'action' => 'message',
																					$m['Message']['id'])); ?></strong></li>
		<?php	endforeach; ?>
				</ul>
		<?php endif; ?>
	</span>
	
	<span class="span8">
		<h2>Les documents</h2>
		<?php if (count($documents) == 0): echo 'Il n\'y a aucun nouveau document'; ?>
		<?php else: ?>
				<ul>
		<?php	foreach ($documents as $d): ?>
					<li><strong><?php echo $d['Document']['nom']; ?></strong> dans le module
						<?php echo $this->Html->link($d['Module']['abreviation'], array('controller' => 'documents', 'action' => 'presenter', $d['Module']['id'])); ?></li>
		<?php	endforeach; ?>
				</ul>
		<?php endif; ?>
	</span>
</span>