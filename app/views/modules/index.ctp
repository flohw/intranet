<?php $this->title = 'Intranet | Modules'; ?>
<div class="page-header">
	<?php
		$sousTitre = null;
		$granted = $this->Session->read('Auth.Personne.statut_id') >= $statutsID['admin'];
		if ($granted)
			$sousTitre = ' - '.$this->Html->link('Ajouter', array('action' => 'editmod'), array('class' => 'btn small success'));
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
						echo '<small> - '.$this->Html->link('Editer', array('action' => 'editmod', $id), array('class' => 'btn small info')).'</small>';
				echo '</h3>';
				foreach ($m['Module'] as $mod):
					echo '<blockquote>';
					echo '<h5>'.$this->Html->link($mod['abreviation'], array('controller' => 'documents', 'action' => 'presenter', $mod['id'])).'</h5>';
					echo '<p><strong>Reponsable(s)</strong> : ';
					if (!empty($mod['Personne']))
					{
						$i = 0; $sum = count($mod['Personne']);
						foreach ($mod['Personne'] as $id => $p)
						{
							echo $this->Html->link($p, array('action' => 'affectations', $id));
							if (++$i < $sum)
								echo ', ';
						}
					}
					else
						echo 'Aucun responsable';
					echo '</p>';
					echo '<p><strong>Description</strong> : '.$mod['description'].'</p>';
					if (in_array($mod['abreviation'], $myMod) OR $granted)
							echo '<small>'.$this->Html->link('Editer', array('action' => 'editer', $mod['id']), array('class' => 'btn small info')).'</small>';
					echo '</blockquote>';
				endforeach;
			endforeach;
		endif;
	?>
	</span>
</span>