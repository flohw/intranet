<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->title; ?></title>
		<?php echo $this->Html->charset(); ?>
		<?php echo $this->Html->css('style.css'); ?>
		<?php echo $this->Html->css('bootstrap.css'); ?>
		<?php echo $this->Html->css('jquery-ui.css'); ?>
		<?php echo $this->Html->css('zoombox.css'); ?>
	</head>
	<body>
		<?php echo $this->element("topbars/eleve"); ?>
		
		<div class="container-fluid" id="container">
			<div id="messages">
				<?php echo $this->Session->flash('auth'); ?>
				<?php echo $this->Session->flash(); ?>
			</div>
			<?php echo $this->element('sidebars/eleve'); ?>
			<div class="content"><?php echo $content_for_layout; ?></div>
		</div> 
		<br /><br /><br /><br /><br /><br /><br />
		
		<footer class="footer">
			<div class="container-fluid">
				<p class="pull-right"><a href="#">Haut de page</a></p>
				<p>
					Design par PJ, Marie, Flohw, Alexandra, Aurélie et Do'
					&copy; Tous droits réservés.
				</p>
			</div>
		</footer> 
	
		<?php echo $this->Html->script("jquery"); ?>
		<?php echo $this->Html->script("jquery-ui"); ?>
		<?php echo $this->Html->script("menu"); ?>
		<?php echo $this->Html->script("bootstrap-modal"); ?>
		<?php echo $this->Html->script("bootstrap-tabs"); ?>
		<?php echo $this->Html->script("alerts-elements"); ?>
		<?php echo $this->Html->script("tablesorter"); ?>
		<?php echo $this->Html->script('map'); ?>
		<?php echo $this->Html->script('bootstrap-popover'); ?>
		<?php echo $this->Html->script('zoombox'); ?>
		<?php echo $scripts_for_layout; ?>
	
	</body> 
</html>



