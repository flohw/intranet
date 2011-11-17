<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><?php echo $this->Html->link("Acceuil",  array('controller' => 'pages', 'action' => 'display', 'home')); ?></h3>
            <ul>
                <li><?php echo $this->Html->link("L'IUT 2", array('controller' => 'pages', 'action' => 'display', 'iut')); ?></li>
                <li><?php echo $this->Html->link("Infos", array('controller' => 'pages', 'action' => 'display', 'infos')); ?></li>
                <li><?php echo $this->Html->link("Contact", array('controller' => 'pages', 'action' => 'display', 'contact')); ?></li>
            </ul>
            <ul class="nav secondary-nav">
            <?php echo $this->Form->create('Personne', array ('controller' => 'personnes', 'action' => 'connexion')); ?>
            <?php echo $this->Form->text('login', array('class' => 'input-small', 'placeholder' => 'Login', 'label' => false)); ?>
            <?php echo $this->Form->password('mot_de_passe', array('class' => 'input-small', 'placeholder' => 'Password', 'label' => false)); ?>
               <?php echo $this->Form->button('Connexion', array('class' => 'btn primary'));?>
            <?php echo $this->Form->end(); ?>
            </ul>
        </div>
    </div>
</div>