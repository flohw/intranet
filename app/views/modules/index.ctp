<?php $this->title = 'Intranet | Modules'; ?>
<div class="page-header">
	<h1>Listes des modules <small><?php echo $semestre['Semestre']['nom'].' - '.$this->Html->link('Ajouter', array('action' => 'editmod')); ?></small></h1>
</div>
<span class="row">
	<span class="span16">
	<?php if (!empty($modules)): 
			foreach ($modules as $m):
				$nom= $m['LibelleModule']['nom'];
				$id = $m['LibelleModule']['id'];
				echo '<h3 style="inline">'.$nom.'<small> - '.$this->Html->link('Editer', array('action' => 'editmod', $id)).'</small></h3>';
				foreach ($m['Module'] as $mod):
					echo '<blockquote>';
					echo '<h5>'. $this->Html->link($mod['abreviation'], array('controller' => 'documents', 'action' => 'presenter', $mod['id'])) .'<small>'.$this->Html->link('Editer', array('action' => 'editer', $mod['id'])).'</small></h5>';
					echo '<small>'.$mod['description'].'</small>';
					echo '</blockquote>';
				endforeach;
			endforeach;
		endif;
	?>
	</span>
</span>