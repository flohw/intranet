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
                		<li><?php echo $this->Html->link('Editer un compte', array('controller' => 'stages', 'action' => 'index')); ?></li>
                		<li><?php echo $this->Html->link('Supprimer un compte', array('controller' => 'stages', 'action' => 'infos')); ?></li>
                		<li><?php echo $this->Html->link('Ajouter un compte', array('controller' => 'stages', 'action' => 'projets')); ?></li>
                	</ul>
                </li>
                <li class="menu">
                	<a href="#" class="menu">Fichiers</a>
                	<ul class="menu-dropdown">
	                	<li><?php echo $this->Html->link('Créer un dossier', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
	                	<li><?php echo $this->Html->link('Editer un dossier', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
	                	<li><?php echo $this->Html->link('Supprimer un dossier', array('controller' => 'personnes', 'action' => 'annuaire')); ?></li>
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


            </ul>
            <ul class="nav secondary-nav">
                <li class="menu">
                    <a href="#" class="menu">Mon Profil</a>
                    <ul class="menu-dropdown">
                        <li><?php echo $this->Html->link("Emploi du Temps", array('controller' => 'pages', 'action' => 'display', 'emploiDutemps')); ?></li>
                        <li><?php echo $this->Html->link("Mes Notifications", array('controller' => 'pages', 'action' => 'display', 'Notifs')); ?></li>
                        <li><?php echo $this->Html->link('Gestion du compte', array('controller' => 'personnes', 'action' => 'gestion', $this->Session->read('Auth.Personne.id'))); ?></li>
                        <li><?php echo $this->Html->link('Déconnexion', array('controller' => 'personnes','action' => 'deconnexion')); ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>