<?php 

	/*VOIR POUR LE SUBMIT DE LA RECHERCHE :: IL EST A GAUCHE !!*/

/*-------------------------------------------*/
/*afficher l'annuaire des personnes (tableau)*/
/*-------------------------------------------*/
$this->title = "Annuaire";

//la recherche
echo $form->create('Personne', array('url' => array('controller'=>'personnes'), array('action'=>'index')));
	echo "\n<div class='actions'>\n";
	$options = array('type' => 'select', 'empty'=> array('' => 'Tous'), 'options' => $statuts,'label' => 'Statut','div' => '','style' => 'margin-left:5px;');
	echo $form->input('Personne.statut', $options);
	echo $form->input('rech', array('label' => 'Recherche', 'style'=>'height:18px; width:200px; margin-left:5px;'));
	echo $form->submit('Ok', array('class'=>'btn primary')) ;
echo "\n</div></fieldset>\n";
echo $form->end();

//si aucun resultat affiche un message (controller)

//sinon affiche le tableau
if($session->check('Message')){ echo $this->Session->flash(); }

if (count($personne)!=0)
{
	echo '<table class="zebra-striped" id="sort">
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
?>