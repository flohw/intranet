<?php $this->title = 'Intranet | Modules'; ?>
<div class="page-header">
	<?php
		$sousTitre = null;
		$granted = $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'];
		if ($granted)
			$sousTitre = ' - '.$this->Html->link('Ajouter', array('action' => 'editmod'));
	?>
	<h1>Listes des modules <small><?php echo $semestre['Semestre']['nom'].$sousTitre; ?></small></h1>
</div>
<span class="row">
	<span class="span16">
	<?php if (!empty($modules)): 
			foreach ($modules as $m):
				$nom= $m['LibelleModule']['nom'];
				$id = $m['LibelleModule']['id'];
				echo '<h3 style="inline">'.$nom;
					if ($granted)
						echo '<small> - '.$this->Html->link('Editer', array('action' => 'editmod', $id)).'</small>';
				echo '</h3>';
				foreach ($m['Module'] as $mod):
					echo '<blockquote>';
					echo '<h5>'. $this->Html->link($mod['abreviation'], array('controller' => 'documents', 'action' => 'presenter', $mod['id']));
						if (in_array($mod['abreviation'], $myMod))
							echo '<small>'.$this->Html->link('Editer', array('action' => 'editer', $mod['id'])).'</small>';
					echo '</h5>';
					echo '<small>'.$mod['description'].'</small>';
					echo '</blockquote>';
				endforeach;
			endforeach;
		endif;
	?>
	</span>
</span>