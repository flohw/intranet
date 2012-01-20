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
			{name : 'Cafet\'', slug: 'SCafet\''},
			{name : 'Salle S30', slug: 'S30'},
			{name : 'Salle S36', slug: 'S36'},
			{name : 'Salle S34', slug: 'S34'}],
		[	{name : 'Acceuil', slug: '0Acceuil'},
			{name : 'Salle 041', slug: '041'},
			{name : 'Salle 039', slug: '039'},
			{name : 'Salle 037', slug: '037'},
			{name : 'Salle 035', slug: '035'},
			{name : 'Salle 033', slug: '033'},
			{name : 'Salle 029', slug: '029'},
			{name : 'Salle 027', slug: '027'},
			{name : 'Salle 025', slug: '025'},
			{name : 'Salle 023', slug: '023'},
			{name : 'Salle 022-21', slug: '022-21'},
			{name : 'Salle 020', slug: '020'},
			{name : 'Salle 018', slug: '018'},
			{name : 'Salle 017', slug: '017'},
			{name : 'Salle 015', slug: '015'},
			{name : 'Salle 013', slug: '013'},
			{name : 'Salle 011', slug: '011'},
			{name : 'Pole Mediactice', slug: '0Pole Mediactice'},
			{name : 'Salle Polyvalente', slug: '0Salle Polyvalente'},
			{name : 'Pole Informatique', slug: '0Pole Informatique'},
			{name : 'Salle 032-30', slug: '032-30'}],
		[	{name : 'Salle 102', slug: '102'},
			{name : 'Salle 101', slug: '101'},
			{name : 'Salle 151', slug: '151'},
			{name : 'Salle 149', slug: '149'},
			{name : 'Salle 145', slug: '145'},
			{name : 'Salle 143', slug: '143'},
			{name : 'Salle 139', slug: '139'},
			{name : 'Salle 133', slug: '133'},
			{name : 'Salle 131', slug: '131'},
			{name : 'Amphi 1', slug: '1Amphi 1'},
			{name : 'Salle 117', slug: '117'},
			{name : 'Salle 116', slug: '116'},
			{name : 'Salle 115', slug: '115'},
			{name : 'Salle 114', slug: '114'},
			{name : 'Salle 113', slug: '113'},
			{name : 'Salle 112', slug: '112'},
			{name : 'Salle 111', slug: '111'},
			{name : 'Salle 110', slug: '110'},
			{name : 'Salle 109', slug: '109'},
			{name : 'Salle 108', slug: '108'},
			{name : 'Salle 107', slug: '107'},
			{name : 'Salle 106', slug: '106'},
			{name : 'Salle 105', slug: '105'},
			{name : 'Salle 104', slug: '104'},
			{name : 'Amphi 2', slug: '1Amphi 2'},
			{name : 'Salle 140B', slug: '140B'},
			{name : 'Salle 140A', slug: '140A'},
			{name : 'Salle 140H', slug: '140H'},
			{name : 'Salle 134', slug: '134'}],
		[	{name : 'Salle 202', slug: '202'},
			{name : 'Salle 201', slug: '201'},
			{name : 'Salle 243', slug: '243'},
			{name : 'Salle 241', slug: '241'},
			{name : 'Salle 241', slug: '241'},
			{name : 'Salle 239', slug: '239'},
			{name : 'Salle 237', slug: '237'},
			{name : 'Salle 235', slug: '235'},
			{name : 'Salle 233', slug: '233'},
			{name : 'Salle 231', slug: '231'},
			{name : 'Salle 217', slug: '217'},
			{name : 'Salle 215', slug: '215'},
			{name : 'Salle 213', slug: '213'},
			{name : 'Salle 211', slug: '211'},
			{name : 'Salle 210', slug: '210'},
			{name : 'Salle 209', slug: '209'},
			{name : 'Salle 208', slug: '208'},
			{name : 'Salle 207', slug: '207'},
			{name : 'Salle 206', slug: '206'},
			{name : 'Salle 205', slug: '205'},
			{name : 'Salle 204', slug: '204'},
			{name : 'Amphi 3', slug: '2Amphi 3'},
			{name : 'Salle 232', slug: '232'},
			{name : 'Salle 230', slug: '230'},
			{name : 'Salle 228', slug: '228'}],
		[	{name : 'Salle 303', slug: '303'},
			{name : 'Salle 302', slug: '302'},
			{name : 'Salle 351', slug: '351'},
			{name : 'Salle 349', slug: '349'},
			{name : 'Salle 347', slug: '347'},
			{name : 'Salle 345', slug: '345'},
			{name : 'Salle 343', slug: '343'},
			{name : 'Salle 341', slug: '341'},
			{name : 'Salle 339', slug: '339'},
			{name : 'Salle 335', slug: '335'},
			{name : 'Salle 331', slug: '331'},
			{name : 'Salle 327', slug: '327'},
			{name : 'Salle 325', slug: '325'},
			{name : 'Salle 324', slug: '324'},
			{name : 'Salle 317', slug: '317'},
			{name : 'Salle 315', slug: '315'},
			{name : 'Salle 313', slug: '313'},
			{name : 'Salle 311', slug: '311'},
			{name : 'Salle 310', slug: '310'},
			{name : 'Salle 309', slug: '309'},
			{name : 'Salle 308', slug: '308'},
			{name : 'Salle 307', slug: '307'},
			{name : 'Salle 306', slug: '306'},
			{name : 'Salle 305', slug: '305'},
			{name : 'Salle 304', slug: '304'}],
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