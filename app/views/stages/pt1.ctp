<?php $this->title = 'Intranet | Projet Tut\' 1A '; ?>
<div class="page-header">
	<h2>Projet Tuteuré de Première Année</h2>
</div>

<ul class="tabs">
	<li class="active"><a href="#docs">Documents Utiles</a></li>
	<li><a href="#soutenance">Calendrier des Soutenances</a></li>
	<li><a href="#affectation">Affectation Groupe/Prof</a></li>
</ul>

<div class="pill-content">
	<div id="docs"  class="active">
		<h4>Ces documents sont la base de votre projet, lisez les correctement... <span class="label important">ATTENTION</span></h4>
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
									<td>'.$this->Html->link($title, array('controller' => 'files', 'action' => 'documents', $nom)) .'</td>
									</tr>');
							endforeach;
						?>
					</tbody>
				</table>
	</div>

	<div id="soutenance">
		<div class="row">
			<div class="span8">
				<table class="bordered-table">
				<tbody>
				<tr>
				<td style="text-align: center;" colspan="2"><span style="font-size: medium; font-family: comic sans ms,sans-serif;">Calendrier des Projets Tuteur&eacute;s de 1&egrave;re Ann&eacute;e</span></td>
				</tr>
				<tr>
				<td style="text-align: center;">S&eacute;ance 1</td>
				<td style="text-align: center;">Semaine du 12 septembre</td>
				</tr>
				<tr>
				<td style="text-align: center;">S&eacute;ance 2</td>
				<td style="text-align: center;">Semaine du 17 octobre</td>
				</tr>
				<tr>
				<td style="text-align: center;">S&eacute;ance 3</td>
				<td style="text-align: center;">Semaine du 21 novembre</td>
				</tr>
				<tr>
				<td style="text-align: center;" colspan="2">Remise du rapport (Bureau 151)<br />Mardi 7 d&eacute;cembre</td>
				</tr>
				<tr>
				<td style="text-align: center;">Soutenances</td>
				<td style="text-align: center;">Semaine du 12 d&eacute;cembre</td>
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
		<span class="label notice">Informations</span>
		<p>Chaque groupe de projet tuteuré doit choisir un professeur qui sera leur tuteur. Il leur apportera de l'aide lorsque ce sera necessaire. Le PDF suivant recapitule les etudiants avec leur groupe ainsi que le professeur qu'ils ont choisi comme tuteur.</p>
		<p>Les eleves qui n'ont pas encore de groupe ni de professeur sont indiqués en bas de tableau et sont priés de se dépecher de trouver un groupe, ou d'en former un avec ceux qui n'en n'ont pas.</p>
		<br>
		<?php echo $this->Html->link('PDF', array('controller' => 'files', 'action' => 'documents', 'Entreprises-09-10.pdf')); ?>
	</div>
