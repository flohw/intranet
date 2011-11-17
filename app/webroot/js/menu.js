jQuery(function($){

	$(".menu").mouseover(function(){
		$('.menu-dropdown').slideUp();
		$('.menu').removeClass('active');
		$(this).parent().find('.menu-dropdown').stop(true, true).slideDown();
		$(this).addClass('active');
	}).mouseleave(function(){
		$('.menu-dropdown').mouseleave(function(){
			$(this).slideUp();
			$(this).parent().find('.active').removeClass('active');
		});
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