<?php $this->title = 'Intranet | Affectations | '.$prof; ?>
<div class="page-header">
	<h1>Affectations <small><?php echo $prof; ?></small></h1>
</div>

<span class="row">
	<span class="span16">
	<table id="sort" class="zebra-striped">
		<thead>
			<tr>
				<th class="id">ID</th>
				<th class="blue">Libellé</th>
				<th class="red">Semestre</th>
				<td class="purple">Module</td>
				<td class="yellow">Description</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($modules as $m): ?>
			<tr>
				<td class="id"><?php echo $m['id']; ?></td>
				<td><?php echo $m['LibelleModule']['nom']; ?></td>
				<td><?php echo $this->Html->link($m['Semestre']['nom'], array('action' => 'index', $m['Semestre']['id'])); ?></td>
				<td><?php echo $this->Html->link($m['abreviation'], array('controller' => 'documents', 'action' => 'presenter', $m['id'])); ?></td>
				<td><?php echo $m['description']; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</span>
</span>