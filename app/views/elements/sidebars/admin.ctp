<div class="sidebar">
	<div class="well" id="accordeon">
	<h3 class="active">Raccourcis</h3>
		<div>
			<ul>
		    		<li><?php echo $this->Html->link('Créer une categorie', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Nouveau Message', array('controller' => 'messages', 'action' => 'nouveau')); ?></li>
		    		<li><?php echo $this->Html->link('Gérer les droits', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    		<li><?php echo $this->Html->link('Modifier l\'emploi du temps', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
		    				    		
		    	</ul>
	    	</div>
    	
	</div>
</div>