jQuery(function($) {

	$('.dropfile').find('img.delete').hide();
	$('.dropfile').live({
		mouseover:	function(){	$(this).find('img.delete').show();	},
		mouseout:	function(){	$(this).find('img.delete').hide();	},
	});

});