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

<h3>Etage : <?php echo (($etage == 'S')) ? 'Sous-sol' : 'Etage '.$etage; ?></h3>
<div class="row">
	<div class="span8">
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
	<ul  class="media-grid">
		<?php echo('<li>'.$this->Html->link($html->image('photos/edt.png', array(														'alt' => 'emploi du temps',													'width' => '500px',														'height' => '300px')), 
								array(
							'controller' => 'img',
							 'action' => 'photos', 'edt.png'), array('escape' => false, 'class' => 'zoombox zgallery1',)).
			     '</li>');
		?>
	</ul>	
	</div>
</div>
<!--
JQuery (function() {
	$('.work .meta').hide();
	    $('.work').live('mouseenter', function() { // mousein
	            $(this).find('.meta').stop().fadeTo(350,1);
	    }).live('mouseleave', function() { // mouseout
	            $(this).find('.meta').stop().fadeTo(350,0);
	    });
});
-->