<?php $this->title = "Intranet du département Informatique" ?>
<div class="page-header">
	<h2>Bienvenue <?php echo $this->Session->read('Auth.Personne.prenom').' '.$this->Session->read('Auth.Personne.nom'); ?></h2>
</div>
<div class="row">
	<div class="span16">
		<p>
			Vous avez <strong><?php echo $this->Html->link(count($notifs['messages']),
												array('controller' => 'messages', 'action' => 'index')); ?></strong> nouveaux messages, et <strong>
			<?php
				$nb = count($notifs['evenements']['evenementsDay']);
				if($nb > 0)
					echo $this->Html->link($nb, array('controller' => 'evenements', 'action' => 'index'));
				else
					echo 'aucun';
			?></strong> evenement<?php echo (($nb > 1) ? 's' : null); ?> aujourd'hui.
			</p><br />
			
		<?php echo $this->Html->image("header.png", array("alt" => "Bonjour")); ?>
		<h2 style="text-align: center;">Département informatique de Grenoble</h2>

	</div>
</div>