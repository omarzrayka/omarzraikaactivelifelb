jQuery(document).ready(function($){
	var mediaUploader;

	$( '#upload-button' ).click(function(e){
		alert(555);
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Default Picture',
			button:{
				text:'choose picture'
			},
			multiple:false
			
		});
	});
	
});

$('infoContactForm').on('submit', function(e){
	e.preventDefault();
	var form = $(this),
	    name =from.find('#name').value(),
		email =from.find('#email').value(),
		message =from.find('#message').value(),
		ajaxurl =from.data('url');
		if( name=== '' || email =='' || message==''){
			console.log('Required inputs is empty');
			return;
		}
		$ajax({
			ajax: ajaxurl,
			type: post,
			data: {
				name: name,
				email: email,
				message: message,
				action: 'info_save_user_contact_form'
			},
			error: function(response){
				console.log(response);
			},success: function(reponse){
				
			}
			
		 });
		});