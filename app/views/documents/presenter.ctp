<?php $this->title = 'Intranet | '.$abre['Module']['abreviation'].' | Les documents'; ?>
<div class="page-header">
	<h2>Documents du module <small><?php echo $abre['Module']['abreviation']; echo ' - '.$abre['Module']['description']?></small></h2>
</div>

<div class="row">
	<div class="span16">
		<?php echo  '<h5 style="display:inline">Volume horaire de ce module : </h5>'.$abre['Module']['volume_horaire'].'h.<br />';?>
		<?php echo  '<h5 style="display:inline">Coefficient : </h5>'.$abre['Module']['coefficient'].'.';?>
	</div>
</div>
<div class="row">
	<div class="span16">
			<?php if (!empty($docs)): 
			echo '<table id="sort" class="zebra-striped">
				<thead>
					<tr>
						<th class="blue headerSortDown">Nom</th>
						<th class="yellow" id="Auteur">Auteur</th>
						<th class="red" id="fichier">Fichier(lien)</th>
					</tr>
				</thead>
				<tbody>';
			endif;
			?>
			<?php 	foreach ($docs as $d): 
					echo '<tr>';
					echo '<td>'.$d['Document']['nom'].'</td>';
					echo '<td>'.$d['Personne']['nom'].' '.$d['Personne']['prenom'].'</td>';
					echo '<td>ICI LE LIEN DU FICHIER</td>';
				endforeach;
			?>
				</tbody>
				</table>

	</div>
</div>