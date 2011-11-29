<?php $this->title = 'Intranet | Modules '; ?>

	<div class="page-header">
		<h1>Listes des modules</h1>
	</div>
	<?php if (!empty($modules)):
			foreach ($modules as $m):
				echo '<blockquote>';
				echo '<h5>'.$m['Module']['abreviation'].'</h5>'; 
				echo '<small>'.$m['Module']['description'].'</small>';
				echo '</blockquote>';
			endforeach;
		endif;
	?>
	
		
		<!--<h4>AP1</h4>
		<small>Initiation à l'algorithmique</small>
		<h4>AP2</h4>
		<small>Algorithmique et structures de données statiques</small>
	</blockquote>
	<table class="zebra-striped" id="sort">
		<thead>
			<tr>
				<th class="yellow" header headerSortDown>Nom</th>
				<th class="blue">Prenom</th>
				<th class="red">E-mail</th>
			</tr>
		</thead>
		  <tbody>
		  	<tr>
		  		<td>1</td>
		  		<td>1</td>
		  		<td>1</td>
		  		<td>1</td>
		  	</tr>
		  </tbody>
	</table> -->