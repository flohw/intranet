<?php $this->title = 'Intranet | '.$abre['Module']['abreviation'].' | Les documents'; ?>
<div class="page-header">
	<h2>Documents du module <?php echo $abre['Module']['abreviation']; ?> <small><?php echo $abre['Module']['description']?></small></h2>
</div>

<div class="row">
	<div class="span16">
		<?php echo  '<h5 style="display:inline">Volume horaire de ce module : </h5>'.$abre['Module']['volume_horaire'].'h.<br />';?>
		<?php echo  '<h5 style="display:inline">Coefficient : </h5>'.$abre['Module']['coefficient'].'.';?>
	</div>
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