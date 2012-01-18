jQuery(function($){
	if($('a.zoombox').length > 0)
		$('a.zoombox').zoombox();
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
	
	/* Accordeon du stage */
	$('#accordeonStage').accordion({
			autoHeight: false,
			navigation: true,
	});
	$('#accordeonStage h3').click(function(){ $('#accordeonStage h3').removeClass('active'); $(this).addClass('active'); });
	
	// Pour les tableau triable	
	$("table#sort").tablesorter({ sortList: [[1,0]] });
	
	// Changement des contenus des fichiers des modules (upload)
	$('#modules').change(function(){
		if ($(this).val() != "")
		{
			$('.active.module').removeClass('active').slideUp();
			$('.module#'+$(this).val()).addClass('active').slideDown();
		}
	});
	
	// Mise en forme paginator pour bootstrap 8-)
	myComplete();

});

function myComplete()
{
	$('#paginator a').each(function(e){
		$(this).wrap('<li>');
	});
	$('#paginator').find('.current').wrap('<li class="disabled"><a href="#">');
	$('#paginator li').wrapAll('<ul>');
}