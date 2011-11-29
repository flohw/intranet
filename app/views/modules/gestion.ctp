<?php $this->title = 'Intranet | Gestion des Modules '; ?>

	<div class="page-header">
		<h1>Gestion des modules</h1>
	</div>
	<p>Voci la liste des modules déjà enregistrés.
	<br>
	<br>
	Cliquez sur un module pour le modifier.</p>
	<table>
	<tr> <th>Abréviation</th>  <th>Semestre</th>  <th>Coefficient</th>  <th>Volume horaire</th> <th>Description</th> </tr>
	<?php  foreach ($modules as $mod){		   
		echo "<tr> <td>"
		.$this->Html->link($mod['Module']['abreviation'], array('action' => 'editer', $mod['Module']['id']))
		."</td> 

		<td>".$mod['Module']['semestre_id']."</td>
		<td>".$mod['Module']['coefficient']."</td>
		<td>".$mod['Module']['volume_horaire']."</td>
		<td>".$mod['Module']['description']."</td>
		</tr>"
		;}?>

	</table>

