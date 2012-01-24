<?php
	if($i++ == 0)
		echo '<h3 class="active" id="titre'.$o['Stage']['id'].'">'.$o['Stage']['entreprise'].'<span>'.$o['Stage']['ville'].'</span></h3>';
	else
		echo '<h3 id="titre'.$o['Stage']['id'].'">'.$o['Stage']['entreprise'].'<span>'.$o['Stage']['ville'].'</span></h3>';
?>
	<div>
<?php
	if ($o['Stage']['dispo'] == 1)
		echo '<span class="label success">Disponible</span>';
	else
		echo '<span class="label warning">Non disponible</span>';
?>
		<ul>
			<li><?php echo $o['Stage']['description']; ?></li>
			<?php if (!empty($o['Stage']['document'])): ?>
				<li>&nbsp;</li>
				<li><?php echo $this->Html->link($o['Stage']['document'], array('controller' => 'files', 'action' => 'stages-offres', $o['Stage']['document'])); ?></li>
			<?php endif; ?>
		</ul>
<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof']): ?>
		<br />
		<a href="#<?php echo $o['Stage']['id']; ?>" class="btn small info editer">Editer</a>
		<a href="#<?php echo $o['Stage']['id']; ?>" class="btn small danger supprimer">Supprimer</a>
<?php endif; ?>
	</div>