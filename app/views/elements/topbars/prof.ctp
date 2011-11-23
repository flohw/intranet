<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><?php echo $this->Html->link('Professeur'.$this->Html->image('icones/icone-prof.png'),  array('controller' => 'pages', 'action' => 'display', 'personnes_home'), array('escape' => false)); ?></h3>
            <ul>
                <li class="menu">
                	<a href="#" class="menu">Documents</a>
                	<ul class="menu-dropdown">
                	 <li><?php echo $this->Html->link('Ajouter un document', array('controller' => '', 'action' => '')); ?></li>
                	 <li><?php echo $this->Html->link('Supprimer un document', array('controller' => '', 'action' => '')); ?></li>
                	 <li><?php echo $this->Html->link('Remplacer un document', array('controller' => '', 'action' => '')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Scolarité</a>
                	<ul class="menu-dropdown">
	                	<li><?php echo $this->Html->link('Abscences', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
	                	<li><?php echo $this->Html->link('Modification d\'emplois du temps', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Infos</a>
                	<ul class="menu-dropdown">
	                	<li><?php echo $this->Html->link('Annuaire des professeurs', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
	                	<li><?php echo $this->Html->link('Annuaire des étudiants', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Messagerie</a>
                	<ul class="menu-dropdown">
                		<li><?php echo $this->Html->link('Nouveau message', array('controller' => 'etudes', 'action' => 'etranger')); ?></li>
                		<li><?php echo $this->Html->link('Boîte de réception', array('controller' => 'etudes', 'action' => 'emplois')); ?></li>
                		<li><?php echo $this->Html->link('Messages envoyés', array('controller' => 'etudes', 'action' => 'emplois')); ?></li>
                	</ul>
                </li>

 
               <li><?php echo $this->Form->create('Recherche', array ('controller' => 'personnes', 'action' => 'rechercher'), array('class' => 'recherche')); ?>
                        <?php echo $this->Form->text('recherche', array('class' => 'recherche', 'placeholder' => 'Recherche', 'label' => false)); ?>
                        <?php echo $this->Form->end(); ?>
                </li>


            </ul>
            <ul class="nav secondary-nav">
                <li class="menu">
                    <a href="#" class="menu">Mon Profil</a>
                    <ul class="menu-dropdown">
                        <li><?php echo $this->Html->link('Emploi du Temps', array('controller' => 'pages', 'action' => 'display', 'emploiDutemps')); ?></li>
                        <li><?php echo $this->Html->link('Mes Notifications', array('controller' => 'pages', 'action' => 'display', 'Notifs')); ?></li>
                        <li><?php echo $this->Html->link('Gestion du compte', array('controller' => 'personnes', 'action' => 'gestion', $this->Session->read('Auth.Personne.id'))); ?></li>
                        <li><?php echo $this->Html->link('Déconnexion', array('controller' => 'personnes','action' => 'deconnexion')); ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>