(function($) {
	var o = {
		message:'Déposez vos fichiers ici',
		script:	'upload.php',
		clone:	true,
		complete: function (json) { return false; },
		image: null,
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
			if (o.image == null) o.image = 'img/delete.png';
			if (index > 0 && o.clone)
			{
				zone = zone.clone().text('').insertAfter(zone).dropfile(o);
				zone.data('value', null);
			}
			var xhr = new XMLHttpRequest();
			// Début de téléchargement
			xhr.addEventListener('load', function(e){
				var json = jQuery.parseJSON(e.target.responseText);
				zone.removeClass('hover');
				progress.css({height: 0}).text('');
				addDelButton(file, zone, o.image, json.id);			// Ajout du bouton de suppression
				if (index < files.length-1)
					upload(files, zone, index+1);
				if (json.error)
				{
					alert(json.error);
					return false;
				}
				if (o.complete(json))
					return true;
				if (o.clone && !replace && index == files.length - 1)
					zone.clone().text('').insertAfter(zone).dropfile(o);
				zone.data('value', json.name);
				zone.find('img.place').remove();
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
			xhr.setRequestHeader('content-type', 'multipart/form-data');
			xhr.setRequestHeader('x-file-type', file.type);
			xhr.setRequestHeader('x-file-size', file.fileSize);
			xhr.setRequestHeader('x-file-name', file.fileName);
			for (var i in zone.data())
			{
				if (typeof zone.data(i) !== 'object')
					xhr.setRequestHeader('x-param-'+i, zone.data(i));
			}
			
			xhr.send(file);
		}
		
		function addDelButton(file, zone, image, id) {
			zone.attr('data-value', file.fileName);
			zone.attr('data-id', id)
			zone.append('<a href="#delete"><img src="'+image+'" class="delete"></a>');
			zone.find('img.delete').hide();
		}
		
		return this;
	};
})(jQuery);