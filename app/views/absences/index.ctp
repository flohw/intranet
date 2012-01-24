<?php $this->title = 'Intranet | Absences'; ?>


<div class="page-header">
	<h1>Gestion des absences</h1>
</div>

<ul class="tabs">
	<li class="active"><a href="#ajouter">Ajouter absence</a></li>
	<li><a href="#modifier">Modifier/Justifier une absence</a></li>
</ul>

<div class="pill-content">
	<div id="ajouter" class="active">
	<?php 
			echo $this->Form->create('Absence');
			echo $this->Form->input('id');
			echo '<div class="clearfix">';
			echo $this->Form->input('date', array('class' => 'input', 'label' => 'Date de l\'absence (aaaa-mm-jj)', 'id' => 'datepicker', 'type' => 'text', 'readonly' => 'readonly'));
			echo '</div>';

			echo '<div class="clearfix">';
			echo $this->Form->input('justification', array('label' => 'Justificatif', 'class' => 'input'));
			echo '</div>';

			echo '<div class="clearfix">';
				if (isset($this->data['modif']))
					echo $this->Form->input('personne_id', array(
						'label' => 'Elève', 
						'class' => 'input', 
						'type' => 'text', 
						'id' => 'personne',
						'readonly' => 'readonly'));
				else
					echo $this->Form->input('personne_id', array('label' => 'Elève', 'class' => 'input', 'type' => 'text', 'id' => 'personne'));
			echo '</div>';

			echo '<div class="actions">';
			echo $this->Form->submit('Enregistrer', array('class'=>'btn primary'));
			echo '</div>';
			echo $form->end();
			
	?>
	</div>

	<div id="modifier">
		<table id="sort" class="zebra-striped">
			<thead>
				<tr>
					<th class="id">id</th>
					<th class="blue" headerSortDown>Date</th>
					<th class="yellow" id="eleve">Eleve</th>
					<th class="red" id="justificatif">Justificatif</th>
				</tr>
			</thead>
			<tbody>
			<?php
				if (!empty($absences)):
				foreach ($absences as $a): ?>
				<tr>
					<td class="id"><?php echo $a['Absence']['id']; ?></td>
					<td><?php echo $this->Html->link($a['Absence']['date'], array('action' => 'index', $a['Absence']['id'])); ?></td>
					<td><?php echo $a['Personne']['nom'].' '.$a['Personne']['prenom']; ?></td>
					<td><?php echo $a['Absence']['justification']; ?></td>
				</tr>
			<?php
				endforeach;
				else:
					echo '<tr><td>Aucune absence</td><td></td><td></td><td></td></tr>';
				endif;
			?>
		 	</tbody>
		</table>
	</div>
</div>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery(function($) {
	$.datepicker.setDefaults($.datepicker.regional['fr']);
	$("#datepicker").datetimepicker({
		dateFormat: 'yy-mm-dd',
		changeYear: true,
		changeMonth: true,
		yearRange: '-1y:+1y',
		timeFormat: 'hh:mm',
	});
	
	var availableNames = [];
	<?php foreach ($personnes as $d): ?>
		availableNames.push("<?php echo $d; ?>");
	<?php endforeach; ?>
	$("#personne").autocomplete({
		source: availableNames,
	});
});
<?php echo $this->Html->scriptEnd(); ?>