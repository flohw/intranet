<div class="sidebar">
	<div class="well" id="accordeon">
	<h3 class="active">Raccourcis</h3>
		<div>
			<ul>
		    		<li><?php echo $this->Html->link('Emploi du temps', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Nouveau Message', array('controller' => 'messages', 'action' => 'nouveau')); ?></li>
		    		<li><?php echo $this->Html->link('Annuaire', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
		    		<li><?php echo $this->Html->link('Mes Notes', array('controller' => 'notes', 'action' => 'mesnotes')); ?></li>		    		
		    	</ul>
	    	</div>

	<h3>Infos Utiles</h3>
		<div>
		    	<ul>
		    		<li><?php echo $this->Html->link('Convocations', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
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