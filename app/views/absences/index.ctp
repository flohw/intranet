<?php $this->title = 'Intranet | Absences | '; ?>


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

			echo '<div class="clearfix">';
			echo $this->Form->input('date', array('class' => 'input', 'label' => 'Date de l\'absence (aaaa-mm-jj)', 'id' => 'datepicker', 'type' => 'text'));
			echo '</div>';

			echo '<div class="clearfix">';
			echo $this->Form->input('justification', array('label' => 'Justificatif', 'class' => 'input'));
			echo '</div>';

			echo '<div class="clearfix">';
			echo $this->Form->input('personne_id', array('label' => 'Elève', 'class' => 'input'));
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
					<th class="blue" headerSortDown>Date</th>
					<th class="yellow" id="eleve">Eleve</th>
					<th class="red" id="justificatif">Justificatif</th>
				</tr>
			</thead>
			<tbody>;
			
			<?php foreach ($absences as $a): 
				echo '<tr>';
				echo '<td>'.$this->Html->link($a['Absence']['date'], array('action' => 'editer', $a['Absence']['id'])).'</td>';
				echo '<td>'.$a['Personne']['nom'].$a['Personne']['prenom'].'</td>';
				echo '<td>'.$a['Absence']['justification'].'</td>';
			endforeach;   ?>
		 	</tbody>
		</table>


	</div>
</div>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery(function($) {
  $("#datepicker").datepicker({
  	dateFormat: 'yy-mm-dd',
  	dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
  	dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
  	monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
  	monthNamesShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
  	firstDay: 1,
  	changeYear: true,
  	changeMonth: true,
  	yearRange: '-1y:+1y',
  	prevText: '',
  	nextText: '',
  });
});
<?php echo $this->Html->scriptEnd(); ?>