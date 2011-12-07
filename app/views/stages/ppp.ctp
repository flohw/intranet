<?php $this->title = 'Intranet | P.P.P. '; ?>
<div class="page-header">
	<h2>Projet Personnel et Professionnel</h2>
</div>

<ul class="tabs">
	<li class="active"><a href="#docs">Documents Utiles</a></li>
	<li><a href="#soutenance">Calendrier</a></li>
	<li><a href="#affectation">Affectation Groupe/Prof</a></li>
	<li><a href="#exemple">Exemples de Posters</a></li>
</ul>

<div class="pill-content">
	<div id="docs"  class="active">
		<h4>Ces documents sont la base de votre projet, lisez les correctement... <span class="label important">ATTENTION</span></h4>
		<div class="row">
			<div class="span12">
				<table class="condensed-table">
					<thead>
					<tr>
		      				<th class="yellow" header>Document</th>
		      				<th class="blue">Lien</th>
					</tr>
					</thead>

					<tbody>
						<?php
							foreach ($docetu as $d):
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

	<div id="soutenance">
		<div class="row">
			<div class="span8">
				<table class="bordered-table">
				<tbody>
				<tr>
				<td style="text-align: center;" colspan="2"><span style="font-size: medium; font-family: comic sans ms,sans-serif;">Calendrier des Projets Personnel et Professionnel </span></td>
				</tr>
				<tr>
				<td style="text-align: center;">Séance 0</td>
				<td style="text-align: center;">Journée Insertion Professionnelle Jeudi 8 mars</td>
				</tr>
				<tr>
				<td style="text-align: center;">Séance 1</td>
				<td style="text-align: center;">Semaine du 12 mars</td>
				</tr>
				<tr>
				<td style="text-align: center;">Séance 2</td>
				<td style="text-align: center;">Semaine du 26 mars</td>
				</tr>
				<tr>
				<td style="text-align: center;">Séance 3</td>
				<td style="text-align: center;">Semaine du 23 avril</td>
				</tr>
				<tr>
				<td style="text-align: center;">Remise des posters (Secrétariat Bureau 151 avant 12h00)</td>
				<td style="text-align: center;">Jeudi 9 mai</td>
				</tr>
				<tr>
				<td style="text-align: center;">Exposition des posters</td>
				<td style="text-align: center;">Semaine du 14 mai</td>
				</tr>
				<tr>
				<td style="text-align: center;">Retour du dossier (Secrétariat Bureau 151 avant 12h00)</td>
				<td style="text-align: center;">Mardi 22 mai</td>
				</tr>
				</tbody>
				</table>
			</div>
			<div class="span8">
				<h4>Année 2011-2012</h4>
				<span class="label notice">Infos</span>
				<br><br>
				<p>Ces dates sont indiqués par le chef de projet Tuteuré, Mr. FONTENAS, et ne sont modifiables que par son accord. Si elles sont modifiées, une notification vous sera envoyée. Pour toutes questions, s'adresser à Mr. FONTENAS.</p>
			</div>
		</div>
	</div>

	<div id="affectation">
	<div class="row">
			<div class="span12">
				<span class="label notice">Informations</span>
				<p>Chaque groupe de projet tuteuré doit choisir un professeur qui sera leur tuteur. Il leur apportera de l'aide lorsque ce sera necessaire. Le PDF suivant recapitule les etudiants avec leur groupe ainsi que le professeur qu'ils ont choisi comme tuteur.</p>
				<br>
				<?php echo $this->Html->link('PDF', array('controller' => 'files', 'action' => 'documents', 'Entreprises-09-10.pdf')); ?>
			</div>
		</div>
	</div>

	<div id="exemple">
		<ul class="media-grid">
		<?php
			foreach ($docpost as $d):
				$title = $d['DocumentsStage']['titre'];
				$nom = $d['DocumentsStage']['nom_doc'];
				echo('<li>'.$this->Html->link(
					$html->image('/files/posters/'.$nom, array(														'alt' => $title,													'width' => '200px',												'height' => '200px')), 
							array(
							'controller' => 'files',
							 'action' => 'posters', $nom), array('escape' => false, 'class' => 'zoombox zgallery1',)).
				        '</li>');
			endforeach;
		?>
		</ul>
	</div>