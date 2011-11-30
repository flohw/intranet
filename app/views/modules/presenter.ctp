<?php $this->title = 'Intranet | Modules | '.$docs['Document']['abreviation']; ?>

<?php debug($docs); ?>
<div class="page-header">
	<h2>Documents du module <small><?php echo $docs['Document']['abreviation']; ?></small></h2>
</div>
<span class="row">
	<span class="span16">
		<table id="sort" class="zebra-striped">
			<thead>
				<tr>
					<th class="blue">Nom</th>
					<th class="yellow" id="Auteur">Auteur</th>
					<th class="red" id="fichier">Fichier(lien)</th>
				</tr>
			</thead>
			<tbody>
			<?php if (!empty($docs)): 
					foreach ($docs as $m): 
						echo '<tr>';
						echo '<td>'.$m['nom'].'</td>';
						echo '<td>'.$m.'</td>';

					endforeach;
				endif;
			?>
			</tbody>
		</table>
	</span>
</span>
<?php 
	echo $modules['Document']


		//		echo '<h3>'.$m['LibelleModule']['nom'].'</h3>'; 
		//		foreach ($m['Module'] as $mod):
		//			echo '<blockquote>';
		//			echo '<h5>'. $this->Html->link($mod['abreviation'], array('action' => 'presenter', $mod['id'])).'</h5>';
		//			echo '<small>'.$mod['description'].'</small>';
		//			echo '</blockquote>';
		//		endforeach;
 ?>