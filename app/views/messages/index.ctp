<?php $this->title = 'Intranet | Messagerie | Mes messages'; ?>
<div class="page-header">
	<h1>Mes messages</h1>
</div>

<table id="sort" class="zebra-striped">
	<thead>
		<tr>
			<th class="id">#</th>
			<th class="blue">Titre</th>
			<th id="correspondant">Correspondant</th>
			<th id="date">Date de réception</th>
			<th id="actions">Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
		if (!empty($messages)):
			foreach ($messages as $m):
				if ($m['Destinataire']['id'] == $this->Session->read('Auth.Personne.id'))
					$p = $m['Expediteur'];
				else
					$p = $m['Destinataire']; $m = current($m);
				echo '<tr>';
				echo '<td class="id">'.$m['id'].'</td>';
				echo '<td>';
				if ($this->Session->read('Auth.Personne.id') == $m['personne_id'] AND $m['lu_exp'] == 1)
					echo $this->Html->link($m['titre'], array('action' => 'message', $m['id']));
				elseif ($this->Session->read('Auth.Personne.id') == $m['personne_id'] AND $m['lu_exp'] == 0)
					echo '<strong>'.$this->Html->link($m['titre'], array('action' => 'message', $m['id'])).'</strong>';
				elseif ($this->Session->read('Auth.Personne.id') == $m['destinataire_id'] AND $m['lu_dest'] == 1)
					echo $this->Html->link($m['titre'], array('action' => 'message', $m['id']));
				elseif ($this->Session->read('Auth.Personne.id') == $m['destinataire_id'] AND $m['lu_dest'] == 0)
					echo '<strong>'.$this->Html->link($m['titre'], array('action' => 'message', $m['id'])).'</strong>';
				echo '</td>';
				echo '<td>';
				echo ($m['supprime_dest'] == 1 OR $m['supprime_exp']) ? '<span class="barre">' : false;
				echo $p['prenom'].' '.$p['nom'];
				echo ($m['supprime_dest'] == 1 OR $m['supprime_exp']) ? '</span>' : false;
				echo '</td>';
				echo '<td>'.$m['date_envoi'].'</td>';
				echo '<td>';
					echo $this->Html->link('Lire', array('action' => 'message', $m['id']), array('class' => 'btn small info')).'&nbsp;';
					if ($m['supprime_dest'] == 0 AND $m['supprime_exp'] == 0)
						echo $this->Html->link('Répondre', array('action' => 'repondre', $m['id']), array('class' => 'btn small success')).'&nbsp;';
				echo $this->Html->link('Supprimer', array('action' => 'supprimer', $m['id']), array('class' => 'btn small danger'), 'Êtes vous sûr de vouloir supprimer cette conversation ?');
				echo '</td>';
				echo '</tr>';
			endforeach;
		else:
			echo '<tr><td colspan="4">Il n\'y a pas de message envoyé</td></tr>';
		endif;
	?>
	</tbody>
</table>

<div class="actions">
	<?php echo $this->Html->link('Nouveau message', array('action' => 'nouveau'), array('class' => 'btn primary')); ?>
</div>