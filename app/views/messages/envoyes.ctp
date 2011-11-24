<?php $this->title = 'Intranet | Messagerie | Messages envoyés'; ?>
<div class="page-header">
	<h1>Boîte d'envoi</h1>
</div>
<span class="row">
	<span class="span16">
		<table id="sort" class="zebra-striped">
			<thead>
				<tr>
					<th class="blue">Titre</th>
					<th>Date d'envoi</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($messages as $m): $m = current($m);
					echo '<tr>';
					echo '<td>'.$this->Html->link($m['titre'], array('action' => 'message', $m['id'])).'</td>';
					echo '<td>'.$m['date_envoi'].'</td>';
					echo '</tr>';
				endforeach;
			?>
			</tbody>
		</table>
	</span>
</span>