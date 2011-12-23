<?php $this->title = 'Intranet | '.$abre['Module']['abreviation'].' | Les documents'; ?>
<div class="page-header">
	<h2>Documents du module <?php echo $abre['Module']['abreviation']; ?> <small><?php echo $abre['Module']['description']?></small></h2>
</div>

<div class="row">
	<div class="span5">
		<?php echo  '<h5 style="display: inline;">Volume horaire de ce module : </h5>'.$abre['Module']['volume_horaire'].'h.<br />';?>
		<?php echo  '<h5 style="display: inline;">Coefficient : </h5>'.$abre['Module']['coefficient'].'.';?>
	</div>
	<?php if (in_array($this->Session->read('Auth.Personne.login'), $profs)
			OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']): ?>
		<div class="span7 offset4">
			<?php echo $this->Html->link('Ajouter un document', array('action' => 'modules'), array('class' => 'btn primary')); ?>&nbsp;
			<?php echo $this->Html->link('Ajouter des notes', array('controller' => 'notes'), array('class' => 'btn')); ?>
			<?php
				if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
				{
					echo '<br /><br />'.$this->Html->link('Affecter un enseignant', array('controller' => 'modules', 'action' => 'affecter', 'module' => $abre['Module']['id']), array('class' => 'btn')).'&nbsp;';
					echo $this->Html->link('Affecter un type de module', array('controller' => 'modules', 'action' => 'affectertype', 'module' => $abre['Module']['id']), array('class' => 'btn'));
				}
			?>
		</div>
	<?php endif; ?>
</div>

<div class="row">
	<div class="span16">
		<?php if (!empty($docs)): ?>
		<table id="sort" class="zebra-striped">
			<thead>
				<tr>
					<th class="id">ID</th>
					<th class="blue headerSortDown">Nom</th>
					<th class="yellow" id="Auteur">Auteur</th>
					<th class="red" id="fichier">Fichier(lien)</th>
				</tr>
			</thead>
			<tbody>
		<?php foreach ($docs as $d): $nom = $d['Document']['nom']; ?>
				<tr>
				<td class="id"><?php echo $d['Document']['id']; ?></td>
				<td><?php echo $nom; ?></td>
				<td><?php echo $d['Personne']['nom'].' '.$d['Personne']['prenom']; ?></td>
				<td><?php echo $this->Html->link('Visualiser', array('controller' => 'files', 'action' => 'modules',
																		$abre['Module']['abreviation'], $nom)); ?></td>
		<?php endforeach; ?>
			</tbody>
		</table>
		<?php endif; ?>
	</div>
</div>