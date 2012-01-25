<?php $this->title = 'Intranet | Plan interactif | '.$numSalle; ?>

<div class="page-header">
	<h1>
	<?php 
		if(preg_match('#^[0-9]#', $numSalle) OR  preg_match('#^S[1-9]+#', $numSalle))
			echo 'Salle '.$numSalle;
		else
			echo $numSalle; 
	?>
	</h1>
</div>


<div class="row">
	<div class="span8">
	<h3>Etage : <?php echo (($etage == 'S')) ? 'Sous-sol' : 'Etage '.$etage; ?></h3>
		<ul  class="media-grid">
			<li><a href="#">
			<?php 
				if (($etage == '1' OR $etage == '2') AND substr($numSalle, 0,1) == 'A')
					$img = 'amphi';
				elseif ($etage == '0' AND preg_match('#^[A-Z]#', $numSalle)) {
					if ($numSalle == 'Pole Informatique')
						$img = 'pole_info';
					elseif ($numSalle == 'Salle Polyvalente')
						$img = 'salle_poly';
					elseif ($numSalle == 'Pole Mediactice')
						$img = 'pole_media';
					elseif ($numSalle == 'Accueil')
						$img = 'accueil';
				}
				elseif ($etage == 'S' AND preg_match('#^C#', $numSalle))
					$img = 'cafet';
				else 
					$img = 'salle'; 
				echo $this->Html->image('photos/'.$img.'.jpg', array('class' =>'thumbnail', 'style' => 'display:block; width:400px; height:280px;')); 
			?></a></li>
		</ul>	
	</div>
	<div class="span8">
	<h3>Emploi du temps de cette salle </h3>
	<ul  class="media-grid">
		<?php echo('<li class="mouse">'.$this->Html->link($html->image('photos/edt.png', array(														'alt' => 'emploi du temps',													'width' => '500px',														'height' => '300px')), 
								array(
							'controller' => 'img',
							 'action' => 'photos', 'edt.png'), array('escape' => false, 'class' => 'zoombox zgallery1',)).'</li>');
		?>
	</ul>	
	</div>
</div>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery (function($) {
	    $('.mouse img').live('mouseenter', function() { 
	            $(this).stop().fadeTo(350,0.5);
	    }).live('mouseleave', function() { 
	            $(this).stop().fadeTo(350,1);
	    });
});

<?php echo $this->Html->scriptEnd(); ?>