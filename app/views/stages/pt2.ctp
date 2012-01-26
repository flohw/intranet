<?php $this->title = 'Intranet | Projet Tut\' 2A '; ?>
<div class="page-header">
	<h2>Projet Tuteuré de Deuxième Année</h2>
</div>

<ul class="tabs">
	<li class="active"><a href="#docs">Documents Utiles</a></li>
	<li><a href="#soutenance">Calendrier</a></li>
	<li><a href="#affectation">Affectation Groupe/Prof</a></li>
	<li><a href="#rapports">Rapports en Ligne</a></li>
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
								$nom = $d['DocumentsStage']['nom'];
								echo(    '<tr>
							        		<td>'.$d['DocumentsStage']['nom'].'</td>
									<td>'.$this->Html->link('Visualiser', array('controller' => 'files', 'action' => 'PT2A', $nom), array('class' => 'btn small info')) .'</td>
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
				<td style="text-align: center;" colspan="2"><span style="font-size: medium; font-family: comic sans ms,sans-serif;">Calendrier des Projets Tuteur&eacute;s de 2&egrave;me Ann&eacute;e</span></td>
				</tr>
				<tr>
				<td style="text-align: center;">Retour de la fiche 1 de Constitution des groupes, Propositions de sujets et Tuteur</td>
				<td style="text-align: center;">Mercredi 28 septembre (Bureau 151)</td>
				</tr>
				<tr>
				<td style="text-align: center;">Validation des sujets et Début du travail</td>
				<td style="text-align: center;">Jeudi 29 septembre</td>
				</tr>
				<tr>
				<td style="text-align: center;">Remise Cahier des Charges</td>
				<td style="text-align: center;">Mardi 29 novembre (Bureau 151)</td>
				</tr>
				<tr>
				<td style="text-align: center;">Retour Fiche 2 (Préparation du planning)</td>
				<td style="text-align: center;">Mercredi 11 janvier (Bureau 151)</td>
				</tr>
				<tr>
				<td style="text-align: center;">Soutenances (Démonstration)</td>
				<td style="text-align: center;">Vendredi 27 janvier</td>
				</tr>
				<tr>
				<td style="text-align: center;">Remise rapport final</td>
				<td style="text-align: center;">Jeudi 9 février (Bureau 151)</td>
				</tr>
				</tbody>
				</table>
			</div>
			<div class="span8">
				<h4>Année 2011-2012</h4>
				<span class="label notice">Infos</span>
				<br><br>
				<p>Ces dates sont indiqués par le chef de projet Tuteuré, Mr. FONTENAS, et ne sont modifiables que par son accord ou celui de votre tuteur. Si elles sont modifiées, une notification vous sera envoyée. Pour toutes questions, s'adresser à Mr. FONTENAS ou contacter votre Tuteur.</p>
			</div>
		</div>
	</div>

	<div id="affectation">
		<div class="row">
			<div class="span12">
				<span class="label notice">Informations</span>
				<p>Chaque groupe de projet tuteuré doit choisir un professeur qui sera leur tuteur. Il leur apportera de l'aide lorsque ce sera necessaire. Le PDF suivant recapitule les etudiants avec leur groupe ainsi que le professeur qu'ils ont choisi comme tuteur.</p>
				<p>Les eleves qui n'ont pas encore de groupe ni de professeur sont indiqués en bas de tableau et sont priés de se dépecher de trouver un groupe, ou d'en former un avec ceux qui n'en n'ont pas.</p>
				<br>
					<?php echo $this->Html->link('PDF', array('controller' => 'files', 'action' => 'PT2A', 'affectation.pdf')); ?>
			</div>
		</div>
	</div>

	<div id="rapports">
		<h4>Voici quelques exemples de rapports des années précédentes...<span class="label success">Aide</span></h4>
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
							foreach ($docrap as $d):
								$nom = $d['DocumentsStage']['nom'];
								echo(    '<tr>
							        		<td>'.$d['DocumentsStage']['nom'].'</td>
									<td>'.$this->Html->link('Visualiser', array('controller' => 'files', 'action' => 'PT2A-rapports', $nom), array('class' => 'btn small info')) .'</td>
									</tr>');
							endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
