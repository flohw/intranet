<?php $this->title = 'Intranet | Messagerie | Messages envoyés'; ?>
<div class="page-header">
	<h1>Boîte d'envoi</h1>
</div>
<span class="row">
	<span class="span16">
		<table id="sort" class="zebra-striped">
			<thead>
				<tr>
					<th class="blue">Titre</th>
					<th>Date d'envoi</th>
					<th id="actions">Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
				if (!empty($messages)):
					foreach ($messages as $m): $m = current($m);
						echo '<tr>';
						echo '<td>'.$this->Html->link($m['titre'], array('action' => 'message', $m['id'])).'</td>';
						echo '<td>'.$m['date_envoi'].'</td>';
						echo '<td class="right">';
						echo $this->Html->link('Lire', array('action' => 'message', $m['id']), array('class' => 'btn info')).'&nbsp;';
						echo $this->Html->link('Répondre', array('action' => 'repondre', $m['id']), array('class' => 'btn success')).'&nbsp;';
						echo $this->Html->link('Supprimer', array('action' => 'supprimer', $m['id']), array('class' => 'btn danger'), 'Êtes vous sûr de vouloir supprimer cette conversation ?');
						echo '</td>';
						echo '</tr>';
					endforeach;
				else:
					echo '<tr><td>Il n\'y a pas de message envoyé</td><td></td></tr>';
				endif;
			?>
			</tbody>
		</table>
	</span>
</span>