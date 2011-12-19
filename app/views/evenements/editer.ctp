<?php $this->title = 'Intranet | Administration | ';
	$this->title .= ($action == 'editer') ? 'Editer un evenement' : 'Nouveau evenement'; ?>

<div class="page-header"><h1> <?php
	if ($action == 'editer') echo 'Editer un evenement';
	else echo 'Ajouter un nouvel evenement'; ?>
</h1></div>

<span class="row">
	<span class="span3" style="margin-top:-2.5%;"> <?php
		 if($action=="editer")
		 echo $this->Html->link('Ajouter un evenement', array('action'=>'editer'));
	     echo '</br></br>Evenements ajoutes :';
	     if(isset($evenements) && !empty($evenements))
	     {
			 echo '<ul>';
			 foreach ($evenements as $id => $e) 
			 echo '<li>'.$this->Html->link($e, array('action' => 'editer', $id)).'</li>'; 
			 echo '</ul>';
		 }
		 else echo '</br></br><strong>Vous n\'avez ajoute aucun evenement pour l\'instant</strong>'; ?>
	</span>

	<span class="span11 offset2"> <?php

	/* le form */
		echo $this->Form->create();
		echo $this->Form->hidden('Action.', array('value'=>$action));

		echo '<div class="clearfix">'.$this->Form->input('Evenement.titre', array(
			'label' => 'Titre de l\'evenement', 
			'class' => 'input', 
			'style'=>'margin:0px; height:23px;width:210px;')).'</div>';

		$options = array(
			'type' => 'select', 
			'options' => $type,
			'label' => 'Categorie',
			'class' => 'input',
			'style' => 'margin:0px;width:210px;');
		echo '<div class="clearfix">'.$this->Form->input('Evenement.type_evenement_id', $options).'</div>';

		/*selection des participants*/
		echo '<div class="clearfix">';
			echo $this->Form->input('Evenements_personnes.personne', array(
				'label' => 'Participant(s)', 
				'class' => 'input', 
				'style'=>'height:23px; width:210px;margin:0px; margin-right:10px; float:left;'));

			echo '<span class="help-inline" style="font-size:8pt;" id="gp"><strong>par groupe >></strong></span>';
			echo '<span class="help-block" style="clear:left;">Entrez les login separes par une virgule</span>';

			/*selection des groupes*/
			echo '<div class="evenement_gp" style="display:none;">'; //style="display:none;"

				 echo $this->Form->input('Evenements_personnes.semestre', array(
					'label' => 'Semestre(s)', 
					'class' => 'input', 
					'style'=>'height:20px;margin:0px;width:100px;float:left;margin-right:10px;')); 

				 echo '<span class="help-inline" style="font-size:8pt;"><strong>ex : 1, 1d</strong></span>';

				 echo $this->Form->input('Evenements_personnes.groupe', array(
					'label' => 'Groupe(s)', 
					'class' => 'input', 
					'style'=>'height:20px;margin:0px;width:100px;float:left;margin-right:10px;')); 

				 echo '<span class="help-inline" style="font-size:8pt;"><strong>ex : A1, B2</strong></span>';
			echo '</div>'; 
		echo '</div>';

		echo '<div class="clearfix">'.$this->Form->input('Evenement.date_debut', array(
			'label' => 'Date de debut', 
			'class' => 'input',
			'style' => '')).'</div>';

		echo '<div class="clearfix">'.$this->Form->input('Evenement.date_fin', array(
			'label' => 'Date de fin', 
			'class' => 'input')).'</div>';

		/*les boutons (si on edite, on ajoute le bouton supprimer)*/
		echo '<div class="actions">';

			 echo $this->Form->submit('Enregistrer', array(
				'class'=>'btn primary', 
				'style'=>'float:left; margin-right: 20px;'));

			 if ($action=="editer")
			 echo $this->Form->submit('Supprimer', array(
				'class'=>'btn primary', 
				'name'=>'data[Action]', 
				'style'=>'margin:0px;')) ;

		echo '</div>';

		echo $form->end();
	
	/* fin du form */
	?> </span>
</span>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script> jQuery(function($) {
	
	$('#gp').click(function(){$(this).next().next().toggle(0)}) ;

}) ; </script>