<?php $this->title = 'Intranet | Plan interactif | Salle '.$salle; ?>

<div class="page-header">
	<h1><?php echo ((preg_match('#^[0-9]#', $numSalle)) ? 'Salle ' : null).$numSalle; ?></h1>
</div>

<div class="row">
	<div class="span8">
		<h1>Photo</h1>	
	</div>
	<div class="span8">
		<h3><?php echo (($etage == 'S')) ? 'Sous-sol' : 'Etage '.$etage; ?></h3>
	</div>
</div>