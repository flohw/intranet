jQuery(function($){
	$('.tabs').tabs();
	$('.map').append('<div class="overlay">').append('<div class="tooltip"></div>');
	$('.map .tooltip').hide();

	//num dans le meme ordre que le mappage
	var salles = [
		[	{name : 'Salle 39', slug: 'S39'},
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
			{name : 'Salle 34', slug: 'S34'}],
		[	{name : 'Salle 15', slug: '015'}],
	];
	
	// Tooltip qui suit la souris
	$(document).mousemove(function(e){
		$('.map .tooltip').css({
			top:e.pageY-$('.map .tooltip').height()-20,
			left:e.pageX-$('.map .tooltip').width()/2-10,
		});
	});
		
	// Liens des maps
	$('.map area').each(function(){
		var etage = $(this).parent().parent().index();
		var salle = $(this).index();
		$(this).attr('href','http://google.fr/?q='+salles[etage][salle].slug);
	});

	//On passe sur une région
	$('.map area').mouseover(function(){
		var etage = $(this).parent().parent().index();
		var salle = $(this).index();
		var left = -salle * 950 - 950;
		$('.map .tooltip').html(salles[etage][salle].name).stop().fadeTo(500, 1);
		$('.map .overlay').css({
			backgroundPosition : left + "px 0px"
		});
	});
	//On sort de la map
	$('.map').mouseout(function(){
		$('.map .overlay').css({
			backgroundPosition : "950px 0px"
		});
		$('.map .tooltip').stop().fadeTo(500, 0);
	});
});