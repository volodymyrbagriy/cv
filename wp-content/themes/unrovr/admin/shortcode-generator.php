<form class="sh-wrap">
	<br>
	<label for="sh_list">Shortcodes</label>
	<br>
	
	<select id="sh_list" name="sh_list" class="sh-list" style="width: 50%;">
		<option></option>
		<option>quote</option>
	</select>
	
	<br>
	<br>
	
	
	<!-- quote -->
	<div class="quote" style="display: none;">
		<label for="quote_name">Name</label>
		<br>
		<input type="text" id="quote_name" name="quote_name">
		<br>
		<br>
		
		<label for="quote_text">Text</label>
		<br>
		<input type="text" id="quote_text" name="quote_text">
		<br>
		<br>
	</div>
	<!-- end quote -->
	
	
	<button type="button" class="button button-primary button-large btn-sh-insert">Insert Shortcode</button>
</form>

<script>

	jQuery(document).ready(function($)
	{
		var sh_selected = "";
		
		$('.sh-list').change(function() {
			
			$('.sh-wrap div').hide();
			
			sh_selected = $('.sh-list').val();
			
			$('.' + sh_selected).show();
		});
		
		
		// insert button
		$('.btn-sh-insert').click(function() {
			
			// sh_out
			var sh_out = "";
			
			if (sh_selected == 'quote')
			{
				var quote_name = $('#quote_name').val();
				var quote_text = $('#quote_text').val();
				
				sh_out = '[quote name="' + quote_name + '"]' + quote_text + '[/quote]';
			}
			
			
			// add to editor
			if (window.tinyMCE)
			{
				var tmce_ver = window.tinyMCE.majorVersion;
				
				if (tmce_ver < "4")
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, sh_out);
				}
				else
				{
					parent.tinyMCE.execCommand('mceInsertContent', false, sh_out);
				}
				
				tb_remove();
			}
		});
	});

</script>