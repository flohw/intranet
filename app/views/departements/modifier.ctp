<h1>Modifier un departement</h1>

<?php

echo "<ul>";
foreach ($departements as $id => $dep)
	echo '<li>'. $this->Html->link($dep,array('action'=>'modifier', 'id' => $id))."</li>";
echo "</ul>";


 ?>