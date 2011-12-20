<?php $this->title = 'Intranet | Administration | Nouveau évènement'; ?>

<div class="page-header">
	<h1>Ajouter un évènement</h1>
</div>

<ul class="tabs">
	<li <?php echo ($this->action == 'index') ? 'class="active"' : null; ?>><a href="#simple">Nouvel évènement personnel</a></li>
	<li <?php echo ($this->action == 'groupe') ? 'class="active"' : null; ?>><a href="#groupe">Nouvel évènement groupé</a></li>
	<li><a href="#liste">Tous les évènements</a></li>
</ul>

<div class="pill-content">
	<div id="simple" <?php echo ($this->action == 'index') ? 'class="active"' : null; ?>>
		<?php	echo $this->Form->create('Evenement'); ?>
		<?php	echo $this->Form->input('id'); ?>
				<div class="clearfix">
		<?php	echo $this->Form->input('titre', array('label' => 'Titre de l\'évènement',  'class' => 'input')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('type_evenement_id', array('label' => 'Catégorie', 'options' => $type, 'class' => 'input')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('personnes', array('label' => 'Participants',  'class' => 'input', 'type' => 'text')); ?>
				</div>
				<div class="clearfix">
		<?php 	echo $this->Form->input('date_debut', array('label' => 'Date de début', 'class' => 'input datepickers', 'type' => 'text')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('date_fin', array('label' => 'Date de fin', 'class' => 'input datepickers', 'type' => 'text')); ?>
				</div>
				<div class="actions">
		<?php	echo $this->Form->submit('Enregistrer', array('class' => 'btn primary')); ?>
				</div>
		<?php 	echo $form->end(); ?>
	</div>
	
	<div id="groupe" <?php echo ($this->action == 'groupe') ? 'class="active"' : null; ?>>
		<?php	echo $this->Form->create('Evenement', array('url' => $this->Html->url(array('action' => 'groupe')))); ?>
		<?php	echo $this->Form->input('id'); ?>
				<div class="clearfix">
		<?php	echo $this->Form->input('titre', array('label' => 'Titre de l\'évènement',  'class' => 'input')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('type_evenement_id', array('label' => 'Catégorie', 'options' => $type, 'class' => 'input')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('groupes', array('label' => 'Participants',  'class' => 'input', 'type' => 'text')); ?>
				</div>
				<div class="clearfix">
		<?php 	echo $this->Form->input('date_debut', array('label' => 'Date de début', 'class' => 'input', 'id' => 'dated', 'type' => 'text')); ?>
				</div>
				<div class="clearfix">
		<?php	echo $this->Form->input('date_fin', array('label' => 'Date de fin', 'class' => 'input', 'id' => 'datef', 'type' => 'text')); ?>
				</div>
				<div class="actions">
		<?php	echo $this->Form->submit('Enregistrer', array('class' => 'btn primary')); ?>
				</div>
		<?php 	echo $form->end(); ?>
	</div>
	
	<div id="liste">
<?php	if(!empty($evenements)): ?>
		<table id="sort" class="zebra-striped">
			<thead>
				<tr>
					<th class="id">ID</th>
					<th class="blue">Titre</th>
					<th class="yellow">Début</th>
					<th class="red">Fin</th>
					<th>Personnes concernées</th>
					<?php
						if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof'])
							echo '<th class="purple">Actions</th>';
					?>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($evenements as $e): $e = current($e); ?>
				<tr>
					<td class="id"><?php echo $e['id']; ?></td>
					<td><?php echo $e['titre']; ?></td>
					<td><?php echo $e['date_debut']; ?></td>
					<td><?php echo $e['date_fin']; ?></td>
					<td><?php echo $e['personnes']; ?></td>
					<?php
					if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof'])
					{
						echo '<td>'.$this->Html->link('Editer', array('action' => 'index', $e['id']), array('class' => 'btn')).'&nbsp';
						echo $this->Html->link('Supprimer', array('action' => 'supprimer', $e['id']), array('class' => 'btn danger'),
																'Êtes vous sûr de vouloir supprime l\'évènement '.$e['titre'].' ?').'</td>';
					}
					?>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php else: ?>
			<strong>Aucun évènement</strong>
	<?php endif; ?>
		<div class="actions">
			<?php echo $this->Html->link('Nouvel évènement', array('action' => 'index'), array('class' => 'btn primary')); ?>
		</div>
	</div>
</div>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery(function($) {
  $(".datepickers, #dated, #datef").datepicker({
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
			response( $.ui.autocomplete.filter(
				groupes, extractLast( request.term ) ) );
			},
		focus: function() {
			return false;
		},
		select: function( event, ui ) {
			var terms = split( this.value );
			terms.pop();
			terms.push( ui.item.value );
			terms.push( "" );
			this.value = terms.join( ", " );
			return false;
		}
  });
  
  $("#EvenementPersonnes")
  	.bind( "keydown", function( event ) {
		if ( event.keyCode === $.ui.keyCode.TAB &&
			$( this ).data( "autocomplete" ).menu.active ) {
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
			terms.push( ui.item.value );
			terms.push( "" );
			this.value = terms.join( ", " );
			return false;
		}
  });
});
<?php echo $this->Html->scriptEnd(); ?>