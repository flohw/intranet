jQuery(function($){
	$('.tabs').tabs();
	$('.map').append('<div class="overlay">').append('<div class="tooltip"></div>');
	$('.map .tooltip').hide();

	//num dans le meme ordre que le mappage
	var salles = [
		[	{name : 'Salle S39', slug: 'S39'},
			{name : 'Salle S37', slug: 'S37'},
			{name : 'Salle S35', slug: 'S35'},
			{name : 'Salle S33', slug: 'S33'},
			{name : 'Salle S31', slug: 'S31'},
			{name : 'Salle S29', slug: 'S29'},
			{name : 'Salle S27', slug: 'S27'},
			{name : 'Salle S28', slug: 'S28'},
			{name : 'Salle S23', slug: 'S23'},
			{name : 'Salle S18 Inter 8', slug: 'S18'},
			{name : 'Salle S17', slug: 'S17'},
			{name : 'Cafet', slug: 'cafet'},
			{name : 'Salle S30', slug: 'S30'},
			{name : 'Salle S36', slug: 'S36'},
			{name : 'Salle S34', slug: 'S34'}],
		[	{name : 'Salle 015', slug: '015'},
			{name : 'Salle 0xx', slug: '0xx'},],
		[	{name : 'Salle 1xx', slug: '1xx'},
			{name : 'Salle 1xx', slug: '1xx'},],
		[	{name : 'Salle 2xx', slug: '2xx'},
			{name : 'Salle 2xx', slug: '2xx'},],
		[	{name : 'Salle 3xx', slug: '3xx'},
			{name : 'Salle 3xx', slug: '3xx'},],
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