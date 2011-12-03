<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><?php echo $this->Html->link('Elève'.$this->Html->image('icones/icone-eleve.png'),  array('controller' => 'pages', 'action' => 'display', 'personnes_home'), array('escape' => false)); ?></h3>
            <ul>
                <li class="menu">
                	<a href="#" class="menu">Modules</a>
                	<ul class="menu-dropdown">
                		<?php echo $this->element('menu_modules'/* , array('cache' => '+1 year') */); ?>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Stages & projets</a>
                	<ul class="menu-dropdown">
                		<li><?php echo $this->Html->link('Offres de stage', array('controller' => 'stages', 'action' => 'index')); ?></li>
                		<li><?php echo $this->Html->link('Infos', array('controller' => 'stages', 'action' => 'infos')); ?></li>
                		<li><?php echo $this->Html->link('Projet tuteuré 1A', array('controller' => 'stages', 'action' => 'projets')); ?></li>
                		<li><?php echo $this->Html->link('Projet tuteuré 2A', array('controller' => 'stages', 'action' => 'projets')); ?></li>
                		<li><?php echo $this->Html->link('Projet personnel professionnel', array('controller' => 'stages', 'action' => 'projets')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Infos</a>
                	<ul class="menu-dropdown">
	                	<li><?php echo $this->Html->link('Annuaire', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
	                	<li><?php echo $this->Html->link('IUT Interactif', array('controller' => 'timetable', 'action' => 'batiment')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Messagerie</a>
                	<ul class="menu-dropdown">
                		<li><?php echo $this->Html->link('Mes messages', array('controller' => 'messages', 'action' => 'index')); ?></li>
                		<li><?php echo $this->Html->link('Nouveau message', array('controller' => 'messages', 'action' => 'nouveau')); ?></li>
                	</ul>
                </li>

 
               <li><?php echo $this->Form->create('Recherche', array ('controller' => 'personnes', 'action' => 'rechercher'), array('class' => 'recherche')); ?>
                        <?php echo $this->Form->text('recherche', array('class' => 'recherche', 'placeholder' => 'Recherche', 'label' => false)); ?>
                        <?php echo $this->Form->end(); ?>
                </li>


            </ul>
            <ul class="nav secondary-nav">
                <li class="menu">
                    <a href="#" class="menu">
                    	Mon Profil
                    	<?php
                    		if (isset($notifs) AND $notifs > 0)
		                    	echo '<span class="notifs">'.$notifs.'</span>';
		                ?>
                    </a>
                    <ul class="menu-dropdown">
                        <li><?php echo $this->Html->link("Emploi du Temps", array('controller' => 'pages', 'action' => 'display', 'emploiDutemps')); ?></li>
                        <li><?php echo $this->Html->link("Mes Notifications", array('controller' => 'pages', 'action' => 'display', 'Notifs')); ?></li>
                        <li><?php echo $this->Html->link('Gestion du compte', array('controller' => 'personnes', 'action' => 'edition', $this->Session->read('Auth.Personne.id'))); ?></li>
                        <li><?php echo $this->Html->link('Déconnexion', array('controller' => 'personnes','action' => 'deconnexion')); ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>