<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><?php echo $this->Html->link('Acceuil'.$this->Html->image('icone-user.png'),  array('controller' => 'pages', 'action' => 'display', 'home'), array('escape' => false)); ?></h3>
            <ul>
                <li><?php echo $this->Html->link("L'IUT 2", array('controller' => 'pages', 'action' => 'display', 'iut')); ?></li>
                <li><?php echo $this->Html->link("Infos", array('controller' => 'pages', 'action' => 'display', 'infos')); ?></li>
                <li><?php echo $this->Html->link("Contact", array('controller' => 'pages', 'action' => 'display', 'contact')); ?></li>
            </ul>
            <ul class="nav secondary-nav">
            <li class="menu">
            	<a href="#" class="menu">Se connecter</a>
            	<div id="signin" class="menu-dropdown menu">
					<?php echo $this->Form->create('Personne', array ('controller' => 'personnes', 'action' => 'connexion')); ?>
					<div class="clearfix">
						<span>Login</span>
						<?php echo $this->Form->text('login', array('label' => false)); ?>
					</div>
					<div class="clearfix">
						<span>Mot de passe</span>
						<?php echo $this->Form->password('mot_de_passe', array('label' => false)); ?>
					</div>
					<ul class="inputs-list">
						<li>
							<label for="PersonneAutoconnect">
								<?php echo $this->Form->checkbox('autoconnect'); ?>
								<span>Rester connecté</span>
							</label>
						</li>
					</ul>
					<?php echo $this->Form->button('Connexion', array('class' => 'btn primary'));?>
					<?php echo $this->Form->end(); ?>
            	</div>
            </li>
            </ul>
        </div>
    </div>
</div>