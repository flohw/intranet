<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><?php echo $this->Html->link('Administrateur'.$this->Html->image('icones/icone-admin.png'),  array('controller' => 'pages', 'action' => 'display', 'personnes_home'), array('escape' => false)); ?></h3>
            <ul>
                <li class="menu">
                	<a href="#" class="menu">Départements</a>
                	<ul class="menu-dropdown">
                		<li><?php echo $this->Html->link('Editer les départements', array('controller' => 'departements', 'action' => 'editer')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Comptes</a>
                	<ul class="menu-dropdown">
                		<li><?php echo $this->Html->link('Editer un compte', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
                		<li><?php echo $this->Html->link('Ajouter un compte', array('controller' => 'personnes', 'action' => 'edition')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                    <a href="#" class="menu">Scolarité</a>
                    <ul class="menu-dropdown">
                        <li><?php echo $this->Html->link('Abscences', array('controller' => 'absences', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Modification d\'emplois du temps', array('controller' => 'timetable', 'action' => 'maintenance')); ?></li>
                    </ul>
                </li>

                <li class="menu">
                    <a href="#" class="menu">Modules</a>
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
                        <li><?php echo $this->Html->link('Déconnexion', array('controller' => 'personnes','action' => 'deconnexion')); ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>