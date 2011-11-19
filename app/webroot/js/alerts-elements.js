jQuery(function($){
	
	$('a[href="#"]').click(function(){return false;});
	
	// Message d'erreur de connexion par exemple
	$('.alert-message .close').click(function(){
		$(this).parent().slideUp('slow');
		return false;
	});
	
	// Fenetres modales
	$('.modal-backdrop').hide();
});