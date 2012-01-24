<?php $this->title = 'Intranet | Gestion des documents des Modules'; ?>
<div class="page-header">
	<h1>Documents du module <?php echo $this->Form->select(false, $modules, $select, array('id' => 'modules')); ?></h1>
</div>

<?php foreach ($docs as $mod => $doc): ?>
<div id="<?php echo $doc['module_id']; ?>" class="<?php echo ($doc['module_id'] == $select) ? 'active ' : false; ?>module">
	<p>Faire un glisser-déposer pour ajouter un document, pour remplacer, il suffit de glisser-deposer par dessus.</p>
	
	<?php
		if (!empty($doc) AND sizeof($doc) > 1):
		foreach ($doc as $k => $d): if (is_array($d)): ?>

		<div class="dropfile" data-folder="modules/<?php echo $mod; ?>" data-value="<?php echo $d['nom']; ?>" data-id="<?php echo $d['id']; ?>">
			<span class="infoFichier"><?php echo $d['nom']; ?></span>
			<a href="#delete">
			<?php if ($this->Session->read('Auth.Personne.id') == $d['personne_id']
					OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
						echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
			<?php
				if (in_array($d['type_mime'], $typesImages))		$image = 'Image';
				elseif (in_array($d['type_mime'], $typesPDF))		$image = 'PDF';
				elseif (in_array($d['type_mime'], $typesWord))		$image = 'Word';
				elseif (in_array($d['type_mime'], $typesExcel))		$image = 'Excel';
			?>
			<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
		</div>
	
	<?php endif;
			endforeach; // fin pour les documents du module
		else:
			echo '<p>Il n\'y a pas encore de document pour ce module</p>';
		endif;
	?>
	
	<div class="dropfile" data-folder="modules/<?php echo $mod; ?>" data-module="<?php echo $doc['module_id']; ?>"></div>
</div>
<?php endforeach; // fin pour le module ?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery(function($){
	$('.module').each(function(index, element){
		$(this).append('<h5>* Formats pris en charge : Pdf, Word, Excel, Open Office, Jpeg, Png, Gif</h5>');
	});
	
	$('.dropfile').dropfile({
		script: '<?php echo $this->Html->url(array('action' => 'upload')); ?>',
		image: '<?php echo '/'.IMAGES_URL.'/delete.png'; ?>',
	});
	
	$('a[href=#delete]').live('click', function(){
		var fichier	= $(this).parent().data('value');
		var zone 	= $(this).parent();
		var xhr		= new XMLHttpRequest();
		
		xhr.open('post', '<?php echo $this->Html->url(array('action' => 'upload')); ?>', true);
		xhr.setRequestHeader('action', 'delete');
		for (var i in zone.data())
		{
			if (typeof zone.data(i) !== 'object')
				xhr.setRequestHeader('x-param-'+i, zone.data(i));
		}
		xhr.send();
		$(this).parent().fadeOut();
		return false;
	});
	
	$('.module').hide();
	$('.module.active').show();
	
});
<?php echo $this->Html->scriptEnd(); ?>