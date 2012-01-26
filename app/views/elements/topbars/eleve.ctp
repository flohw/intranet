<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><?php echo $this->Html->link('Elève'.$this->Html->image('icones/icone-eleve.png'),  array('controller' => 'pages', 'action' => 'display', 'personnes_home'), array('escape' => false)); ?></h3>
            <ul>
                <li class="menu">
                	<a href="#" class="menu">Enseignements</a>
                	<ul class="menu-dropdown">
                		<?php echo $this->element('menu_modules'); ?>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Stages & projets</a>
                	<ul class="menu-dropdown">
                		<li><?php echo $this->Html->link('Stages', array('controller' => 'stages', 'action' => 'index')); ?></li>
                		<li><?php echo $this->Html->link('Projet Tuteuré 1A', array('controller' => 'stages', 'action' => 'pt1')); ?></li>
                		<li><?php echo $this->Html->link('Projet Tuteuré 2A', array('controller' => 'stages', 'action' => 'pt2')); ?></li>
                		<li><?php echo $this->Html->link('Projet Personnel Professionnel', array('controller' => 'stages', 'action' => 'ppp')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Infos<?php if ($notifs['evenements']['total'] > 0)
		                    	echo '<span class="notifs">'.$notifs['evenements']['total'].'</span>'; ?></a>
                	<ul class="menu-dropdown">
	                	<li>
	                	<?php
	                		$link = 'Mes évènements';
		                	if ($notifs['evenements']['total'] > 0)
                        		$link .= '<span class="notifslien">'.$notifs['evenements']['total'].'</span>';
	                		echo $this->Html->link($link, array('controller' => 'evenements', 'action' => 'index'), array('escape' => false));
	                	?>
	                	</li>
	                	<li><?php echo $this->Html->link('Mon groupe', array('controller' => 'groupes', 'action' => 'index', $this->Session->read('Auth.Personne.groupe_id'))); ?></li>
	                	<li><?php echo $this->Html->link('Annuaire', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
	                	<li><?php echo $this->Html->link('Plan Interactif IUT', array('controller' => 'timetable', 'action' => 'batiment')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Messagerie</a>
                	<ul class="menu-dropdown">
                		<li><?php echo $this->Html->link('Mes messages', array('controller' => 'messages', 'action' => 'index')); ?></li>
                		<li><?php echo $this->Html->link('Nouveau message', array('controller' => 'messages', 'action' => 'nouveau')); ?></li>
                	</ul>
                </li>
            </ul>
            <ul class="nav secondary-nav">
                <li class="menu">
                    <a href="#" class="menu">
                    	Mon Profil
                    	<?php
                    		if ($notifs['total'] > 0)
		                    	echo '<span class="notifs">'.$notifs['total'].'</span>';
		                ?>
                    </a>
                    <ul class="menu-dropdown">
                    <li><?php echo $this->Html->link('Emploi du temps', 'http://www-ade.iut2.upmf-grenoble.fr/ade/custom/modules/plannings/direct_planning.jsp?resources='.$ressource.'&weeks='.(date('W')+17).'&showTree='.((is_null($ressource)) ? "true" : "false").'&showPianoDays=true&login=WebINFO&password=MPINFO&projectId=10&displayConfName=Vue_Web_INFO_Etudiant&showOptions=false&showPianoWeeks=true&days=0,1,2,3,4,5'); ?></li>
                         <li><?php
                        	$link = 'Mes Notifications';
                        	if ($notifs['total'] > 0)
                        		$link .= '<span class="notifslien">'.$notifs['total'].'</span>';
                        	echo $this->Html->link($link, array('controller' => 'notifications', 'action' => 'index'), array('escape' => false));
                        ?></li>
                        <li><?php echo $this->Html->link('Mon mot de passe', array('controller' => 'personnes', 'action' => 'editme')); ?></li>
                    </ul>
                </li>

				<li class="menu">
                <?php echo $this->Html->link($this->Html->image('icones/icone-deconnexion.png'),  array('controller' => 'personnes', 'action' => 'deconnexion'), array('style' => 'padding-bottom: 9px;', 'escape' => false)); ?>
                </li>

            </ul>
        </div>
    </div>
</div>