<?php $this->title = 'Intranet | Mes Notes'; ?>
<div class="page-header">
	<h1>Mes notes <small><?php echo $this->Session->read('Auth.Personne.prenom').' '.$this->Session->read('Auth.Personne.nom'); ?></small></h1>
</div>