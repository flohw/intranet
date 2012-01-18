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
	if (!empty($personne)):
?>
		<table class="zebra-striped annuaire" id="sort">
			<thead>
				<tr>
					<th class="id">#</th>
					<th class="yellow" header headerSortDown>Nom</th>
					<th class="blue">Prénom</th>
					<th class="red">E-mail</th>
					<th class="orange">Téléphone</th>
					<th class="green">Bureau</th>
					<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
						echo '<th id="actions" class="purple">Actions</th>';
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
					<td><?php echo $p['telephone']; ?></td>
					<?php if ($p['statut_id'] == $statutsID['prof']): ?>
					<td><?php echo $p['bureau']; ?></td>
					<?php else: echo '<td></td>'; endif; ?>
					<td>
					<?php
						if ($p['statut_id'] == $statutsID['prof'])
						{
							echo $this->Html->link('Ses modules', array('controller' => 'modules', 'action' => 'affectations', $p['id']), array('class' => 'btn small info'));
							if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'] OR
								$this->Session->read('Auth.Personne.statut_id') <= $statutsID['prof'] AND
								$this->Session->read('Auth.Personne.id') == $p['id'])
							{
								echo '&nbsp;';
							}
						}
						elseif($p['statut_id'] != $statutsID['prof'])
							echo '<span class="marge">&nbsp;&nbsp;</span>';
							
						if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'] AND
							$this->Session->read('Auth.Personne.id') != $p['id']
							AND $this->Session->read('Auth.Personne.statut_id') > $p['statut_id'])
						{
							echo $this->Html->link('Modifier', array('controller' => 'personnes', 'action' => 'edition', $p['id']), array('class' => 'btn small')).'&nbsp;';
							echo $this->Html->link('Supprimer', array('controller' => 'personnes', 'action' => 'supprimer', $p['id']), array('class' => 'btn small danger'), 'Voulez-vous vraiment supprimer ce compte ?');
						}
						elseif ($this->Session->read('Auth.Personne.id') == $p['id']
							AND $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
						{
							echo $this->Html->link('Modifier', array('controller' => 'personnes', 'action' => 'edition', $p['id']), array('class' => 'btn small'));
						}
						elseif ($this->Session->read('Auth.Personne.id') == $p['id'])
							echo $this->Html->link('Modifier', array('controller' => 'personnes', 'action' => 'editme'), array('class' => 'btn small'));
					?>
					</td>
				</tr>
<?php	endforeach; ?>
			</tbody>
		</table>
<?php
		if ($this->Paginator->counter(array('format' => '%pages%')) > 1)
			echo '<div class="pagination" id="paginator">'.$this->Paginator->numbers(array('separator' => false)).'</div>';
	endif; ?>