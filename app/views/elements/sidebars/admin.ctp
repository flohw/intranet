<div class="sidebar">
	<div class="well" id="accordeon">
	<h3 class="active">Raccourcis</h3>
		<div>
			<ul>
				<li><?php echo $this->Html->link('Annuaire', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
				<li><?php echo $this->Html->link('Nouveau Message', array('controller' => 'messages', 'action' => 'nouveau')); ?></li>
				<li><?php echo $this->Html->link('Ajouter un compte', array('controller' => 'personnes', 'action' => 'edition')); ?></li>
				<li><?php echo $this->Html->link('Modifier l\'emploi du temps', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
			</ul>
		</div>

	<h3>Administration</h3>
		<div>
			<ul>
				<li><?php echo $this->Html->link('Affecter un enseignant', array('controller' => 'modules', 'action' => 'affecter')); ?></li>
				<li><?php echo $this->Html->link('Affecter un module', array('controller' => 'modules', 'action' => 'affectertype')); ?></li>
				<li><?php echo $this->Html->link('Gérer les droits', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
				<li><?php echo $this->Html->link('Gestion des documents', array('controller' => 'documents', 'action' => 'index')); ?></li>
			</ul>
		</div>

	<h3>Infos Utiles</h3>
		<div>
		    	<ul>
		    		<li><?php echo $this->Html->link('Convocations', array('controller' => 'evenements', 'action' => 'index')); ?></li>
		    		<li><?php echo $this->Html->link('Règlement', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Documents Officiels', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Astuces', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Universités', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>

			</ul>
		</div>

	<h3>Et ensuite...</h3>
		<div>
		    	<ul>
		    		<li><?php echo $this->Html->link('Poursuites à l\'étranger', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Offres d\'emploi', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Poursuites d\'études', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
			</ul>
		</div>

	<h3>Vie Etudiante</h3>
		<div>
		    	<ul>
		    		<li><?php echo $this->Html->link('Oedig', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Sport', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
			</ul>
		</div>
	</div>
</div>