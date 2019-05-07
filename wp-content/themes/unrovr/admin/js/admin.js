(function($) {
	
	// Image upload for custom widgets.
	
	var mediaUploader;
	
	$('.pixelwars-widget .button-browse').live('click', function(event) {
		
		event.preventDefault();
		
		$('.button-browse').removeClass('active-upload-button'); // Remove class from all 'Browse' buttons.
		$(this).addClass('active-upload-button'); // Add class only this 'Browse' button.
		
		// If the Media Uploader already exists, reopen it.
		if (mediaUploader)
		{
			mediaUploader.open();
		}
		else
		{
			mediaUploader = wp.media.frames.mediaUploader = wp.media({
				multiple: false
			});
			
			mediaUploader.open();
		}
		
		mediaUploader.on('select', function() {
			
			var image = mediaUploader.state().get('selection').first().toJSON();
			
			$('.active-upload-button').siblings('.widget-image').attr('src', image.url).trigger('change').show(); // URL is in use.
			$('.active-upload-button').siblings('.widget-image-id').val(image.id).trigger('change'); // ID is in use.
			
			$('.active-upload-button').siblings('.attachment-media-view').hide();  // Hide message: 'No image selected'.
			$('.active-upload-button').siblings('.button-remove').show(); // Display 'Remove' button.
			
			$('.active-upload-button').blur(); // Unfocus button.
			$('.button-browse').removeClass('active-upload-button'); // Remove class from all 'Browse' buttons.
		});
	});
	
	
	$('.pixelwars-widget .button-remove').live('click', function(event) {
		
		$(this).siblings('.widget-image-id').val("").trigger('change'); // Remove image ID from <input type="hidden">.
		$(this).siblings('.widget-image').attr('src', ""); // Remove image file url from <img>.
		$(this).siblings('.widget-image').hide(); // Hide <img>.
		$(this).siblings('.attachment-media-view').show(); // Show message: 'No image selected'.
		$(this).hide(); // Hide 'Remove' button.
	});
	
	// end Image upload for custom widgets.

})(jQuery);