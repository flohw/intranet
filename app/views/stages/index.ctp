
<?php $this->title = 'Intranet | Stages '; ?>
<div class="page-header">
	<h2>Stages</h2>
</div>

<ul class="tabs">
	<li><a href="#accueil">Présentation</a></li>
	<li class="active"><a href="#offres">Offres de Stage</a></li>
	<li><a href="#convention">Conventions de Stage</a></li>
</ul>

<div class="pill-content">
	<div id="accueil">
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
			<!--		<ul  class="media-grid">
			<li><a href="#"><?php //echo $this->Html->image('procedure.png', array('class' =>'thumbnail', 'style' => 'display:block;')); ?></a></li>
		</ul>
	-->
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

	<div id="offres"  class="active">
		<h3>L'IUT vous aide, et vous propose des offres de stage !</h3>
		<div class="well" id="accordeon">
		<?php if (!empty($offres)): 
		$i=0;
				foreach ($offres as $o):
				if($i==0)
					echo '<h3 class="active">'.$o['Stage']['id'].'</h3>';
				else
					echo '<h3>'.$o['Stage']['id'].'</h3>';
				echo'	<div>
						<ul>
							<li>'.$o['Stage']['entreprise'].
						'</li></ul>
    					</div>';	
    				$i++;	
				endforeach;

			endif;
		?>
		</div>
	</div>

	<div id="convention">
		
	</div>
</div>