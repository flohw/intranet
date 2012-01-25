<?php $this->title = 'Intranet | Emploi du temps' ?>

<div class="page-header">
	<h2>Emploi du temps</h2>
</div>
<div class="actions">

	<?php 
	$w = date("W") + 17;

	echo $this->Html->link('Cliquez ici pour afficher l\'emploi du temps', "http://www-ade.iut2.upmf-grenoble.fr/ade/custom/modules/plannings/direct_planning.jsp?weeks=$w&showTree=true&showPianoDays=true&login=WebINFO&password=MPINFO&projectId=10&showOptions=false&showPianoWeeks=true&days=0,1,2,3,4,5&hash=ca5e2ed9f37438d14a962e53a5cf4ad4"); ?>

</div>
