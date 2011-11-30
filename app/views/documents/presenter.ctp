<?php debug($docs); ?>
<?php $this->title = 'Intranet | Modules | '.$docs[0]['Module']['abreviation']; ?>

<div class="page-header">
	<h2>Documents du module <small><?php echo $docs[0]['Module']['abreviation']; ?></small></h2>
</div>
<span class="row">
	<span class="span16">
			<?php if (!empty($docs)): 
			echo 	'<table id="sort" class="zebra-striped">
				<thead>
					<tr>
						<th class="blue headerSortDown">Nom</th>
						<th class="yellow" id="Auteur">Auteur</th>
						<th class="red" id="fichier">Fichier(lien)</th>
					</tr>
				</thead>
				<tbody>';
				foreach ($docs as $d): 
					echo '<tr>';
					echo '<td>'.$d['Document']['nom'].'</td>';
					echo '<td>'.$d['Personne']['nom'].' '.$d['Personne']['prenom'].'</td>';
					echo '<td>ICI LE LIEN DU FICHIER</td>';
				endforeach;
			echo 	'</tbody>
				</table>';
				else:
					echo 'Test';
				endif;
			?>

	</span>
</span>