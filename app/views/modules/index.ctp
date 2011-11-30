<?php $this->title = 'Intranet | Modules'; ?>
<div class="page-header">
	<h1>Listes des modules <small><?php echo $semestre['Semestre']['nom']; ?></small></h1>
</div>
<span class="row">
	<span class="span16">
	<?php if (!empty($modules)): 
			foreach ($modules as $m): 
				echo '<h3>'.$m['LibelleModule']['nom'].'</h3>'; 
				foreach ($m['Module'] as $mod):
					echo '<blockquote>';
					echo '<h5>'. $this->Html->link($mod['abreviation'], array('controller' => 'documents', 'action' => 'presenter', $mod['id'])).'</h5>';
					echo '<small>'.$mod['description'].'</small>';
					echo '</blockquote>';
				endforeach;
			endforeach;
		endif;
	?>
	</span>
</span>