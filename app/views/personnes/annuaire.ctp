<?php 

	/*VOIR POUR LE SUBMIT DE LA RECHERCHE :: IL EST A GAUCHE !!*/

/*-------------------------------------------*/
/*afficher l'annuaire des personnes (tableau)*/
/*-------------------------------------------*/
$this->title = "Annuaire";

//on verifie qu'on passe bien un statut
if ($statut=="")
{
	echo "<h3>Consulter un annuaire</h3>\n";
	echo "</br><ul>";

	$statuts = $this->requestAction(array('controller' => 'personnes'), array('action' => 'index'), array('return'));
	foreach($statuts as $stat)
	{
		$stat = $stat['Statut'];
		echo '<li>'.$this->Html->link(ucwords($stat['nom']), array('action'=>'annuaire', $stat['id']), array('escape'=>false)).'</li>';
	}
	echo "</ul></br></br></br>";
}

else
{
	//la recherche
	echo $form->create('Personne', array('url' => array('controller'=>'personnes'), array('action'=>'index')));
	echo '<div class="actions">';
	echo $form -> input('rech', array('label' => 'Recherche'));
	echo $this->Form->hidden('statut', array('value'=>"$statut"));
	echo $form -> submit('Ok', array('class'=>'btn primary')) ;
	echo '</div></fieldset>';
	echo $form->end();

	//si aucun resultat affiche un message
	if (count($personne)==0)
	echo "<div style='text-align:center; background-color:red;'><strong>0 resultat a ete trouvé</strong></br></div></br></br></br></br>";

	//sinon affiche le tableau
	else
	{
		echo '<table class="zebra-striped" id="sortTableExample">
		  <thead>
		      <tr>
		      	  <th>#</th>
		          <th class="yellow" header headerSortDown>Nom</th>
		          <th class="blue">Prenom</th>
		          <th class="red">E-mail</th>
		      </tr>
		  </thead>
		  <tbody>';

		//il faudrait connaitre le bureau d'un prof
		for ($i=0; $i<count($personne); $i++)
		{
			$p = $personne[$i];
			echo('<tr>
			    <td>'.$i.'</td>
		        <td>'.strtoupper($p['Personne']['nom']).'</td>
		        <td>'.ucwords($p['Personne']['prenom']).'</td>
		        <td>'.$p['Personne']['email'].'</td>
		     </tr>');
		}

		echo '</tbody>
		</table>';
	}
}
?>