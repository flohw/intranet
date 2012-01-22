<?php $this->title = 'Intranet | '.$p['PagesStatique']['titre']; ?>

<div class="page-header">
	<h1>
		<?php echo $p['PagesStatique']['titre']; ?>
		<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof']): ?>
			<span><?php echo $this->Html->link('Editer', array('action' => 'editer', $p['PagesStatique']['id']), array('class' => 'btn success small')); ?></span>
		<?php endif; ?>
	</h1>
</div>

<div class="row">
	<div class="span16">
	<?php echo $p['PagesStatique']['contenu']; ?>
	</div>
</div>

<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof']): ?>

<?php endif; ?>