<?php $this->title = 'Intranet | Evènements | '.$e['Evenement']['titre']; ?>

<div class="page-header">
	<h2><?php echo $e['Evenement']['titre']; ?> <small>- <?php echo $e['TypeEvenement']['nom']; ?></small></h2>
</div>
<div class="titreCrea">
	<h3 style="display:inline;">Créateur de l'évènement : </h3><?php echo $e['Createur']['display']; ?>
</div>	
<div class="row">
	<div class="span6">
		<span class="label important">Dates Importantes</span><br>
		<h3 style="display:inline;">Date de début : </h3><?php echo $e['Evenement']['date_debut']; ?><br />
		<h3 style="display:inline;">Date de fin : </h3><?php echo $e['Evenement']['date_fin']; ?><br />
		<h3>Personnes conviées :</h3>
		<ul>
		<?php
			foreach ($e['Personne'] as $p)
				echo '<li>'.$p.'</li>';
		?>
		</ul>
	</div>
	<div class="span10">
		<span class="label notice">Informations</span><br>
		<h3 style="display:inline;">Description</h3>
		<p><?php echo $e['Evenement']['description']; ?></p>	
	</div>
</div>
<div class="actions">
	<?php echo $this->Html->link('Retour', array('action' => 'index'), array('class' => 'btn success')); ?>
</div>

