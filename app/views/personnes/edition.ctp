<?php $this->title = 'Intranet | Administration | Ajout d\'une personne'; ?>
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
    	<?php echo $this->Form->input('departement_id', array('label' => 'Département', 'options' => $depts, 'class' => 'input')); ?>
    </div>
    <div class="clearfix">
    	<?php echo $this->Form->input('groupe_id', array('label' => 'Groupe', 'options' => $groupes, 'class' => 'input')); ?>
    </div>
    <div class="clearfix">
    	<?php echo $this->Form->input('statut_id', array('label' => 'Statut', 'options' => $statuts, 'class' => 'input')); ?>
    </div>
    <div class="clearfix">
    	<?php echo $this->Form->input('login', array('label' => 'Login', 'class' => 'input')); ?>
    </div>
    <div class="clearfix">
        <?php echo $this->Form->input('email', array('class' => 'input', 'label' => 'Email')); ?>
    </div>
    <div class="clearfix">
        <?php echo $this->Form->input('telephone', array('class' => 'input', 'label' => 'Telephone')); ?>
    </div>
        <div class="clearfix" id="bureau">
        <?php echo $this->Form->input('bureau', array('class' => 'input', 'label' => 'Bureau')); ?>
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
  	defaultDate: '1981-01-01',
  	dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
  	dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
  	monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
  	monthNamesShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
  	firstDay: 1,
  	changeYear: true,
  	changeMonth: true,
  	yearRange: '-30y:-15y',
  	prevText: '',
  	nextText: '',
  });
});
<?php echo $this->Html->scriptEnd(); ?>