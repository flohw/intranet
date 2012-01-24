<?php $this->title = 'Intranet | Stages '; ?>
<div class="page-header">
	<h2>Stages</h2>
</div>

<ul class="tabs">
	<li class="active"><a href="#accueil">Présentation</a></li>
	<li><a href="#offres">Offres de Stage</a></li>
	<li><a href="#dates">Dates Importantes</a></li>
	<li><a href="#fichiers">Documents Utiles</a></li>
</ul>

<div class="pill-content">
	<div id="accueil" class="active">
		<div class="row">
			<div class="span12">
				<h3>Objectifs</h3>
				<ul>
					<li>Permettre à l’étudiant de prendre contact avec le monde de l’entreprise.</li>
					<li>Tester ses possibilités d’adaptation personnelle.</li>
					<li>Mettre en pratique les connaissances acquises à l’IUT.</li>
				</ul>
				<h3>Critères de validation <span class="label important">Important</span> </h3>
				<ul>
					<li>Le sujet proposé doit correspondre à la formation.</li>
					<li>Une analyse et/ou une réalisation doit &ecirc;tre faite pendant le stage.</li>
					<li>Le stage doit se dérouler au sein de l'entreprise.</li>
					<li>Du materiel doit &ecirc;tre mis à la disposition du stagiaire.</li>
					<li>Chaque stagiaire doit &ecirc;tre encadré par une personne de l'entreprise, ayant des connaissances en informatique.</li>
				</ul>
				<h3>Procédure</h3>
				<ul  class="media-grid">
					<li><a href="#"><?php echo $this->Html->image('procedure.png', array('class' =>'thumbnail', 'style' => 'display:block;')); ?></a></li>
				</ul>
				<h3>Informations</h3>
				<ul>
					<li>Vous êtes environ 150 étudiants (toutes promotions confondues, 2A, AS et groupe décalé) du département à chercher un stage.</li>
					<li>Il faut candidater par écrit (CV + lettre de motivation) puis relancer par email ou par téléphone.</li>
					<li>Ne vous découragez pas beaucoup de lettres restent sans réponse !!!</li>
		    	</ul>
			</div>
	
			<div class="span4">
				<h4>Un peu d'aide...  <span class="label notice">Note</span> </h4>
				<dl>
					<dt>Sites Généralistes</dt>
						<dd><?php echo $this->Html->link('Kapstage', 'http://www.kapstage.com'); ?></dd>
						<dd><?php echo $this->Html->link('Infostages', 'http://www.infostages.com'); ?></dd>
						<dd><?php echo $this->Html->link('Iquesta', 'http://www.Iquesta.com'); ?></dd>
						<dd><?php echo $this->Html->link('Le Figaro Etudiant', 'http://www.lefigaroetudiant.fr'); ?></dd>
					<dt>Sites Orientés Informatique</dt>
						<dd><?php echo $this->Html->link('Alphajobs', 'http://www.alphajobs.co.nz'); ?></dd>
						<dd><?php echo $this->Html->link('Télérama', 'http://emploi.multimedia.telerama.fr'); ?></dd>
						<dd><?php echo $this->Html->link('Aiesec', 'http://www.aiesec.org'); ?></dd>
						<dd><?php echo $this->Html->link('10000Stages', 'http://www.10000Stages.com'); ?></dd>
				</dl>
			</div>
		</div>
	</div>

	<div id="offres">
		<h3>L'IUT vous aide, et vous propose des offres de stage !</h3>
		<div class="row">
			<div class="span10">
				<?php if (!empty($offres)): $i = 0; ?>
				<div class="well" id="accordeonStage">
				<?php
					foreach ($offres as $o):
						echo $this->element('offre', array('o' => $o, 'i' => $i));
						$i++;
					endforeach;
					?>
				</div>
				<?php
				else:
					echo 'Aucune offre proposée<br />';
				endif;
					echo $this->Form->create('Stage', array('id' => 'newOffre', 'enctype' => 'multipart/form-data',
								'class' => 'ui-accordion-header ui-helper-reset ui-state-active ui-corner-top active'));
					echo $this->Form->input('id', array('id' => 'idOffre'));
					echo '<div class="clearfix">';
					echo $this->Form->input('entreprise', array('id' => 'entreprise'));
					echo '</div>';
					echo '<div class="clearfix">';
					echo $this->Form->input('ville', array('id' => 'ville'));
					echo '</div>';
					echo '<div class="clearfix">';
					echo $this->Form->input('description', array('id' => 'description'));
					echo '</div>';
					echo '<div class="clearfix" id="lastChild">';
					echo $this->Form->input('fichier', array('type' => 'file'));
					echo '<span class="input-append">(Word, Excel, PDF, Images)</span></div>';
					echo '<div class="clearfix">';
					echo $this->Form->input('dispo', array('label' => 'Disponible', 'id' => 'dispo'));
					echo '</div>';
					echo $this->Form->submit('Enregistrer', array('class' => 'btn success'));
					echo $this->Form->end();
					if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof'])
						echo '<br /><a href="#" class="btn small success" id="nouvelle">Nouvelle offre</a>';
				?>
			</div>
			<div class="span6">
				<h4>Fichiers Joints <span class="label notice">Note</span></h4>
				<table class="condensed-table">
					<thead>
					<tr>
		      				<th class="yellow" header>Document</th>
		      				<th class="blue">Lien</th>
					</tr>
					</thead>

					<tbody>
						<?php
							foreach ($docoffre as $d):
								$nom = $d['DocumentsStage']['nom'];
								echo(    '<tr>
							        		<td>'.$d['DocumentsStage']['nom'].'</td>
									<td>'.$this->Html->link('Visualiser', array('controller' => 'files', 'action' => 'stages-offres', $nom)) .'</td>
									</tr>');
							endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div id="dates">
	<div class="row">
	<div class="span12">
	<h4>Dates à retenir (2011-2012) <span class="label important">Important</span></h4>
		
<table class="bordered-table">
<tbody>
<tr>
<td style="text-align: center;">&nbsp;</td>
<td style="text-align: center;"><strong><span style="font-size: 10pt; font-family: Arial;">2<sup>&egrave;me</sup> Ann&eacute;e </span></strong></td>
<td style="text-align: center;"><strong><span style="font-size: 10pt; font-family: Arial;">Ann&eacute;e Sp&eacute;ciale et S3D </span></strong></td>
<td style="text-align: center;"><strong><span style="font-size: 10pt; font-family: Arial;">S4D </span></strong></td>
</tr>
<tr>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> Dur&eacute;e du stage </span></p>
</td>
<td style="text-align: center;" colspan="3"><span style="font-size: 10pt; font-family: Arial;">10 semaines </span></td>
</tr>
<tr>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">Date limite de retour de <strong>l'accord de stage</strong></span></td>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">6 Mars 2012 </span></td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 16 Mai 2012 </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 19 Octobre 2011 </span></p>
</td>
</tr>
<tr>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> R&eacute;union de d&eacute;part en stage </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> Semaine du 26 Mars 2012 </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> Semaine du 4 Juin 2012 </span></p>
</td>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;"><em>Aucune</em></span></td>
</tr>
<tr>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> Date de d&eacute;part en stage </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 2 Avril 2012 </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 11 Juin 2012 </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 14 Novembre 2011 </span></p>
</td>
</tr>
<tr>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">Date limite de retour de <strong>la fiche de suivi de stage</strong></span></td>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">9 Avril 2012 </span></td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 18 Juin 2012 </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 21 Novembre 2011 </span></p>
</td>
</tr>
<tr>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> Date limite de retour <strong>des m&eacute;moires de stage</strong> </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 6 Juin 2012 </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 27 Aout 2012 </span></p>
</td>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> 16 Janvier 2012 </span></p>
</td>
</tr>
<tr>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">Date limite de retour <strong>de la fiche app&eacute;ciation entreprise</strong></span></td>
<td style="text-align: center;" colspan="3"><span style="font-size: 10pt; font-family: Arial;">Au plus tard le jour de la soutenance </span></td>
</tr>
<tr>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> Fin de stage </span></p>
</td>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">8 Juin 2012 </span></td>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">17 Aout 2012 </span></td>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">20 Janvier 2012 </span></td>
</tr>
<tr>
<td style="text-align: center;">
<p style="margin-bottom: 0.0001pt; text-align: center;" align="center"><span style="font-size: 10pt; font-family: Arial;"> Soutenance de stage </span></p>
</td>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">Les 15, 20, 21 et 22 Juin 2012 </span></td>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">Fin Ao&ucirc;t/d&eacute;but Septembre 2012 </span></td>
<td style="text-align: center;"><span style="font-size: 10pt; font-family: Arial;">20 Janvier 2012 </span></td>
</tr>
</tbody>
</table>

	</div></div></div>

	<div id="fichiers">
		<div class="row">
			<div class="span12">
			<h4>Ces document sont un complément d'informations pour votre stage <span class="label warning">Attention</span></h4>
			<table class="condensed-table">
				<thead>
				<tr>
	      				<th class="yellow" header>Document</th>
	      				<th class="blue">Lien</th>
				</tr>
				</thead>

				<tbody>
					<?php
						foreach ($docutile as $d):
							$nom = $d['DocumentsStage']['nom'];
							echo(    '<tr>
						        		<td>'.$d['DocumentsStage']['nom'].'</td>
								<td>'.$this->Html->link('Visualiser', array('controller' => 'files', 'action' => 'stages-utiles', $nom)) .'</td>
								</tr>');
						endforeach;
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery(function($){
	// Bouton de nouvelle offre
	$('#nouvelle').click(function(){
		$(this).parent().find('#newOffre').slideToggle();
	});
	// Gestion erreurs evoi de formulaire
	$('#newOffre').submit(function(){
		var verif = true;
		if ($('#entreprise').val().length == 0)
		{
			$('#entreprise').parent().addClass('error');
			$('#entreprise').parent().append('<div class="error-message">Le nom de l\'entreprise doit être renseignée</div>');
			verif = false;
		}
		if ($('#ville').val().length == 0)
		{
			$('#ville').parent().addClass('error');
			$('#ville').parent().append('<div class="error-message">La ville doit être renseignée</div>');
			verif = false;
		}
		if ($('#description').val().length == 0)
		{
			$('#description').parent().addClass('error');
			$('#description').parent().append('<div class="error-message">Vous devez renseigner une description</div>');
			verif = false;
		}
		return verif;
	});
	
	// suppression
	$('.supprimer').click(function(){
		if (confirm('Êtes vous sûr de vouloir supprimer cette offre ?') === false)
			return false;
		var id		= $(this).attr('href');
		var elem	= $(this).parent();
		var xhr		= new XMLHttpRequest();
		xhr.open('post', '<?php echo $this->Html->url(array('action' => 'supprimer')); ?>', true);
		xhr.setRequestHeader('id', id.substr(1, id.length-1));
		xhr.addEventListener('load', function(e){
			var json = jQuery.parseJSON(e.target.responseText);
			alert(json.content);
			if (json.id)
			{
				elem.slideUp("slow", function(){
					elem.parent().find('h3#titre'+json.id).slideUp("slow", function(){ $(this).remove(); });
					console.log($('.supprimer').length);
					if ($('.supprimer').length == 1)
					{
						elem.parent().remove();
						$('#offres .span10').prepend('<p>Aucune offre proposée</p>');
					}
					$(this).remove();
				});
			}
		});
		xhr.send();
		return false;
	});
	
	// Edition
	$('.editer').click(function(){
		var adresse = '<?php echo $this->Html->url(array('controller' => 'stages', 'action' => 'editer')); ?>/'+$(this).attr('href').substr(1);
		var input = '<?php echo $this->Form->input('Stage.supprimer', array('type' => 'checkbox', 'id' => 'supprimer')); ?>';
		$('#nouvelle').hide();
		$('.editer').hide();
		
		$.ajax({
			url: adresse,
			success: function(data, textStatus) {
				data = jQuery.parseJSON(data);
				$('#idOffre').val(data.Stage.id);
				$('#ville').val(data.Stage.ville);
				$('#description').val(data.Stage.description);
				$('#entreprise').val(data.Stage.entreprise);
				if (data.Stage.dispo == 1)
					$('#dispo').attr('checked', 'checked');
				if (data.Stage.document.length != 0)
				{
					$('#lastChild').hide();
					$('#lastChild').before('<div class="clearfix"><label>Fichier</label><input type="text" value="'+data.Stage.document+'" readonly="readonly" /><span class="input-append" id="btnForm"><a href="#" id="editDoc" class="btn small info">Editer</a> - <a href="#" class="btn small danger" id="delDoc">Supprimer</a></span></div>');
					$('#lastChild').after($('<div class="clearfix" id="supprimerCheck">').append(input));
					$('#supprimerCheck').hide();
					$('#editDoc').click(function(){
						$('#supprimerCheck').slideUp();
						$('#supprimer').attr('checked', false);
						$('#lastChild').slideDown();
						return false;
					});
					$('#delDoc').click(function(){
						$('#lastChild').slideUp();
						$('#supprimerCheck').slideDown();
						return false;
					});
				}
				$('#newOffre').slideDown();
			}
		});
		$("#accordeonStage").accordion("option", "collapsible", true);
		$('#accordeonStage').accordion('activate', false);
		$("#accordeonStage").accordion("option", "collapsible", false);
		return false;
	});
});
<?php echo $this->Html->scriptEnd(); ?>