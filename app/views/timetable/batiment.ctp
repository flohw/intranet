<?php $this->title = "Intranet du département Informatique" ?>
<div class="page-header">
	<h1>Plans de l'IUT Interactif</h1>
</div>
      <div class="map">
      	<?php echo $this->Html->image("void.png", array('width' => 950, 'height' => 626, 'usemap' => '#Map')); ?>
      	<map name="Map">
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

      <?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    	jQuery(function($){
    	$('.map').append('<div class="overlay">').append('<div class="tooltip"></div>');
        $('.map .tooltip').hide();
        //num dans le meme ordre que le mappage
      var salles = [
        {name : 'Salle 39', slug: 'S39'},
        {name : 'Salle 37', slug: 'S37'},
        {name : 'Salle 35', slug: 'S35'},
        {name : 'Salle 33', slug: 'S33'},
        {name : 'Salle 31', slug: 'S31'},
        {name : 'Salle 29', slug: 'S29'},
        {name : 'Salle 27', slug: 'S27'},
        {name : 'Salle 28', slug: 'S28'},
        {name : 'Salle 23', slug: 'S23'},
        {name : 'Salle 18 Inter 8', slug: 'S18'},
        {name : 'Salle 17', slug: 'S17'},
        {name : 'Cafet', slug: 'cafet'},
        {name : 'Salle 30', slug: 'S30'},
        {name : 'Salle 36', slug: 'S36'},
        {name : 'Salle 34', slug: 'S34'}
      ];
        // Tooltip qui suit la souris
        $(document).mousemove(function(e){
            $('.map .tooltip').css({
              top:e.pageY-$('.map .tooltip').height()-20,
              left:e.pageX-$('.map .tooltip').width()/2-10,
          });
        });

        //$('.map area').each(function(){
        //var index = $(this).index();
        //$(this).attr('href','http://google.fr/?q='+salles[index].slug);
        //});
        //On passe sur une région
          $('.map area').mouseover(function(){
            var index = $(this).index();
            var left = -index*950 -950;
          $('.map .tooltip').html(salles[index].name).stop().fadeTo(500,1); //1 ==> tranparence
            $('.map .overlay').css({
              backgroundPosition : left+"px 0px"
            });
          });
          //On sort de la map
          $('.map').mouseout(function(){
            $('.map .overlay').css({
              backgroundPosition : "950px 0px"
            });
            $('.map .tooltip').stop().fadeTo(500,0);
          });
	});
<?php echo $this->Html->scriptEnd(); ?>