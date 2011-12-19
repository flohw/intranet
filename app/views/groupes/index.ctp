<?php $this->title = 'Intranet | Les Groupes | '.$groupe['Semestre']['nom'].' | '.$groupe['Groupe']['nom']; ?>
<div class="page-header">
	<h1>Les Groupes <small><?php echo $groupe['Semestre']['nom'].' - '.$groupe['Groupe']['nom']; ?></small></h1>
</div>

<span class="row">
	<span class="span5">
		<ul>
		<?php foreach ($groupes as $k => $g): ?>
			<li><?php echo $k; ?>
				<ul>
				<?php foreach ($g as $id => $nom): ?>
					<li>
						<?php echo $this->Html->link($nom, array('action' => 'index', $id)); ?>
					</li>
				<?php endforeach; ?>
				</ul>
			</li>
		<?php endforeach; ?>
		</ul><br />
			<?php
			if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
				echo $this->Html->link('Nouveau groupe', array('action' => 'editer'), array('class' => 'btn primary')); ?>
	</span>
	
	<span class="span11">
		<?php
			if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']):
				echo $this->Html->link('Editer ce groupe', array('action' => 'editer', $groupeID), array('class' => 'btn')); ?>&nbsp;
		<?php
				echo $this->Html->link('Supprimer ce groupe', array('action' => 'supprimer', $groupeID), array('class' => 'btn danger'),
											'Êtes vous-certain de vouloir supprimer ce groupe ?');
			endif;?><br /><br />
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