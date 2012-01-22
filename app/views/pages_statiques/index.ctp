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

<br />

<div class="row">
	<div class="span16">
<?php foreach ($p['DocumentsStatique'] as $doc): ?>
	<div class="dropfile" data-folder="documents/<?php echo $p['PagesStatique']['id']; ?>" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
		<span class="infoFichier"><?php echo $doc['nom']; ?></span>
		<?php
			echo '<a href="#delete">'.$this->Html->image('delete.png', array('class' => 'delete')).'</a>';
			
			if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
			elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
			elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
			elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
			
			echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place'));
		?>
	</div>
<?php endforeach; ?>
	
<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof']): ?>
	<div class="dropfile" data-folder="documents/<?php echo $p['PagesStatique']['id']; ?>" data-page="<?php echo $p['PagesStatique']['id']; ?>"></div>
	<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
	jQuery(function($){
		$('.dropfile').dropfile({
			script: '<?php echo $this->Html->url(array('controller' => 'documents', 'action' => 'upload')); ?>',
		});
	});
	<?php echo $this->Html->scriptEnd(); ?>
<?php endif; ?>

	</div>
</div>