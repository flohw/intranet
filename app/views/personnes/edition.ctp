<?php $this->title = "Intranet du département Informatique" ?>
  <div class="page-header">
    <h1>Gestion du Compte</h1>
  </div>
<span class="row">
	<span class="span16">
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
        <?php echo $this->Form->input('telephone', array('class' => 'input', 'label' => 'Telephone')); ?>
    </div>
    <div class="clearfix">
        <?php echo $this->Form->input('date_naissance', array('class' => 'input', 'label' => 'Date de Naissance', 'id' => 'datepicker', 'type' => 'text')); ?>
    </div>
    <div class="clearfix">
        <?php echo $this->Form->input('adresse', array('class' => 'input xlarge', 'label' => 'Adresse')); ?>
    </div>
    <div class="actions">
        <?php echo $this->Form->submit('Enregistrer', array('class' => 'btn primary'));?>
    </div>
    <?php echo $this->Form->end(); ?>
  </div>
  </span>
</span>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery(function($) {
  $("#datepicker").datepicker({
  	dateFormat: 'yy-mm-dd',
  	dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
  	dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
  	firstDay: 1,
  });
});
<?php echo $this->Html->scriptEnd(); ?>