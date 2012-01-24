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
					$module = $d['Module']['abreviation'];
					echo '</br><li><strong>'.$module.'</strong></li>';
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
					$categorie = $d['DocumentsStage']['categorie'];

					if ($d['DocumentsStage']['categorie']=="posters") $action = "ppp";
					else if ($d['DocumentsStage']['categorie']=="PPP") $action = "ppp";
					else if ($d['DocumentsStage']['categorie']=="PT1A") $action = "pt1";
					else if ($d['DocumentsStage']['categorie']=="PT2A") $action = "pt2";
					else if ($d['DocumentsStage']['categorie']=="PT2A-rapports") $action = "pt2";
					else if ($d['DocumentsStage']['categorie']=="stages-offres") $action = "";
					else if ($d['DocumentsStage']['categorie']=="stages-utiles") $action = "";

					echo '</br><li><strong>'.$categorie.'</strong></li>';
				}

				echo '<li>'.$this->Html->link($d['DocumentsStage']['nom'], array('controller' => 'stages', 'action' => $action)).'</li>';
			}
		?>
		</ul>
	</div>
</div>