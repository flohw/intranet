<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><?php echo $this->Html->link('Administrateur'.$this->Html->image('icones/icone-admin.png'),  array('controller' => 'pages', 'action' => 'display', 'personnes_home'), array('escape' => false)); ?></h3>
            <ul>
                <li class="menu">
                	<a href="#" class="menu">L'Infrastrucutre</a>
                	<ul class="menu-dropdown">
                		<li><?php echo $this->Html->link('Les semestres', array('controller' => 'semestres', 'action' => 'index')); ?></li>
                		<li><?php echo $this->Html->link('Les départements', array('controller' => 'departements', 'action' => 'editer')); ?></li>
                		<li><?php echo $this->Html->link('Créer un module', array('controller' => 'modules', 'action' => 'editer')); ?></li>
                		<li><?php echo $this->Html->link('Créer un type de module', array('controller' => 'modules', 'action' => 'edittype')); ?></li>
                		<li><?php echo $this->Html->link('Les libellés de modules', array('controller' => 'modules', 'action' => 'editmod')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Comptes</a>
                	<ul class="menu-dropdown">
                		<li><?php echo $this->Html->link('Editer un compte', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
                		<li><?php echo $this->Html->link('Ajouter un compte', array('controller' => 'personnes', 'action' => 'edition')); ?></li>
                		<li><?php echo $this->Html->link('Ajouter un groupe', array('controller' => 'groupes', 'action' => 'editer')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Scolarité<?php if ($notifs['evenements']['total'] > 0)
		                    	echo '<span class="notifs">'.$notifs['evenements']['total'].'</span>'; ?></a>
                    <ul class="menu-dropdown">
                    	<li>
	                	<?php
	                		$link = 'Évènements';
	                		if ($notifs['evenements']['total'] > 0)
                        		$link .= '<span class="notifslien">'.$notifs['evenements']['total'].'</span>';
	                		echo $this->Html->link($link, array('controller' => 'evenements', 'action' => 'index'), array('escape' => false)); ?>
	                	</li>
                        <li><?php echo $this->Html->link('Absences', array('controller' => 'absences', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Modifier l\'emploi du temps', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
                    </ul>
                </li>
                <li class="separator"></li>
                <li class="menu">
                    <a href="#" class="menu">Enseignements</a>
                    <ul class="menu-dropdown">
                        <?php echo $this->element('menu_modules'/* , array('cache' => '+1 year') */); ?>
                    </ul>
                </li>
                <li class="menu">
                    <a href="#" class="menu">Stages & projets</a>
                    <ul class="menu-dropdown">
                        <li><?php echo $this->Html->link('Stages', array('controller' => 'stages', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Projet tuteuré 1A', array('controller' => 'stages', 'action' => 'pt1')); ?></li>
                        <li><?php echo $this->Html->link('Projet tuteuré 2A', array('controller' => 'stages', 'action' => 'pt2')); ?></li>
                        <li><?php echo $this->Html->link('Projet personnel professionnel', array('controller' => 'stages', 'action' => 'ppp')); ?></li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="#" class="menu">Infos</a>
                    <ul class="menu-dropdown">
                        <li><?php echo $this->Html->link('Les groupes', array('controller' => 'groupes', 'action' => 'index')); ?></li>
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
                        <li><?php echo $this->Html->link("Emploi du Temps", array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
                       <li><?php
                        	$link = 'Mes Notifications';
                        	if ($notifs['total'] > 0)
                        		$link .= '<span class="notifslien">'.$notifs['total'].'</span>';
                        	echo $this->Html->link($link, array('controller' => 'notifications', 'action' => 'index'), array('escape' => false));
                        ?></li>
                        <li><?php echo $this->Html->link('Gestion du compte', array('controller' => 'personnes', 'action' => 'edition', $this->Session->read('Auth.Personne.id'))); ?></li>
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
