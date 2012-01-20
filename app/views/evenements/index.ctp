<?php
	$granted = $this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof'];
	$this->title = 'Intranet | Les évènements | ';
	if (empty($this->data))
		{
			if ($granted)
				$this->title .= 'Les évènements';
			else
				$this->title .= 'Liste des évènements';
		}
		else
			$this->title .= 'Editer '.$this->data['Evenement']['titre'];
?>

<div class="page-header">
	<?php
		if (empty($this->data))
		{
			if ($granted)
				echo '<h1>Les évènements</h1>';
			else
				echo '<h1>Liste des évènements</h1>';
		}
		else
			echo '<h1>Editer '.$this->data['Evenement']['titre'].'</h1>';
	?>
</div>

<ul class="tabs">
<?php
	if ($granted): ?>
	<li  <?php echo ($this->action == 'index' AND isset($this->data)) ? 'class="active"' : null; ?>><a href="#simple">Nouvel évènement par Personne</a></li>
	<li <?php echo ($this->action == 'groupe') ? 'class="active"' : null; ?>><a href="#groupe">Nouvel évènement par Groupe</a></li>
<?php endif; ?>
	<li <?php echo ($this->action == 'index' AND !isset($this->data)) ? 'class="active"' : null; ?>>
		<a href="#liste">Tous mes évènements</a></li>
</ul>

<div class="pill-content">
<?php if ($granted): ?>
<!-- Ajouter un évènement à une personne (profs et plus) -->
	<div id="simple" <?php echo ($this->action == 'index' AND isset($this->data)) ? 'class="active"' : null; ?>>
		<?php	echo $this->Form->create('Evenement'); ?>
		<?php	echo $this->Form->input('id'); ?>
				<div class="clearfix">
		<?php	echo $this->Form->input('titre', array('label' => 'Titre de l\'évènement',  'class' => 'input')); ?>
				</div>
				<div class="clearfix">
		<?php 	echo $this->Form->input('date_debut', array('label' => 'Date de début', 'class' => 'input datepickers', 'id' => 'debutPersonne', 'type' => 'text', 'readonly' => 'readonly')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('date_fin', array('label' => 'Date de fin', 'class' => 'input datepickers', 'id' => 'finPersonne', 'type' => 'text', 'readonly' => 'readonly')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('type_evenement_id', array('label' => 'Catégorie', 'options' => $type, 'class' => 'input')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('personnes', array('label' => 'Participants',  'class' => 'input', 'type' => 'text', 'class' => 'xlarge')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('description', array('label' => 'Description', 'class' => 'input', 'type' => 'textarea')); ?>
				</div>
				<div class="actions">
		<?php	echo $this->Form->submit('Enregistrer', array('class' => 'btn primary')); ?>
				</div>
		<?php 	echo $form->end(); ?>
	</div>
<!-- Ajouter un évènement pour un groupe d'un semestre (profs et plus) -->	
	<div id="groupe" <?php echo ($this->action == 'groupe') ? 'class="active"' : null; ?>>
		<?php	echo $this->Form->create('Evenement', array('url' => $this->Html->url(array('action' => 'groupe'), true))); ?>
		<?php	echo $this->Form->input('id'); ?>
				<div class="clearfix">
		<?php	echo $this->Form->input('titre', array('label' => 'Titre de l\'évènement',  'class' => 'input')); ?>
				</div>
				<div class="clearfix">
		<?php 	echo $this->Form->input('date_debut', array('label' => 'Date de début', 'class' => 'input datepickers', 'id' => 'debutGroupe', 'type' => 'text', 'readonly' => 'readonly')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('date_fin', array('label' => 'Date de fin', 'class' => 'input datepickers', 'id' => 'finGroupe', 'type' => 'text', 'readonly' => 'readonly')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('type_evenement_id', array('label' => 'Catégorie', 'options' => $type, 'class' => 'input')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('groupes', array('label' => 'Participants',  'class' => 'input', 'type' => 'text', 'class' => 'xlarge')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('description', array('label' => 'Description', 'class' => 'input', 'type' => 'textarea')); ?>
				</div>
				<div class="actions">
		<?php	echo $this->Form->submit('Enregistrer', array('class' => 'btn primary')); ?>
				</div>
		<?php 	echo $form->end(); ?>
	</div>
<?php endif; ?>
<!-- Liste des évènements -->
	<div id="liste" <?php echo ($this->action == 'index' AND !isset($this->data)) ? 'class="active"' : null; ?>>
		<table id="sort" class="zebra-striped">
			<thead>
				<tr>
					<th class="id">ID</th>
					<th>Statut</th>
					<th class="blue">Titre</th>
					<th class="yellow">Début</th>
					<th class="red">Fin</th>
					<th class="purple">Type</th>
					<th>Personnes concernées</th>
					<?php
						if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof'])
							echo '<th class="purple">Actions</th>';
					?>
				</tr>
			</thead>
			<tbody>
			<?php if(!empty($evenements)): ?>
			<?php foreach ($evenements as $e): $e = current($e); ?>
				<tr>
					<td class="id"><?php echo $e['id']; ?></td>
					<td>
						<?php
							$deb = substr($e['date_debut'], 0, 10);
							$fin = substr($e['date_fin'], 0, 10);
							if ($deb <= date('Y-m-d') AND $fin >= date('Y-m-d'))
								echo '<span class="label success">Aujourd\'hui</span>';
							elseif ($fin < date('Y-m-d'))
								echo '<span class="label important">Passé</span>';
							elseif ($deb > date('Y-m-d'))
								echo '<span class="label warning">À venir</span>';
						?>
					</td>
					<td><?php echo $this->Html->link($e['titre'], array('action' => 'voir', $e['id'])); ?></td>
					<td><?php echo $e['date_debut']; ?></td>
					<td><?php echo $e['date_fin']; ?></td>
					<td><?php echo $e['type_evenement']; ?></td>
					<?php
						if ($e['nb_personnes'] == 0):
							echo '<td><strong>Aucune</string> personne conviée à cet évènement</td>';
						else:
							echo '<td><strong>'.$e['nb_personnes'].' personne'.(($e['nb_personnes'] > 1) ? 's' : null).'</strong> conviée'.(($e['nb_personnes'] > 1) ? 's' : null).' à cet évènement</td>';
						endif;
					?>
					<!--<td><?php //echo $e['personnes']; ?></td>-->
					<?php
					if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof'])
					{
						echo '<td>';
						if ($this->Session->read('Auth.Personne.id') == $e['personne_id'])
						{
							echo $this->Html->link('Editer', array('action' => 'index', $e['id']), array('class' => 'btn small')).'&nbsp';
							echo $this->Html->link('Supprimer', array('action' => 'supprimer', $e['id']), array('class' => 'btn small danger'),
																'Êtes vous sûr de vouloir supprime l\'évènement '.$e['titre'].' ?');
						}
						echo '</td>';
					}
					?>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr><td><strong>Aucun évènement</strong></td><td></td><td></td><td></td><td></td><td></td></tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php // if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof']): ?>
	<!--	<div class="actions">
			<?php //echo $this->Html->link('Nouvel évènement', array('action' => 'index'), array('class' => 'btn primary')); ?>
		</div> -->
	<?php // endif; ?>
	</div>
</div>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery(function($) {
	
	// DATEPICKERS
	$.datepicker.setDefaults($.datepicker.regional['fr']);
	$(".datepickers").datetimepicker({
		dateFormat: 'yy-mm-dd',
		minDate: 0,
		changeYear: true,
		changeMonth: true,
		yearRange: '-1y:+1y',
		prevText: '',
		nextText: '',
	});
	// DATEPICKERS CHANGE
	$('#debutPersonne').datetimepicker('option', 'onSelect', function(dateText, inst){
		$('#finPersonne').datetimepicker('option', 'minDate', dateText);
	});
	$('#finPersonne').datetimepicker('option', 'onSelect', function(dateText, inst){
		$('#debutPersonne').datetimepicker('option', 'maxDate', dateText);
	});
	$('#debutGroupe').datetimepicker('option', 'onSelect', function(dateText, inst){
		$('#finGroupe').datetimepicker('option', 'minDate', dateText);
	});
	$('#finGroupe').datetimepicker('option', 'onSelect', function(dateText, inst){
		$('#debutGroupe').datetimepicker('option', 'maxDate', dateText);
	});
	
	// AUTOCOMPLETE
	function split( val ) { return val.split( /,\s*/ ); }
	function extractLast( term ) { return split( term ).pop(); }
	
	var personnes = [<?php foreach ($personnes as $p) echo '"'.$p.'", '; ?>];
	var groupes = [<?php
			foreach ($groupes as $s => $gr)
				foreach ($gr as $g)
					echo '"'.$s.' - '.$g.'", '; ?>];
	$("#EvenementGroupes")
		.bind( "keydown", function( event ) {
			if ( event.keyCode === $.ui.keyCode.TAB &&
				$( this ).data( "autocomplete" ).menu.active ) {
					event.preventDefault();
				}
		})
	.autocomplete({
		minLength: 0,
		source: function( request, response ) {
			response($.ui.autocomplete.filter(
				groupes, extractLast(request.term)));
		},
		focus: function() {
					return false;
		},
		select: function(event, ui) {
			var terms = split(this.value);
			terms.pop();
			terms.push(ui.item.value);
			for (i = 0; i < groupes.length; i++)
			{
				if (ui.item.value == groupes[i])
				{
					delete groupes[i];
					groupes.splice(i, 1);
				}
			}
			terms.push("");
			this.value = terms.join(", ");
			return false;
		}
	});
	
	$("#EvenementPersonnes")
	.bind("keydown", function( event ) {
		if (event.keyCode === $.ui.keyCode.TAB &&
			$(this).data("autocomplete").menu.active ) {
				event.preventDefault();
			}
	})
	.autocomplete({
		minLength: 0,
		source: function( request, response ) {
			response( $.ui.autocomplete.filter(
				personnes, extractLast( request.term ) ) );
		},
		focus: function() {
			return false;
		},
		select: function( event, ui ) {
			var terms = split( this.value );
			terms.pop();
			terms.push(ui.item.value);
			for (i = 0; i < personnes.length; i++)
			{
				if (ui.item.value == personnes[i])
				{
					delete personnes[i];
					personnes.splice(i, 1);
				}
			}
			terms.push("");
			this.value = terms.join( ", " );
			
			return false;
		}
	});
});
<?php echo $this->Html->scriptEnd(); ?>