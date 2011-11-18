jQuery(function($){

	$("a.menu").mouseenter(function(){
		$('.menu-dropdown').slideUp();
		$('.active').removeClass('active');
		$(this).parent().find('.menu-dropdown').stop(true, true).slideDown('slow', function(){
			$(this).find('input[type="text"]').focus();
		});
		$(this).addClass('active');
	});
	$('li.menu').mouseleave(function(){
		$(this).find('.menu-dropdown').slideUp();
		$(this).find('.active').removeClass('active');

	});
	
	// Pour les tableau triable	
	$("table#sortTableExample").tablesorter({ sortList: [[1,0]] });

});