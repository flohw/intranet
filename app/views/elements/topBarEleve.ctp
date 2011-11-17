<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><?php echo $this->Html->link("Acceuil",  array('controller' => 'pages', 'action' => 'display', 'home')); ?></h3>
            <ul>
                <li><?php echo $this->Html->link("Modules", array('controller' => 'pages', 'action' => 'display', 'modules')); ?></li>
                <li><?php echo $this->Html->link("Stages & Projets", array('controller' => 'pages', 'action' => 'display', 'stagesProjets')); ?></li>
                <li><?php echo $this->Html->link("Infos", array('controller' => 'pages', 'action' => 'display', 'infos')); ?></li>
                <li><?php echo $this->Html->link("Poursuites d'études", array('controller' => 'pages', 'action' => 'display', 'poursuiteEtudes')); ?></li>
                <li><?php echo $this->Form->create('Recherche', array ('controller' => 'personnes', 'action' => 'rechercher'), array('class' => 'recherche')); ?>
                        <?php echo $this->Form->input('recherche', array('class' => 'recherche', 'placeholder' => 'Recherche', 'label' => false)); ?>
                        <?php echo $this->Form->end(); ?>
                </li>
            </ul>
            <ul class="nav secondary-nav">
                <li>
                    <a href="#" class="menu">Mon Profil</a>
                    <ul class="menu-dropdown">
                        <li><?php echo $this->Html->link("Emploi du Temps", array('controller' => 'pages', 'action' => 'display', 'emploiDutemps')); ?></li>
                        <li><?php echo $this->Html->link("Mes Notifications", array('controller' => 'pages', 'action' => 'display', 'Notifs')); ?></li>
                        <li><a href="gestion_compte.php">Gestion du compte</a></li>
                        <li><?php echo $this->Html->link('Déconnexion', array('controller' => 'personnes','action' => 'deconnexion')); ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>