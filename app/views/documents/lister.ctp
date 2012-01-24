<?php $this->title = 'Intranet | Documents'; ?>

<div class="page-header">
	<h2>Mes documents</h2>
</div>
<div class="row">
	<div class="span8">
		<span class="label important">Modules</span></br>
		<ul>
		<?php
			$module = "";

			foreach ($documents as $d)
			{
				if ($module!=$d['Module']['abreviation'])
				{
					echo '</ul>';
					$module = $d['Module']['abreviation'];
					echo '<strong>'.$module.'</strong><ul>';
				}

				echo '<li>'.$this->Html->link($d['Document']['nom'], array('action' => 'presenter', $d['Document']['module_id'])).'</li>';
			}
		?>
		</ul>
	</div>
	<div class="span8">
		<span class="label notice">Stages</span></br>
		<ul>
		<?php
			$categorie = ""; $action = "";

			foreach ($documentsStage as $d)
			{
				if ($categorie!=$d['DocumentsStage']['categorie'])
				{
					echo '</ul>';
					$categorie = $d['DocumentsStage']['categorie'];

					if ($categorie=="posters") $action = "ppp";
					else if ($categorie=="PPP") $action = "ppp";
					else if ($categorie=="PT1A") $action = "pt1";
					else if ($categorie=="PT2A") $action = "pt2";
					else if ($categorie=="PT2A-rapports") $action = "pt2";
					else if ($categorie=="stages-offres") $action = "";
					else if ($categorie=="stages-utiles") $action = "";

					if ($categorie=="stages-offres") echo '<strong>Infos stages</strong><ul>';
					else if ($categorie=="stages-utiles") echo '<strong>Documents des stages</strong><ul>';
					else echo '<strong>'.ucwords($categorie).'</strong><ul>';
				}

				echo '<li>'.$this->Html->link($d['DocumentsStage']['nom'], array('controller' => 'stages', 'action' => $action)).'</li>';
			}
		?>
		</ul>
	</div>
</div>