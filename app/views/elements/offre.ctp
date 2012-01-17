<?php
	if($i++ == 0)
		echo '<h3 class="active">'.$o['Stage']['entreprise'].'<span>'.$o['Stage']['ville'].'</span></h3>';
	else
		echo '<h3>'.$o['Stage']['entreprise'].'<span>'.$o['Stage']['ville'].'</span></h3>';
?>
	<div>
<?php
	if ($o['Stage']['dispo'] == 1)
		echo '<span class="label warning">Non disponible</span>';
	else
		echo '<span class="label success">Disponible</span>';
?>
		<ul>
			<li><?php echo $o['Stage']['description']; ?></li><li>&nbsp;</li>
			<li><?php echo $this->Html->link($o['Stage']['document'], array('controller' => 'files', 'action' => 'stages-offres', $o['Stage']['document'])); ?></li>
		</ul>
<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof']): ?>
		<br />
		<a href="#" class="btn small info">Editer</a>
		<a href="#" class="btn small danger">Supprimer</a>
<?php endif; ?>
	</div>