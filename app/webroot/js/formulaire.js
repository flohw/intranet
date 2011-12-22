jQuery(function($){
	$('#ajouter').click(function(){
		var valide = true;
		$('.note').each(function(index){
			$(this).removeClass('form-error');
			$(this).parent().removeClass('required error');
			$(this).parent().find('div').remove();
			if ($(this).val() == '' || $(this).val() < 0 || isNaN($(this).val()) || $(this).val() > 20)
			{
				$('<div>').addClass('error-message').append('La note ne peut etre négative ou absente').appendTo($(this).parent());
				$(this).parent().addClass('required error');
				$(this).addClass('form-error');
				valide = false;
			}
		});
		return valide;
	});
});