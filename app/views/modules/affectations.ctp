<?php $this->title = 'Intranet | Affectations | '.$prof['nom']; ?>
<div class="page-header">
	<h1>Affectations <small><?php echo $prof['nom']; ?></small></h1>
</div>

<table id="sort" class="zebra-striped">
	<thead>
		<tr>
			<th class="id">ID</th>
			<th class="blue">Libellé</th>
			<th class="red">Semestre</th>
			<th class="purple">Module</th>
			<th class="yellow">Description</th>
			<?php
				if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
					echo '<thclass="green">Action</th>';
			?>
		</tr>
	</thead>
	<tbody>
	<?php if (!empty($modules)): ?>
		<?php foreach ($modules as $m): ?>
			<tr>
				<td class="id"><?php echo $m['id']; ?></td>
				<td><?php echo $m['LibelleModule']['nom']; ?></td>
				<td><?php echo $this->Html->link($m['Semestre']['nom'], array('action' => 'index', $m['Semestre']['id'])); ?></td>
				<td><?php echo $this->Html->link($m['abreviation'], array('controller' => 'documents', 'action' => 'presenter', $m['id'])); ?></td>
				<td><?php echo $m['description']; ?></td>
				<?php
					if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
						echo '<td>'.$this->Html->link('Effacer son affectation', array('action' => 'supprimeraff', $m['id'], $prof['id']), array('class' => 'btn small danger'), 'Êtes vous sûr de vouloir effacer l\'affectation de '.$prof['nom'].' à '.$m['abreviation'].' ?').'</td>';
				?>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="5">Aucun module pour cet enseignant</td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>

<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']): ?>
<div class="actions">
	<?php echo $this->Html->link('Affecter à un module', array('action' => 'affecter', 'personne' => $prof['id']), array('class' => 'btn primary')); ?>
</div>
<?php endif; ?>