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
				<?php echo $this->Html->link('Mot de passe oublié ?', '#', array('class' => 'btn mdp', 'onclick' => "$('.modal-backdrop').fadeIn()")); ?>
			</div>
		<?php echo $this->Form->end(); ?>

	</div>
</div>	

<div class="modal-backdrop">
	<div class="modal">
		<div class="modal-header">
			<h3>Mot de passe oublié ?</h3>
		</div>
		<div class="modal-body">
			<p>Pour des raisons de sécurité, aucun mot de passe ne peut être rendu sans 
			présenter une carte d'étudiant, allez vous présenter à votre pôle informatique pour leur demander</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn primary" onclick="$('.modal-backdrop').fadeOut();">OK</a>
		</div>
	</div>
</div>