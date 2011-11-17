<?php $this->title = "Intranet du département Informatique" ?>
<div class="row">
	<div class="span10 offset3">
		<div class="page-header">
			<h2>Connexion</h2>
		</div>
		<?php echo $this->Form->create('Personne', array ('controller' => 'personnes', 'action' => 'connexion')); ?>
		<?php echo $this->Form->input('login', array('class' => 'input', 'label' => 'Identifiant')); ?>
		<?php echo $this->Form->input('mot_de_passe', array('class' => 'input', 'label' => 'Mot de Passe', 'type' => 'password')); ?>
			<div class="actions">
				<?php echo $this->Form->button('Connexion', array('class' => 'btn primary'));?>
				<?php echo $this->Html->link('Mot de passe oublié ?', '#', array('class' => 'btn')); ?>
			</div>
		<?php echo $this->Form->end(); ?>

	</div>
</div>	
