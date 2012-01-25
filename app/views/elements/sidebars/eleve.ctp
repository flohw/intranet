	<div class="sidebar">
	<div class="well" id="accordeon">
	<h3 class="active">Raccourcis</h3>
		<div>
			<ul>
		    		<li><?php echo $this->Html->link('Emploi du temps', 'http://www-ade.iut2.upmf-grenoble.fr/ade/custom/modules/plannings/direct_planning.jsp?resources='.$ressource.'&weeks='.(date('W')+17).'&showTree='.((is_null($ressource)) ? "true" : "false").'&showPianoDays=true&login=WebINFO&password=MPINFO&projectId=10&displayConfName=Vue_Web_INFO_Etudiant&showOptions=false&showPianoWeeks=true&days=0,1,2,3,4,5'); ?></li>
		    		<li><?php echo $this->Html->link('Mes modules', array('controller' => 'modules', 'action' => 'index')); ?></li>
		    		<li><?php echo $this->Html->link('Nouveau Message', array('controller' => 'messages', 'action' => 'nouveau')); ?></li>
		    		<li><?php echo $this->Html->link('Annuaire', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
		    		<li><?php echo $this->Html->link('Mes Notes', array('controller' => 'notes', 'action' => 'mesnotes')); ?></li>		    		
		    	</ul>
	    	</div>

	<h3>Infos Utiles</h3>
		<div>
		    	<ul>
		    		<li><?php echo $this->Html->link('Convocations', array('controller' => 'evenements', 'action' => 'index')); ?></li>
		    		<li><?php echo $this->Html->link('Règlement', array('controller' => 'pages_statiques', 'action' => 'index', 'id' => 1)); ?></li>
		    		<li><?php echo $this->Html->link('Documents Officiels', array('controller' => 'pages_statiques', 'action' => 'index', 'id' => 2)); ?></li>
		    		<li><?php echo $this->Html->link('Astuces', array('controller' => 'pages_statiques', 'action' => 'index', 'id' => 3)); ?></li>
		    		<li><?php echo $this->Html->link('Universités', array('controller' => 'pages_statiques', 'action' => 'index', 'id' => 4)); ?></li>

			</ul>
		</div>

	<h3>Et ensuite...</h3>
		<div>
		    	<ul>
		    		<li><?php echo $this->Html->link('Poursuites à l\'étranger', array('controller' => 'pages_statiques', 'action' => 'index', 'id' => 5)); ?></li>
		    		<li><?php echo $this->Html->link('Offres d\'emploi', array('controller' => 'pages_statiques', 'action' => 'index', 'id' => 6)); ?></li>
		    		<li><?php echo $this->Html->link('Poursuites d\'études', array('controller' => 'pages_statiques', 'action' => 'index', 'id' => 7)); ?></li>
			</ul>
		</div>

	<h3>Vie Etudiante</h3>
		<div>
		    	<ul>
		    		<li><?php echo $this->Html->link('Oedig', array('controller' => 'pages_statiques', 'action' => 'index', 'id' => 8)); ?></li>
		    		<li><?php echo $this->Html->link('Sport', array('controller' => 'pages_statiques', 'action' => 'index', 'id' => 9)); ?></li>
			</ul>
		</div>
	</div>
</div>