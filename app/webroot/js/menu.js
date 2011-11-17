jQuery(function($){

	$(".menu").mouseover(function(){
		$(this).parent().find('.menu-dropdown').stop(true, true).slideDown();
		$(this).addClass('active');
	});
	$('.menu-dropdown').mouseout(function(){
		$(this).slideUp();
		$(this).parent().find('.active').removeClass('active');
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