<div class="sidebar">
	<div class="well" id="accordeon">
	<h3 class="active">Raccourcis</h3>
		<div>
			<ul>
		    		<li><?php echo $this->Html->link('Emploi du temps', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Nouveau message', array('controller' => 'messages', 'action' => 'nouveau')); ?></li>
		    		<li><?php echo $this->Html->link('Annuaire', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
		    		<li><?php echo $this->Html->link('Les absences', array('controller' => 'absences', 'action' => 'index')); ?></li>	
		    		<li><?php echo $this->Html->link('Mes documents', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>	
		    	</ul>
	    	</div>
    	
 	<h3>Infos Utiles</h3>
		<div>
		    	<ul>
		    		<li><?php echo $this->Html->link('Convocations', array('controller' => 'evenements', 'action' => 'index')); ?></li>
		    		<li><?php echo $this->Html->link('Règlement', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Documents Officiels', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Astuces', array('controller' => 'timetable', 'action' => 'astuces')); ?></li>
			</ul>
		</div>
	</div>
</div>