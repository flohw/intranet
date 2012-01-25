<?php $this->title = 'Intranet | Emploi du temps' ?>

<div class="page-header">
	<h2>Emploi du temps</h2>
</div>
<div class="actions">

	<?php 
	$w = date("W") + 17;
	if($ressource=="") $b="true"; else $b="false"; 

	echo $this->Html->link('Cliquez ici pour afficher l\'emploi du temps', "http://www-ade.iut2.upmf-grenoble.fr/ade/custom/modules/plannings/direct_planning.jsp?resources=$ressource&weeks=$w&showTree=$b&showPianoDays=true&login=WebINFO&password=MPINFO&projectId=10&displayConfName=Vue_Web_INFO_Etudiant&showOptions=false&showPianoWeeks=true&days=0,1,2,3,4,5"); ?>

</div>