<?php $this->title = 'Intranet | Les Groupes'; ?>
<div class="page-header">
	<h1>Les Groupes</h1>
</div>

<span class="row">
	<span class="span5">
		<ul>
		<?php foreach ($groupes as $g): $s = $g['Semestre']; $g = current($g); ?>
			<li>
				<?php echo $this->Html->link($g['nom'], array('action' => 'index', $g['id'])).' <small>'.$s['nom'].'</small>'; ?>
			</li>
		<?php endforeach; ?><br />
			<?php echo $this->Html->link('Nouveau groupe', array('action' => 'editer'), array('class' => 'btn primary')); ?>
		</ul>
	</span>
	
	<span class="span11">
		<?php echo $this->Html->link('Editer ce groupe', array('action' => 'editer', $groupeID), array('class' => 'btn')); ?><br /><br />
		<table id="sort" class="zebra-stripped">
			<thead>
				<tr>
					<th class="id">#</th>
					<th class="yellow">Nom</th>
					<th class="blue">Prénom</th>
					<th class="red">Login</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($membres)): ?>
				<?php foreach ($membres as $p): $p = current($p); ?>
					<tr>
						<td class="id"><?php echo $p['id']; ?></td>
						<td><?php echo $p['nom']; ?></td>
						<td><?php echo $p['prenom']; ?></td>
						<td><?php echo $p['login']; ?></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr>
					<th colspan="5">Aucune personne dans ce groupe</th>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</span>
</span>