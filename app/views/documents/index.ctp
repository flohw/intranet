<?php $this->title = "Intranet | Gestion des documents"; ?>
<div class="page-header">
	<h1>Gestion des documents</h1>
</div>

<ul class="tabs">
	<li class="active"><a href="#stages">Stages</a></li>
	<li><a href="#PT1A">PT première année</a></li>
	<li><a href="#PT2A">PT deuxième année</a></li>
</ul>

<div class="pill-content">
	<!-- Stages -->
	<div id="stages" class="active">
		<p>
			Ajouter un document pour les stages<br />
			Glisser les fichiers par dessus un autre remplacera le fichier, 
			Glisser les fichiers sur le dernier élément les ajouteront
		</p>
		<?php foreach ($docStage as $doc): $doc = current($doc); ?>
			<div class="dropfile" data-folder="stages" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<a href="#delete"><?php echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>
		<div class="dropfile" data-folder="stages">
		</div>
	</div>
	<!-- PT1A -->
	<div id="PT1A">
		<p>Ajouter un document pour les projets tuteurés de première année</p>
		<?php foreach ($docPT1A as $doc): $doc = current($doc); ?>
			<div class="dropfile" data-folder="PT1A" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<a href="#delete"><?php echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>
		<div class="dropfile" data-folder="PT1A">
		</div>
	</div>
	<!-- PT2A -->
	<div id="PT2A">
		<p>Ajouter un document pour les projets tuteurés de deuxième année</p>
		<?php foreach ($docPT2A as $doc): $doc = current($doc); ?>
			<div class="dropfile" data-folder="PT2A" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<a href="#delete"><?php echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>
		<div class="dropfile" data-folder="PT2A">
		</div>
	</div>
</div>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery(function($){
	$('.dropfile').dropfile({
		script: '<?php echo $this->Html->url(array('action' => 'upload')); ?>',
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
		$(this).parent().remove();
		return false;
	});
	
});
<?php echo $this->Html->scriptEnd(); ?>