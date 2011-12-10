<?php $this->title = 'Intranet | Administration | ';
	$this->title .= ($action == 'editer') ? 'Editer un evenement' : 'Nouveau evenement'; ?>

<div class="page-header">
	<h1>
	<?php
	if ($action == 'editer')
		echo 'Editer un evenement';
	else
		echo 'Ajouter un nouvel evenement';
	?>
	</h1>
</div>

<span class="row">
	<span class="span3">
	    <?php
	     echo 'Evenements ajoutes :';
	     if(isset($evenements) && !empty($evenements))
	     {
		 echo '<ul>';
			 foreach ($evenements as $id => $e)
				 echo '<li>'.$this->Html->link($e, array('action' => 'editer', $id)).'</li>';
		 echo '</ul>';
		 }
		 else
		 echo '</br></br><strong>Vous n\'avez ajoute aucun evenement pour l\'instant</strong>';
		?>
	</span>
	<span class="span11 offset2">
	<?php
		echo $this->Form->create();

		echo $this->Form->hidden('Action.', array('value'=>$action));

		echo '<div class="clearfix">';
		echo $this->Form->input('Evenement.titre', array('label' => 'Titre de l\'evenement', 'class' => 'input', 'style'=>'margin:0px; height:23px;'));
		echo '</div>';

		echo '<div class="clearfix">';
		$options = array('type' => 'select', 'options' => $type,'label' => 'Categorie','class' => 'input','style' => 'margin:0px;');
		echo $this->Form->input('Evenement.type_evenement_id', $options);
		echo '</div>';

		echo '<div class="clearfix">';
		echo $this->Form->input('Evenements_personnes.personne', array('label' => 'Participant(s)', 'class' => 'input', 'style'=>'height:23px; margin:0px;'));
		echo '<span class="help-block"><strong>Entrez le login des differents destinaires, separes par une virgule</strong></span>';
		echo '</div>';

		echo '<div class="clearfix">';
		echo $this->Form->input('Evenement.date_debut', array('label' => 'Date de debut', 'class' => 'input'));
		echo '</div>';

		echo '<div class="clearfix">';
		echo $this->Form->input('Evenement.date_fin', array('label' => 'Date de fin', 'class' => 'input'));
		echo '</div>';

		echo '<div class="actions">';
		echo $this->Form->submit('Enregistrer', array('class'=>'btn primary', 'style'=>'float:left; margin-right: 20px;'));
		if ($action=="editer")
		echo $this->Form->submit('Supprimer', array('class'=>'btn primary', 'name'=>'data[Action]', 'style'=>'margin:0px;')) ;
		echo '</div>';

		echo $form->end();
	?>
	</span>
</span>
