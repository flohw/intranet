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
            <li>
            	<a href="#" class="menu">Se connecter</a>
            	<div id="signin" class="dropdown-menu">
					<?php echo $this->Form->create('Personne', array ('controller' => 'personnes', 'action' => 'connexion')); ?>
					<div class="clearfix">
						<?php echo $this->Form->text('login', array('placeholder' => 'Login', 'label' => false)); ?>
					</div>
					<div class="clearfix">
					<?php echo $this->Form->password('mot_de_passe', array('placeholder' => 'Password', 'label' => false)); ?>
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