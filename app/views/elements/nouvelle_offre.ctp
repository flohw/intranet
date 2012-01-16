<?php
	echo $this->Form->create('Stage');
	echo $this->Form->input('entreprise');
	echo $this->Form->input('ville');
?>
	<div>
		<?php echo $this->Form->input('description'); ?>
	</div>
<?php echo $this->Form->submit('Enregistrer', array('class' => 'btn small success')); ?>
<?php echo $this->Form->end(); ?>