<div class="alert-message block-message <?php echo isset($class) ? $class : 'error'; ?>">
	<a href="#" class="close">x</a>
	<h3>
	<?php
		$class = isset($class) ? $class : 'error';
		switch ($class)
		{
			case 'success':
				echo 'Succès';
				break;
			case 'info':
				echo 'Information';
				break;
			default:
				echo '<span class="red">Erreur</span>';
				break;
		}
	?>
	</h3>
	<p><?php echo $message; ?><br /><br /></p>
	<p><?php echo $this->Html->link($text, $url, array('class' => isset($classBtn) ? 'btn '.$classBtn : 'btn')); ?></p>
</div>