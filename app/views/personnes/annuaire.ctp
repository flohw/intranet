<?php $this->title = 'Intranet | Annuaire';
	echo $this->Form->create('Personne');
		echo '<div class="clearfix">';
		echo $this->Form->input('statut', array('label' => 'Statut', 'options' => $statuts, 'empty' => array('' => 'Tous'), 'class' => 'input'));
		echo '</div>';
		echo '<div class="clearfix">';
		echo $this->Form->input('rech', array('label' => 'Recherche', 'class' => 'input'));
		echo '</div>';
		echo '<div class="actions">';
			echo $this->Form->submit('Ok', array('class'=>'btn primary')) ;
		echo '</div>';
	echo '</fieldset>';
	echo $this->Form->end();
// Personnes trouvées
	if (!empty($personne)):?>
		<table class="zebra-striped" id="sort">
			<thead>
				<tr>
					<th class="id">#</th>
					<th class="yellow" header headerSortDown>Nom</th>
					<th class="blue">Prénom</th>
					<th class="red">E-mail</th>
					<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
						echo '<th class="purple">Action</th>';
					?>
				</tr>
			</thead>
			<tbody>
<?php		foreach ($personne as $p): $p = current($p); ?>
				<tr>
					<td class="id"><?php echo $p['id']; ?></td>
					<td><?php echo $p['nom']; ?></td>
					<td><?php echo $p['prenom']; ?></td>
					<td><?php echo $p['email']; ?></td>
					<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'] AND
							$this->Session->read('Auth.Personne.id') != $p['id']
							AND $this->Session->read('Auth.Personne.statut_id') > $p['statut_id']): ?>
					<td>
						<?php echo $this->Html->link('Modifier', array('controller' => 'personnes', 'action' => 'edition', $p['id'])); ?> / 
						<?php echo $this->Html->link('Supprimer', array('controller' => 'personnes', 'action' => 'supprimer', $p['id']), null, 'Voulez-vous vraiment supprimer ce compte ?'); ?>
					</td>
					<?php elseif ($this->Session->read('Auth.Personne.id') == $p['id']): ?>
					<td>
						<?php echo $this->Html->link('Modifier', array('controller' => 'personnes', 'action' => 'edition', $p['id'])); ?>
					</td>
					<?php else: ?>
						<td></td>
					<?php endif; ?>
				</tr>
<?php	endforeach; ?>
			</tbody>
		</table>
<?php endif; ?>