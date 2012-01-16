<?php $this->title = 'Intranet | Evènements | '.$e['Evenement']['titre']; ?>

<div class="page-header">
	<h1><?php echo $e['Evenement']['titre']; ?></h1>
</div>

<div class="row">
	<div class="span8">
		Date de début : <?php echo $e['Evenement']['date_debut']; ?><br />
		Date de fin : <?php echo $e['Evenement']['date_fin']; ?><br />
		Personnes conviées :
		<ul>
		<?php
			foreach ($e['Personne'] as $p)
				echo '<li>'.$p.'</li>';
		?>
		</ul>
	</div>
	<div class="span8">
		<h3>Description</h3>
		<?php echo $e['Evenement']['description']; ?>
	</div>
</div>