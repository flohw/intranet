jQuery(function($){
	
	// Topbar
	$("a.menu").mouseenter(function(){
		$('.menu-dropdown').slideUp();
		$('.topbar .active').removeClass('active');
		$(this).parent().find('.menu-dropdown').stop(true, true).slideDown('slow', function(){
			$(this).find('input[type="text"]').focus();
		});
		$(this).addClass('active');
	});
	$('li.menu').mouseleave(function(){
		$(this).find('.menu-dropdown').slideUp();
		$(this).find('.active').removeClass('active');
	});
	
	// Sidebar
	$('#accordeon').accordion({
			autoHeight: false,
			navigation: true,
	});
	$('#accordeon h3').click(function(){ $('#accordeon h3').removeClass('active'); $(this).addClass('active'); });
	
	// Pour les tableau triable	
	$("table#sort").tablesorter({ sortList: [[1,0]] });

});