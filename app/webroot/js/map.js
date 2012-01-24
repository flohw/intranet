jQuery(function($){
	$('.tabs').tabs();
	$('.map').append('<div class="overlay">').append('<div class="tooltip"></div>');
	$('.map .tooltip').hide();

	//num dans le meme ordre que le mappage
	var salles = [
		[	{name : 'Salle S39', slug: 'SS39'},
			{name : 'Salle S37', slug: 'SS37'},
			{name : 'Salle S35', slug: 'SS35'},
			{name : 'Salle S33', slug: 'SS33'},
			{name : 'Salle S31', slug: 'SS31'},
			{name : 'Salle S29', slug: 'SS29'},
			{name : 'Salle S27', slug: 'SS27'},
			{name : 'Salle S28', slug: 'SS28'},
			{name : 'Salle S23', slug: 'SS23'},
			{name : 'Salle S18 Inter 8', slug: 'SS18'},
			{name : 'Salle S17', slug: 'SS17'},
			{name : 'Cafet\'', slug: 'SCafet\''},
			{name : 'Salle S30', slug: 'SS30'},
			{name : 'Salle S36', slug: 'SS36'},
			{name : 'Salle S34', slug: 'SS34'}],
		[	{name : 'Accueil', slug: '0Accueil'},
			{name : 'Salle 041', slug: '0041'},
			{name : 'Salle 039', slug: '0039'},
			{name : 'Salle 037', slug: '0037'},
			{name : 'Salle 035', slug: '0035'},
			{name : 'Salle 033', slug: '0033'},
			{name : 'Salle 029', slug: '0029'},
			{name : 'Salle 027', slug: '0027'},
			{name : 'Salle 025', slug: '0025'},
			{name : 'Salle 023', slug: '0023'},
			{name : 'Salle 022-21', slug: '0022-21'},
			{name : 'Salle 020', slug: '0020'},
			{name : 'Salle 018', slug: '0018'},
			{name : 'Salle 017', slug: '0017'},
			{name : 'Salle 015', slug: '0015'},
			{name : 'Salle 013', slug: '0013'},
			{name : 'Salle 011', slug: '0011'},
			{name : 'Pole Mediactice', slug: '0Pole Mediactice'},
			{name : 'Salle Polyvalente', slug: '0Salle Polyvalente'},
			{name : 'Pole Informatique', slug: '0Pole Informatique'},
			{name : 'Salle 032-30', slug: '0032-30'}],
		[	{name : 'Salle 102', slug: '1102'},
			{name : 'Salle 101', slug: '1101'},
			{name : 'Salle 151', slug: '1151'},
			{name : 'Salle 149', slug: '1149'},
			{name : 'Salle 145', slug: '1145'},
			{name : 'Salle 143', slug: '1143'},
			{name : 'Salle 139', slug: '1139'},
			{name : 'Salle 133', slug: '1133'},
			{name : 'Salle 131', slug: '1131'},
			{name : 'Amphi 1', slug: '1Amphi 1'},
			{name : 'Salle 117', slug: '1117'},
			{name : 'Salle 116', slug: '1116'},
			{name : 'Salle 115', slug: '1115'},
			{name : 'Salle 114', slug: '1114'},
			{name : 'Salle 113', slug: '1113'},
			{name : 'Salle 112', slug: '1112'},
			{name : 'Salle 111', slug: '1111'},
			{name : 'Salle 110', slug: '1110'},
			{name : 'Salle 109', slug: '1109'},
			{name : 'Salle 108', slug: '1108'},
			{name : 'Salle 107', slug: '1107'},
			{name : 'Salle 106', slug: '1106'},
			{name : 'Salle 105', slug: '1105'},
			{name : 'Salle 104', slug: '1104'},
			{name : 'Amphi 2', slug: '1Amphi 2'},
			{name : 'Salle 140B', slug: '1140B'},
			{name : 'Salle 140A', slug: '1140A'},
			{name : 'Salle 140H', slug: '1140H'},
			{name : 'Salle 134', slug: '1134'}],
		[	{name : 'Salle 202', slug: '2202'},
			{name : 'Salle 201', slug: '2201'},
			{name : 'Salle 243', slug: '2243'},
			{name : 'Salle 241', slug: '2241'},
			{name : 'Salle 241', slug: '2241'},
			{name : 'Salle 239', slug: '2239'},
			{name : 'Salle 237', slug: '2237'},
			{name : 'Salle 235', slug: '2235'},
			{name : 'Salle 233', slug: '2233'},
			{name : 'Salle 231', slug: '2231'},
			{name : 'Salle 217', slug: '2217'},
			{name : 'Salle 215', slug: '2215'},
			{name : 'Salle 213', slug: '2213'},
			{name : 'Salle 211', slug: '2211'},
			{name : 'Salle 210', slug: '2210'},
			{name : 'Salle 209', slug: '2209'},
			{name : 'Salle 208', slug: '2208'},
			{name : 'Salle 207', slug: '2207'},
			{name : 'Salle 206', slug: '2206'},
			{name : 'Salle 205', slug: '2205'},
			{name : 'Salle 204', slug: '2204'},
			{name : 'Amphi 3', slug: '2Amphi 3'},
			{name : 'Salle 232', slug: '2232'},
			{name : 'Salle 230', slug: '2230'},
			{name : 'Salle 228', slug: '2228'}],
		[	{name : 'Salle 303', slug: '3303'},
			{name : 'Salle 302', slug: '3302'},
			{name : 'Salle 351', slug: '3351'},
			{name : 'Salle 349', slug: '3349'},
			{name : 'Salle 347', slug: '3347'},
			{name : 'Salle 345', slug: '3345'},
			{name : 'Salle 343', slug: '3343'},
			{name : 'Salle 341', slug: '3341'},
			{name : 'Salle 339', slug: '3339'},
			{name : 'Salle 335', slug: '3335'},
			{name : 'Salle 331', slug: '3331'},
			{name : 'Salle 327', slug: '3327'},
			{name : 'Salle 325', slug: '3325'},
			{name : 'Salle 324', slug: '3324'},
			{name : 'Salle 317', slug: '3317'},
			{name : 'Salle 315', slug: '3315'},
			{name : 'Salle 313', slug: '3313'},
			{name : 'Salle 311', slug: '3311'},
			{name : 'Salle 310', slug: '3310'},
			{name : 'Salle 309', slug: '3309'},
			{name : 'Salle 308', slug: '3308'},
			{name : 'Salle 307', slug: '3307'},
			{name : 'Salle 306', slug: '3306'},
			{name : 'Salle 305', slug: '3305'},
			{name : 'Salle 304', slug: '3304'}],
	];
	
	// Tooltip qui suit la souris
	$(document).mousemove(function(e){
		$('.map .tooltip').css({
			top:e.pageY-$('.map .tooltip').height()-(20+$(document).scrollTop()),
			left:e.pageX-$('.map .tooltip').width()/2-10,
		});
	});
		
	// Liens des maps
	$('.map area').each(function(){
		var etage = $(this).parent().parent().index();
		var salle = $(this).index();
		$(this).attr('href', $(this).attr('href')+'/'+salles[etage][salle].slug);
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