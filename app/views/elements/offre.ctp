<?php
	if($i++ == 0)
		echo '<h3 class="active">'.$o['Stage']['entreprise'].'<span>'.$o['Stage']['ville'].'</span></h3>';
	else
		echo '<h3>'.$o['Stage']['entreprise'].'<span>'.$o['Stage']['ville'].'</span></h3>';
?>
	<div>
		<ul>
			<li><?php echo $o['Stage']['description']; ?></li>
		</ul>
<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof']): ?>
		<br />
		<a href="#" class="btn small info">Editer</a>
		<a href="#" class="btn small danger">Supprimer</a>
<?php endif; ?>
	</div>