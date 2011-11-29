<?php $this->title = "Intranet du département Informatique" ?>
  <div class="page-header">
    <h1>Gestion du Compte</h1>
    <h5><?php echo $this->Html->link('Déconnexion', array('controller' => 'personnes','action' => 'deconnexion')); ?></h5>
  </div>

  <div class="container-fluid">
    <?php echo $this->Form->create('Personne'); ?>
    <?php echo $this->Form->input('id'); ?>
    <h4>Informations</h4>
    <div class="clearfix">
        <?php echo $this->Form->input('nom', array('class' => 'input', 'label' => 'Nom')); ?>
    </div> 
    <div class="clearfix">
        <?php echo $this->Form->input('prenom', array('class' => 'input', 'label' => 'Prenom')); ?>
    </div>
    <div class="clearfix">
        <?php echo $this->Form->input('email', array('class' => 'input', 'label' => 'Email')); ?>
    </div>
    <div class="clearfix">
        <?php echo $this->Form->input('tel', array('class' => 'input', 'label' => 'Telephone')); ?>
    </div>
    <div class="clearfix">
        <?php echo $this->Form->input('date_naiss', array('class' => 'input', 'label' => 'Date de Naissance', 'id' => 'datepicker')); ?>
    </div>
    <div class="clearfix">
        <?php echo $this->Form->input('adresse', array('class' => 'input xlarge', 'label' => 'Adresse')); ?>
    </div>
    <div class="actions">
        <?php echo $this->Form->submit('Enregistrer', array('class' => 'btn primary'));?>
        <?php echo $this->Html->reset('Effacer', '#', array('class' => 'btn')); ?>
    </div>
    <?php echo $this->Form->end(); ?>
  </div> 
<?php echo $this->Html->scriptStart(); ?>
jQuery(function($) {
  $("#datepicker").datepicker();
});
<?php echo $this->Html->scriptEnd(); ?>