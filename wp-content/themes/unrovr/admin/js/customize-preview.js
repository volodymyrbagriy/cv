(function($) {

	wp.customize('blogname', function(value)
	{
		value.bind(function(to)
		{
			$('header .site-title').html(to);
			$('.homepage-template-site-title').html(to);
		});
	});
	
	
	wp.customize('blogdescription', function(value)
	{
		value.bind(function(to)
		{
			$('header .site-description').html(to);
			$('.homepage-template-site-tagline').html(to);
		});
	});


// ====================================================================================================================


 	wp.customize('unrovr_setting_font_1', function(value)
	{
		value.bind(function(to)
		{
			$('body').append('<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + '">');
			
			var styleCss = '<style type="text/css"> body, input, textarea, select { font-family: "' + to + '"; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_2', function(value)
	{
		value.bind(function(to)
		{
			$('body').append('<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + '">');
			
			var styleCss = '<style type="text/css"> h1, .entry-title { font-family: "' + to + '"; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_3', function(value)
	{
		value.bind(function(to)
		{
			$('body').append('<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + '">');
			
			var styleCss = '<style type="text/css"> h2, h3, h4, h5, h6, .filters, .nav-menu, .card-nav, th, dt, .button, .catlinks a, input[type=submit], button, label, .tab-titles, a.more-link, blockquote { font-family: "' + to + '"; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('unrovr_setting_font_size_1', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> body { font-size: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_size_2', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media screen and (min-width: 768px) { h1 { font-size: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_size_3', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> input[type=submit], input[type=button], button, .button { font-size: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_size_4', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media screen and (min-width: 768px) { .blog-regular .entry-title { font-size: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_size_5', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media only screen and (min-width: 992px) { .card-intro p { font-size: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_size_6', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .card-info h2 { font-size: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_size_7', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media screen and (min-width: 768px) { .media-grid h3 { font-size: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('unrovr_setting_font_weight_1', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> h1, .entry-title { font-weight: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_weight_2', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> input[type=submit], input[type=button], button, .button { font-weight: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_weight_3', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .card-intro h1, .site-title { font-weight: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_weight_4', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .card-info h2 { font-weight: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_font_weight_5', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .media-grid h3 { font-weight: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('unrovr_setting_letter_spacing_1', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> input[type=submit], input[type=button], button, .button { letter-spacing: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_letter_spacing_2', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media only screen and (min-width: 992px) { .card-intro h1 { letter-spacing: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_letter_spacing_3', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .card-info h2 { letter-spacing: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_letter_spacing_4', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .media-grid h3 { letter-spacing: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


	wp.customize('unrovr_setting_color_1', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> body { color: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_2', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .card-nav li.current_page_item a { color: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_3', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .pagination a:hover, .navigation a:hover, a.more-link:hover, .event:nth-of-type(2):after, .elementor-element:nth-of-type(2) .event:after, .portfolio-nav a:hover, .skill-unit .bar .progress, #nprogress .bar { background-color: ' + to + '; } .bypostauthor > article, .event h3, input:not([type=submit]):not([type=button]):not([type=file]):not([type=radio]):not([type=checkbox]):focus, textarea:focus, input:focus, select:focus, .tabs .tab-titles li a.active { border-color: ' + to + '; } .event h3, .entry-title a:hover { color: ' + to + '; } #nprogress .spinner-icon { border-top-color: ' + to + '; border-left-color: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_4', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .section-title h2 i, .cat-links a, .filters li a:hover, .filters .current > a { box-shadow: inset 0 -6px 0px ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_5', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> input[type=submit], input[type=button], button, .button { color: ' + to + '; border-color: ' + to + '; } input[type=submit]:hover, input[type=button]:hover, button:not(.button):hover, .button:after { background: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_6', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .button.secondary { color: ' + to + '; border-color: ' + to + '; } .button.secondary:after { background: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_7', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .card-intro h1 { color: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_8', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .card-info h2 { background: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_9', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .card-info h2 { color: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_10', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .cover:after, .card-3d-right-side:after, .card-3d-bottom-side:after, .header:before { background: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_11', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> a { color: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('unrovr_setting_color_12', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> a:hover { color: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('unrovr_setting_card_image_mask_opacity', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .cover:after, .card-3d-right-side:after, .card-3d-bottom-side:after, .header:before { opacity: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('unrovr_setting_grid_title_text_transform', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .media-grid h3 { text-transform: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});

})(jQuery);