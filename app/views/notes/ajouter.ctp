<?php $this->title = 'Intranet | Les Notes | Ajouter'; ?>

<div class="page-header">
	<h1>Ajouter une note</h1>
</div>

<?php echo $this->Form->create('Note', array('url' => $this->Html->url(array('action' => $this->params['action'],
																						$this->params['pass'][0],
																						$this->params['pass'][1],
																						$this->params['pass'][2]), true))); ?>
<div class="clearfix">
<?php echo $this->Form->input('coefficient', array('label' => 'Coefficient', 'class' => 'input')); ?>
</div>

<table id="sort" class="zebra-striped">
	<thead>
		<tr>
			<th class="id">id</th>
			<th>Etudiant</th>
			<th>Note</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($personnes as $k => $p): $p = current($p); ?>
		<tr>
			<td class="id">
			<?php echo $this->Form->hidden($p['id'].'.personne_id', array('label' => false, 'value' => $p['id'])); ?>
			</td>
			<td><?php echo $p['nom'].' '.$p['prenom']; ?></td>
			<td class="clearfix">
			<?php
				$note = (isset($this->data['Note'][$p['id']]['note']) AND $this->data['Note'][$p['id']]['note'] != 0) ? $this->data['Note'][$p['id']]['note'] : '';
				echo $this->Form->text($p['id'].'.note', array('label' => false, 'value' => $note, 'class' => 'note input'));
			?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<div class="actions">
	<?php echo $this->Form->submit('Affecter les notes', array('class' => 'btn primary', 'id' => 'ajouter')); ?>
</div>
<?php echo $this->Form->end(); ?>