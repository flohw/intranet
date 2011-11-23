<?php $this->title = "Intranet du département Informatique" ?>
<div class="page-header">
	<h1>Plans de l'IUT Interactif</h1>
</div>
<ul class="tabs">
	<li class="active"><a href="#mapSS">Sous-sol</a></li>
	<li><a href="#mapRDC">Rez-De-Chaussée</a></li>
	<li><a href="#map1">Premier étage</a></li>
	<li><a href="#map2">Deuxième étage</a></li>
	<li><a href="#map3">Troisième étage</a></li>
</ul>

<div class="pill-content">
	<div id="mapSS" class="map active">
		<?php echo $this->Html->image('map/void.png', array('width' => 950, 'height' => 626, 'usemap' => '#mapSS')); ?>
		<map name="mapSS">
			<area shape="poly" coords="625,496,581,455,520,522,566,561" href="#" />
			<area shape="poly" coords="539,419,581,455,520,522,480,485" href="#" />
			<area shape="poly" coords="465,353,538,418,480,485,407,416" href="#" />
			<area shape="poly" coords="423,313,465,351,406,415,364,380" href="#" />
			<area shape="poly" coords="380,276,423,313,364,379,323,342" href="#" />
			<area shape="poly" coords="258,166,345,243,285,309,200,229" href="#" />
			<area shape="poly" coords="207,135,261,156,259,166,200,229,157,193" href="#" />
			<area shape="poly" coords="144,110,207,135,183,162,132,140" href="#" />
			<area shape="poly" coords="155,78,179,22,225,26,219,102" href="#" />
			<area shape="poly" coords="329,52,393,57,387,127,324,122" href="#" />
			<area shape="poly" coords="392,58,487,64,485,133,387,127" href="#" />
			<area shape="poly" coords="490,44,485,133,743,152,747,82,589,71,590,51" href="#" />
			<area shape="poly" coords="393,230,451,234,445,296,392,250" href="#" />
			<area shape="poly" coords="497,268,580,273,572,375,526,372,492,341" href="#" />
			<area shape="poly" coords="582,208,579,273,447,264,452,200"  href="#" />
		</map>
	</div>
	<div id="mapRDC" class="map">
		<?php echo $this->Html->image('map/void.png', array('width' => 950, 'height' => 626, 'usemap' => '#mapRDC')); ?>
		<map name="mapRDC">
			<area shape="poly" coords="718,516,667,517,667,583,718,584" href="#" />
			<area shape="poly" coords="569,455,546,479,548,481,509,525,473,493,535,424" href="#" />
			<area shape="poly" coords="511,401,536,423,473,493,441,466,493,408,501,415" href="#" />
			<area shape="poly" coords="495,388,485,400,493,407,441,465,403,431,465,362" href="#" />
			<area shape="poly" coords="433,330,420,344,410,337,362,392,404,430,466,361" href="#" />
			<area shape="poly" coords="415,314,404,328,411,337,361,392,319,355,382,286" href="#" />
			<area shape="poly" coords="345,252,283,323,232,278,296,208" href="#" />
			<area shape="poly" coords="259,174,296,208,233,277,197,245" href="#" />
			<area shape="poly" coords="207,145,261,167,259,175,197,244,155,207" href="#" />
			<area shape="poly" coords="146,116,210,142,155,206,121,176" href="#" />
			<area shape="poly" coords="83,20,48,110,122,176,183,27" href="#" />
			<area shape="poly" coords="183,28,225,29,219,123,156,96" href="#" />
			<area shape="poly" coords="329,57,391,61,387,129,324,126" href="#" />
			<area shape="poly" coords="392,61,487,67,483,136,388,129" href="#" />
			<area shape="poly" coords="488,48,484,136,583,144,587,55" href="#" />
			<area shape="poly" coords="586,75,645,79,640,147,582,144,583,144" href="#" />
			<area shape="poly" coords="745,87,740,154,639,147,644,79" href="#" />
			<area shape="poly" coords="859,163,938,169,937,584,860,584" href="#" />
			<area shape="poly" coords="780,291,832,290,834,390,781,392" href="#" />
			<area shape="poly" coords="581,212,567,412,475,334,479,328,465,317,467,285,448,282,452,203" href="#" />
			<area shape="poly" coords="453,163,451,192,393,256,315,187,327,154" href="#" />
		</map>
	</div>
	<div id="map1" class="map">
		<?php echo $this->Html->image('map/void.png', array('width' => 950, 'height' => 626, 'usemap' => '#map1')); ?>
		<map name="map1">
			<area shape="poly" coords="625,496,581,455,520,522,566,561" href="#" />
		</map>
	</div>
	<div id="map2" class="map">
		<?php echo $this->Html->image('map/void.png', array('width' => 950, 'height' => 626, 'usemap' => '#map2')); ?>
		<map name="map2">
			<area shape="poly" coords="625,496,581,455,520,522,566,561" href="#" />
		</map>
	</div>
	<div id="map3" class="map">
		<?php echo $this->Html->image('map/void.png', array('width' => 950, 'height' => 626, 'usemap' => '#map3')); ?>
		<map name="map3">
			<area shape="poly" coords="625,496,581,455,520,522,566,561" href="#" />
		</map>
	</div>
</div>

<?php echo $this->Html->script('map.js', array('inline' => false)); ?>