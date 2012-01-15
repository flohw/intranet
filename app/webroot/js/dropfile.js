(function($) {
	var o = {
		message:'Déposez vos fichiers ici',
		script:	'upload.php',
		clone:	true,
		complete: function (json) { return false; },
		image: '/img/delete.png',
	};
	
	$.fn.dropfile = function(oo) {
		if (oo) $.extend(o, oo);
		var replace = false;
		this.each(function(i){
			$('<span>').addClass('instructions').append(o.message).appendTo(this);
			$('<span>').addClass('progress').appendTo(this);
		
			$(this).bind({
				dragenter: function(e){
					e.preventDefault();
				},
				dragover: function(e){
					e.preventDefault();
					$(this).addClass('hover');
				},
				dragleave: function(e){
					e.preventDefault();
					$(this).removeClass('hover');
				},
			});
			this.addEventListener('drop', function(e){
						e.preventDefault();
						var files = e.dataTransfer.files;
						if ($(this).data('value')) replace = true;
						upload(files, $(this), 0);
					}, false);
		});
		
		function upload(files, zone, index) {
			var file = files[index];
			var progress = zone.find('.progress');
			if (index > 0 && o.clone) {
				zone = zone.clone().text('').insertAfter(zone).dropfile(o);
				zone.data('value', null);
			}
			var xhr = new XMLHttpRequest();
			// Début de téléchargement
			xhr.addEventListener('load', function(e){
				var json = jQuery.parseJSON(e.target.responseText);
				zone.removeClass('hover');
				progress.css({height: 0}).text('');
				if (index < files.length-1)
					upload(files, zone, index+1);
				if (json.error)
				{
					alert(json.error);
					return false;
				}
				addDelButton(zone, o.image, file.name);			// Ajout du bouton de suppression
				if (o.complete(json))
					return true;
				if (o.clone && !replace && index == files.length - 1) {
					zone.clone().text('').insertAfter(zone).dropfile(o);
					zone.data('value', null);
				}
				zone.find('img.place').remove();
				zone.data('value', json.name);
				zone.data('id', json.id)
				zone.append(json.content);
			}, false);
			// En cours de téléchargement
			xhr.upload.addEventListener('progress', function(e){
				if (e.lengthComputable)
				{
					var perc = Math.round(e.loaded / e.total * 100)+'%';
					progress.css({height: perc}).html(perc);
				}
			}, false);
			xhr.open('post', o.script, true);
			xhr.setRequestHeader('action', 'upload');
			xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
			xhr.setRequestHeader('x-file-type', file.type);
			xhr.setRequestHeader('x-file-size', file.size);
			xhr.setRequestHeader('x-file-name', file.name);
			for (var i in zone.data())
				if (typeof zone.data(i) !== 'object')
					xhr.setRequestHeader('x-param-'+i, zone.data(i));
			xhr.send(file);
		}
		
		function addDelButton(zone, image, fichier) {
			zone.append('<a href="#delete"><img src="'+image+'" class="delete"></a>');
			zone.append('<span class="infoFichier">'+fichier+'</span>');
			zone.find('img.delete').hide();
		}
		
		return this;
	};
})(jQuery);