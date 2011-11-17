<?php

	$semestres = $this->requestAction('/semestres/getSemestres');
	foreach ($semestres as $semestre):
		$semestre = current($semestre);
		echo '<li>';
		echo $this->Html->link($semestre['nom'], array('controller' => 'modules', 'action' => 'index', $semestre['id']));
		echo '</li>';
	endforeach;