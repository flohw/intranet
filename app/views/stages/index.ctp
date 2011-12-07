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
	<div id="accueil"  class="active">
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
				<?php foreach ($offres as $o):
					if($i==0)
						echo '<h3 class="active">'.$o['Stage']['entreprise'].'<span>'.$o['Stage']['ville'].'</span></h3>';
					else
						echo '<h3>'.$o['Stage']['entreprise'].'<span>'.$o['Stage']['ville'].'</span></h3>';
				?>
					<div>
						<ul>
							<li><?php echo $o['Stage']['description']; ?></li>
						</ul>
					</div>
			    	<?php
		    			$i++;
					endforeach; 
				?>
				</div>
				<?php endif; 
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
								$title = $d['DocumentsStage']['titre'];
								$nom = $d['DocumentsStage']['nom_doc'];
								echo(    '<tr>
							        		<td>'.$d['DocumentsStage']['titre'].'</td>
									<td>'.$this->Html->link($nom, array('controller' => 'files', 'action' => 'documents', $nom)) .'</td>
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
							$title = $d['DocumentsStage']['titre'];
							$nom = $d['DocumentsStage']['nom_doc'];
							echo(    '<tr>
						        		<td>'.$d['DocumentsStage']['titre'].'</td>
								<td>'.$this->Html->link($nom, array('controller' => 'files', 'action' => 'documents', $nom)) .'</td>
								</tr>');
						endforeach;
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>