jQuery(function($){

	$(".menu").mouseover(function(){
		$(this).next('.menu-dropdown').slideDown('fast');
	});
	
	$('.menu-dropdown').mouseout(function(){
		$(this).stop().slideUp('slow');
	});
	
	$('.menu').click(function(){
		if ($(this).hasClass('active'))
			$(this).removeClass('active');
		else
			$(this).addClass('active');
		$(this).next('.dropdown-menu').toggle();
	});
	
	// Pour les tableau triable	
	$("table#sortTableExample").tablesorter({ sortList: [[1,0]] });

});