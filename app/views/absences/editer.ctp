<?php $this->title = 'Intranet | Absences | '; ?>


<div class="page-header">
	<h1>Edition d'une absence</h1>
</div>

<?php

			echo $this->Form->create('Absence');
			echo $this->Form->input('id');
			echo '<div class="clearfix">';
			echo $this->Form->input('date', array('class' => 'input', 'label' => 'Date de l\'absence (aaaa-mm-jj)', 'id' => 'datepicker', 'type' => 'text'));
			echo '</div>';

			echo '<div class="clearfix">';
			echo $this->Form->input('justification', array('label' => 'Justificatif ?', 'class' => 'input'));
			echo '</div>';

			echo '<div class="clearfix">';
			echo $this->Form->input('personne_id', array('label' => 'Elève', 'class' => 'input', 'options' =>$personnes));
			echo '</div>';

			echo '<div class="actions">';
			echo $this->Form->submit('Enregistrer', array('class'=>'btn primary'));
			echo '</div>';

			echo $form->end();
?>

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