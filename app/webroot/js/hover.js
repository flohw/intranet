jQuery(function($) {

	$('.dropfile').find('img.delete').hide();
	$('.dropfile').live({
		mouseover: function(){
			// Affichage image de suppression
			$(this).find('img.delete').show();
			// Affichage infos fichier
			if (typeof $(this).data('value') != 'undefined')
			{
				$(this).append('<span class="infoFichier">'+$(this).data('value')+'</span>');
				
				var bulle = $(this).find('span.infoFichier');
				var posTop = -bulle.height()-20;
				var posLeft = $(this).width() / 2 - bulle.width() / 2 - 6;
				
				bulle.css({left: posLeft, top: posTop - 10, opacity: 0});
				bulle.animate({top: posTop, opacity: 0.99});
			}
		},
		mouseout: function(){
			// Cache image de supperssion
			$(this).find('img.delete').hide();
			// Cache infos fichier
			$(this).find('span.infoFichier').hide();
		},
	});

});