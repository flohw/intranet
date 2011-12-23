<?php $this->title = 'Intranet | Mes Notes'; ?>
<div class="page-header">
	<h1>Mes notes <small><?php echo $this->Session->read('Auth.Personne.prenom').' '.$this->Session->read('Auth.Personne.nom'); ?></small></h1>
</div>

<table class="zebra-striped notes">
	<thead>
		<tr>
			<th rowspan="2" class="red">Module</th>
			<th rowspan="2" class="blue">Moyenne</th>
			<th colspan="3" class="yellow">Epreuves</th>
		</tr>
		<tr class="yellow">
			<th>Note</th>
			<th>Coefficient</th>
			<th>Intitulé</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($notes as $n): ?>
		<tr>
			<td rowspan="<?php echo count($n['Note'])+1; ?>" class="module"><?php echo $n['abreviation']; ?> (<?php echo $n['coefficient']; ?>)</td>
			<td rowspan="<?php echo count($n['Note'])+1; ?>" class="moyenne"><?php echo $n['moyenne']; ?></td>
		</tr>
		<?php foreach ($n['Note'] as $notes): ?>
		<tr class="notes">
			<td><?php echo $notes['note']; ?></td>
			<td><?php echo $notes['coefficient']; ?></td>
			<td class="intitule"><?php echo $notes['nom']; ?></td>
		</tr>
		<?php endforeach; ?>
	<?php endforeach; ?>
	</tbody>
</table>