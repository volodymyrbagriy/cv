<?php

	function unrovr_enqueue__inline_script()
	{
		/* Inline JS */
		
		$validator_messages  = '(function($) { "use strict";' . PHP_EOL;
		$validator_messages .= '$.extend($.validator.messages, {' . PHP_EOL;
		$validator_messages .= 'required: "' . esc_html__('This field is required.', 'unrovr') . '",' . PHP_EOL;
		$validator_messages .= 'remote: "' . esc_html__('Please fix this field.', 'unrovr') . '",' . PHP_EOL;
		$validator_messages .= 'email: "' . esc_html__('Please enter a valid email address.', 'unrovr') . '",' . PHP_EOL;
		$validator_messages .= 'url: "' . esc_html__('Please enter a valid URL.', 'unrovr') . '",' . PHP_EOL;
		$validator_messages .= 'date: "' . esc_html__('Please enter a valid date.', 'unrovr') . '",' . PHP_EOL;
		$validator_messages .= 'dateISO: "' . esc_html__('Please enter a valid date ( ISO ).', 'unrovr') . '",' . PHP_EOL;
		$validator_messages .= 'number: "' . esc_html__('Please enter a valid number.', 'unrovr') . '",' . PHP_EOL;
		$validator_messages .= 'digits: "' . esc_html__('Please enter only digits.', 'unrovr') . '",' . PHP_EOL;
		$validator_messages .= 'equalTo: "' . esc_html__('Please enter the same value again.', 'unrovr') . '",' . PHP_EOL;
		$validator_messages .= 'maxlength: $.validator.format("' . esc_html__('Please enter no more than {0} characters.', 'unrovr') . '"),' . PHP_EOL;
		$validator_messages .= 'minlength: $.validator.format("' . esc_html__('Please enter at least {0} characters.', 'unrovr') . '"),' . PHP_EOL;
		$validator_messages .= 'rangelength: $.validator.format("' . esc_html__('Please enter a value between {0} and {1} characters long.', 'unrovr') . '"),' . PHP_EOL;
		$validator_messages .= 'range: $.validator.format("' . esc_html__('Please enter a value between {0} and {1}.', 'unrovr') . '"),' . PHP_EOL;
		$validator_messages .= 'max: $.validator.format("' . esc_html__('Please enter a value less than or equal to {0}.', 'unrovr') . '"),' . PHP_EOL;
		$validator_messages .= 'min: $.validator.format("' . esc_html__('Please enter a value greater than or equal to {0}.', 'unrovr') . '"),' . PHP_EOL;
		$validator_messages .= 'step: $.validator.format("' . esc_html__('Please enter a multiple of {0}.', 'unrovr') . '")' . PHP_EOL;
		$validator_messages .= '});' . PHP_EOL;
		$validator_messages .= '})(jQuery);';
		
		wp_add_inline_script('jqueryvalidation', $validator_messages);
	}
	
	
	function unrovr_after_setup_theme__inline_script()
	{
		add_action('wp_enqueue_scripts', 'unrovr_enqueue__inline_script');
	}
	
	add_action('after_setup_theme', 'unrovr_after_setup_theme__inline_script');

?>