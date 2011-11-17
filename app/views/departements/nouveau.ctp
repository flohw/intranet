<?php 

echo "<h1>Ajouter un nouveau département</h1>";

echo "<p>Départements existants :</p>";
echo "<ul>"; foreach ($departements as $dep) { echo "<li>$dep</li>"; } echo "</ul>";

debug($this->data);

echo $form->create('Departement');
echo $form->input('nom', array('label'=>'Nom du département : '));
echo $form->input('nb_max_eleves', array('label'=>'Nombre maximal d\'eleves : '));
echo $form->input('abreviation', array('label'=>'Abreviation : '));
echo $form->submit('Enregistrer', array('class'=>'btn primary'));
echo $form->end();

 ?>