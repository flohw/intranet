<?php 

$this->title = 'Intranet | Modules ';

echo '<div class="page-header">
	<h1>Gestion des modules</h1>
	</div>';
 	
echo "<p>Voci la liste des modules déjà enregistrés. <br><br>Cliquez sur un module pour le modifier.</p>";

//le début du tableau
echo "<table>";
echo"<tr> <th>Abréviation</th>  <th>Semestre</th>  <th>Coefficient</th>  <th>Volume horaire</th> <th>Description</th> </tr>";	//les titres

foreach ($modules as $mod)		   //la bouche pour remplir le tableau
echo "<tr> <td>"
	.$this->Html->link($mod['Module']['abreviation'], array('action' => 'editer', $mod['Module']['id']))
	."</td> 
	<td>".$mod['Module']['semestre_id']."</td>
	<td>".$mod['Module']['coefficient']."</td>
	<td>".$mod['Module']['volume_horaire']."</td>
	<td>".$mod['Module']['description']."</td>
	</tr>"
	;

echo "</table>";
 ?>
