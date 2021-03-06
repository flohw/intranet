<?php $this->title = "Intranet | Gestion des documents des Stages et Projets"; ?>
<div class="page-header">
	<h1>Gestion des documents des Stages et Projets</h1>
</div>
<ul class="tabs">
	<li class="active"><a href="#stages-utiles">Stages (docs utiles)</a></li>
	<li><a href="#stages-offres">Stages (offres)</a></li>
	<li><a href="#PT1A">PT1A</a></li>
	<li><a href="#PT2A">PT2A</a></li>
	<li><a href="#PT2A-rapports">PT2A (rapports de stages)</a></li>
	<li><a href="#PPP">PPP</a></li>
	<li><a href="#posters">Posters</a></li>
</ul>

<div class="pill-content">
	<!-- Stages-Utiles -->
	<div id="stages-utiles" class="active">
		<h3>Renseignements sur les stages</h3>
		<p>Faire un glisser-déposer pour ajouter un document, pour remplacer, il suffit de glisser-deposer par dessus.</p>
		<?php foreach ($docStageUtile as $doc): $doc = current($doc); ?>
			<?php $class = ($this->Session->read('Auth.Personne.id') == $doc['personne_id'] OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']) ? 'droping' : null; ?>
			<div class="dropfile <?php echo $class; ?>" data-folder="stages-utiles" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<span class="infoFichier"><?php echo $doc['nom']; ?></span>
				<?php if ($this->Session->read('Auth.Personne.id') == $doc['personne_id']
						OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
							echo '<a href="#delete">'.$this->Html->image('delete.png', array('class' => 'delete')).'</a>'; ?>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>
		<div class="dropfile droping" data-folder="stages-utiles"></div>
	</div>
	<!-- Stages-Offres -->
	<div id="stages-offres">
		<h3>Offres de stages</h3>
		<p>Faire un glisser-déposer pour ajouter un document, pour remplacer, il suffit de glisser-deposer par dessus.</p>
		<?php foreach ($docStageOffres as $doc): $doc = current($doc); ?>
		<?php $class = ($this->Session->read('Auth.Personne.id') == $doc['personne_id'] OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']) ? 'droping' : null; ?>
			<div class="dropfile <?php echo $class; ?>" data-folder="stages-offres" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<span class="infoFichier"><?php echo $doc['nom']; ?></span>
				<a href="#delete">
				<?php if ($this->Session->read('Auth.Personne.id') == $doc['personne_id']
						OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
							echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>
		<div class="dropfile droping" data-folder="stages-offres"></div>
	</div>
	<!-- PT1A -->
	<div id="PT1A">
		<h3>Affectations des groupes</h3>
		<?php echo $this->Form->create('Document', array('type' => 'file')); ?>
		<?php echo $this->Form->hidden('pt', array('value' => 'PT1A')); ?>
		<?php echo $this->Form->text('fichier', array('label' => false, 'type' => 'file', 'class' => 'input')); ?>
		<?php if ($filePT1A) echo '<span class="infoAff">Le fichier a déjà été enregistré : '.$this->Html->link('ici', array('controller' => 'files', 'action' => 'PT1A', 'affectation.pdf')).'</span>'; ?>
		<?php echo $this->Form->submit('Envoyer', array('class' => 'btn primary')); ?>
		<?php echo $this->Form->end(); ?>
		
		<h3>Ajouter un document pour les projets tuteurés de première année</h3>
		<p>Faire un glisser-déposer pour ajouter un document, pour remplacer, il suffit de glisser-deposer par dessus.</p>
		<?php foreach ($docPT1A as $doc): $doc = current($doc); ?>
		<?php $class = ($this->Session->read('Auth.Personne.id') == $doc['personne_id'] OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']) ? 'droping' : null; ?>
			<div class="dropfile <?php echo $class; ?>" data-folder="PT1A" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<span class="infoFichier"><?php echo $doc['nom']; ?></span>
				<a href="#delete">
				<?php
					if ($this->Session->read('Auth.Personne.id') == $doc['personne_id']
						OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
							echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>
		<div class="dropfile droping" data-folder="PT1A"></div>
	</div>
	<!-- PT2A -->
	<div id="PT2A">
		<?php if ($filePT2A) echo '<span class="infoAff">Le fichier a déjà été enregistré : '.$this->Html->link('ici', array('controller' => 'stages', 'action' => 'pt1')).'</span>'; ?>
		<h3>Affectations des groupes</h3>
		<?php echo $this->Form->create('Document', array('type' => 'file')); ?>
		<?php echo $this->Form->hidden('pt', array('value' => 'PT2A')); ?>
		<?php echo $this->Form->text('fichier', array('label' => 'Fichier des affectations', 'type' => 'file', 'class' => 'input')); ?>
		<?php echo $this->Form->submit('Envoyer', array('class' => 'btn primary')); ?>
		<?php echo $this->Form->end(); ?>
		
		<h3>Ajouter un document pour les projets tuteurés de deuxième année</h3>
		<p>Faire un glisser-déposer pour ajouter un document, pour remplacer, il suffit de glisser-deposer par dessus.</p>
		<?php foreach ($docPT2A as $doc): $doc = current($doc); ?>
		<?php $class = ($this->Session->read('Auth.Personne.id') == $doc['personne_id'] OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']) ? 'droping' : null; ?>
			<div class="dropfile <?php echo $class; ?>" data-folder="PT2A" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<span class="infoFichier"><?php echo $doc['nom']; ?></span>
				<a href="#delete">
				<?php if ($this->Session->read('Auth.Personne.id') == $doc['personne_id']
						OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
							echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>
		<div class="dropfile droping" data-folder="PT2A"></div>
	</div>
	<!-- PT2A-rapports -->
	<div id="PT2A-rapports">
		<h3>Rapports de stages de deuxième année</h3>
		<p>Faire un glisser-déposer pour ajouter un document, pour remplacer, il suffit de glisser-deposer par dessus.</p>
		<?php foreach ($docPT2Arapports as $doc): $doc = current($doc); ?>
		<?php $class = ($this->Session->read('Auth.Personne.id') == $doc['personne_id'] OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']) ? 'droping' : null; ?>
			<div class="dropfile <?php echo $class; ?>" data-folder="PT2A-rapports" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<span class="infoFichier"><?php echo $doc['nom']; ?></span>
				<a href="#delete">
				<?php if ($this->Session->read('Auth.Personne.id') == $doc['personne_id']
						OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
							echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>
		<div class="dropfile droping" data-folder="PT2A-rapports"></div>
	</div>
	<!-- PPP -->
	<div id="PPP">
		<?php if ($filePPP) echo '<span class="infoAff">Le fichier a déjà été enregistré : '.$this->Html->link('ici', array('controller' => 'stages', 'action' => 'pt1')).'</span>'; ?>
		<h3>Affectations des groupes</h3>
		<?php echo $this->Form->create('Document', array('type' => 'file')); ?>
		<?php echo $this->Form->hidden('pt', array('value' => 'PPP')); ?>
		<?php echo $this->Form->text('fichier', array('label' => 'Fichier des affectations', 'type' => 'file', 'class' => 'input')); ?>
		<?php echo $this->Form->submit('Envoyer', array('class' => 'btn primary')); ?>
		<?php echo $this->Form->end(); ?>

		<h3>Ajouter un document pour les projets tuteurés de deuxième année</h3>
		<p>Faire un glisser-déposer pour ajouter un document, pour remplacer, il suffit de glisser-deposer par dessus.</p>
		<?php foreach ($docPPP as $doc): $doc = current($doc); ?>
		<?php $class = ($this->Session->read('Auth.Personne.id') == $doc['personne_id'] OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']) ? 'droping' : null; ?>
			<div class="dropfile <?php echo $class; ?>" data-folder="PPP" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<span class="infoFichier"><?php echo $doc['nom']; ?></span>
				<a href="#delete">
				<?php if ($this->Session->read('Auth.Personne.id') == $doc['personne_id']
						OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
							echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>

		<div class="dropfile droping" data-folder="PPP"></div>
	</div>
	<!-- Posters -->
	<div id="posters">
		<h3>Ajouter un poster de PPP</h3>
		<p>Faire un glisser-déposer pour ajouter un document, pour remplacer, il suffit de glisser-deposer par dessus.</p>
		<?php foreach ($docPosters as $doc): $doc = current($doc); ?>
		<?php $class = ($this->Session->read('Auth.Personne.id') == $doc['personne_id'] OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin']) ? 'droping' : null; ?>
			<div class="dropfile <?php echo $class; ?>" data-folder="posters" data-value="<?php echo $doc['nom']; ?>" data-id="<?php echo $doc['id']; ?>">
				<span class="infoFichier"><?php echo $doc['nom']; ?></span>
				<a href="#delete">
				<?php if ($this->Session->read('Auth.Personne.id') == $doc['personne_id']
						OR $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'])
							echo $this->Html->image('delete.png', array('class' => 'delete')); ?></a>
				<?php
					if (in_array($doc['type_mime'], $typesImages))		$image = 'Image';
					elseif (in_array($doc['type_mime'], $typesPDF))		$image = 'PDF';
					elseif (in_array($doc['type_mime'], $typesWord))	$image = 'Word';
					elseif (in_array($doc['type_mime'], $typesExcel))	$image = 'Excel';
				?>
				<?php echo $this->Html->image('icones/fichier'.$image.'.png', array('width' => 128, 'height' => 128, 'class' => 'place')); ?>
			</div>
		<?php endforeach; ?>

		<div class="dropfile droping" data-folder="posters"></div>
	</div>
</div>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
jQuery(function($){
	
	$('.pill-content>div').each(function(index, element){
		$(this).append('<h5>* Formats pris en charge : Jpeg, Word, Excel, Png, Gif, Pdg</h5>');
	});
	
	$('.droping').dropfile({
		script: '<?php echo $this->Html->url(array('action' => 'upload')); ?>',
		image: '<?php echo IMAGES_URL.'/delete.png'; ?>',
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
	
});
<?php echo $this->Html->scriptEnd(); ?>