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
	<table id="sort" class="zebra-striped">
		<thead>
			<tr>
				<th class="id">ID</th>
				<th class="blue">Document</th>
				<th class="purple action">Actions</th>
			</tr>
		</thead>
		<tbody>
<?php foreach ($p['DocumentsStatique'] as $doc): ?>
		<tr>
			<td class="id"><?php echo $doc['id']; ?></td>
			<td><?php echo $doc['nom']; ?></td>
			<td>
			<?php
			echo $this->Html->link('Visualiser', array('controller' => 'files', 'action' => 'documents', $p['PagesStatique']['id'], $doc['nom']),
									array('escape' => false, 'class' => 'btn info small'));
			if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof'])
				echo '&nbsp;<a href="#delete" class="btn small danger">Supprimer</a>';
			?>	
			</td>
		</tr>
<?php endforeach; ?>
		</tbody>
	</table>
	
<?php if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof']): ?>
	<div class="dropfile" data-folder="documents/<?php echo $p['PagesStatique']['id']; ?>" data-page="<?php echo $p['PagesStatique']['id']; ?>"></div>
	<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
	jQuery(function($){
		var page = '<?php echo $p['PagesStatique']['id']; ?>';
		var buttons = '<?php echo $this->Html->link('Visualiser', array('controller' => 'files', 'action' => 'documents'), array('class' => 'btn info small'));
			if ($this->Session->read('Auth.Personne.statut_id') >= $statutsID['prof'])
				echo '&nbsp;<a href="#delete" class="btn small danger">Supprimer</a>'; ?>';
		$('.dropfile').dropfile({
			script: '<?php echo $this->Html->url(array('controller' => 'documents', 'action' => 'upload')); ?>',
			clone: false,
			complete: function (json){
					var tr = $('<tr/>').append($('<td/>', { 'class': 'id', text: json.id }));
					tr.append($('<td/>', { text: json.name }));
					tr.append($('<td/>', { html: buttons }));
					var href = $(tr).find(':nth-child(3) a:first-child').attr('href');
					$(tr).find(':nth-child(3) a:first-child').attr('href', href+'/'+page+'/'+json.name);
					$('#sort tbody').append(tr);
					return true;
				},
		});
		$('a[href=#delete]').live('click', function(){
			var tr = $(this).parent().parent();
			var id = $(tr).find('td.id').text();
			var file = $(tr).find('td:nth-child(2)').text();
			var xhr		= new XMLHttpRequest();
			
			xhr.open('post', '<?php echo $this->Html->url(array('controller' => 'documents', 'action' => 'upload')); ?>', true);
			xhr.setRequestHeader('action', 'delete');
			xhr.setRequestHeader('x-param-id', id);
			xhr.setRequestHeader('x-param-value', file);
			xhr.setRequestHeader('x-param-folder', 'documents/'+page);
			xhr.send();
			$(tr).fadeOut();
			return false;
		});
	});
	<?php echo $this->Html->scriptEnd(); ?>
<?php endif; ?>

	</div>
</div>