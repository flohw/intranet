<?php $this->title = 'Intranet | Editer '.$this->data['PagesStatique']['titre']; ?>

<?php echo $this->Form->create('PagesStatique', array('id' => 'pagesStatique')); ?>
<?php echo $this->Form->input('id'); ?>
<div class="page-header">
	<div class="clearfix"><?php echo $this->Form->input('titre', array('label' => false)); ?></div>
</div>

<div class="row">
	<div class="span16">
	<div class="clearfix">
		<?php echo $this->Form->input('contenu', array('label' => false)); ?>
	</div>
	</div>
</div>

<div class="actions">
	<?php echo $this->Form->submit('Enregistrer', array('class' => 'btn primary'));; ?>
</div>
<?php echo $this->Form->end(); ?>

<?php echo $this->Html->script('tiny_mce/tiny_mce'); ?>
<?php echo $this->Html->script('tinymce'); ?>