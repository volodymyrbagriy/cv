<?php

	if (! function_exists('unrovr_archive_title'))
	{
		function unrovr_archive_title()
		{
			if (have_posts())
			{
				?>
					<header class="entry-header">
						<?php
							if (is_category())
							{
								?>
									<div class="section-title center"><h2><i><?php esc_html_e('Category', 'unrovr'); ?></i></h2></div>
									<h1 class="entry-title"><?php single_cat_title(); ?></h1>
								<?php
							}
							elseif (is_tag())
							{
								?>
									<div class="section-title center"><h2><i><?php esc_html_e('Posts Tagged', 'unrovr'); ?></i></h2></div>
									<h1 class="entry-title"><?php single_tag_title(); ?></h1>
								<?php
							}
							elseif (is_author())
							{
								?>
									<div class="section-title center"><h2><i><?php esc_html_e('Posts By', 'unrovr'); ?></i></h2></div>
									<h1 class="entry-title"><?php the_author(); ?></h1>
								<?php
							}
							elseif (is_search())
							{
								?>
									<div class="section-title center"><h2><i><?php esc_html_e('Searched For', 'unrovr'); ?></i></h2></div>
									<h1 class="entry-title"><?php the_search_query(); ?></h1>
								<?php
							}
							elseif (is_date())
							{
								?>
									<div class="section-title center"><h2><i><?php esc_html_e('Date Archives', 'unrovr'); ?></i></h2></div>
									<h1 class="entry-title">
										<?php
											if (is_day())
											{
												printf(get_the_date());
											}
											elseif (is_month())
											{
												printf(get_the_date(_x('F Y', 'monthly archives date format', 'unrovr')));
											}
											elseif (is_year())
											{
												printf(get_the_date(_x('Y', 'yearly archives date format', 'unrovr')));
											}
											else
											{
												esc_html_e('Archives', 'unrovr');
											}
										?>
									</h1>
								<?php
							}
							elseif (is_post_type_archive())
							{
								?>
									<div class="section-title center"><h2><i><?php esc_html_e('Archives', 'unrovr'); ?></i></h2></div>
									<h1 class="entry-title"><?php post_type_archive_title(); ?></h1>
								<?php
							}
							elseif (is_archive())
							{
								?>
									<div class="section-title center"><h2><i><?php esc_html_e('Archives', 'unrovr'); ?></i></h2></div>
									<h1 class="entry-title"><?php single_term_title(); ?></h1>
								<?php
							}
							else
							{
								if (! is_front_page())
								{
									?>
										<h1 class="entry-title"><?php single_post_title(); ?></h1>
									<?php
								}
							}
						?>
					</header> <!-- .entry-header -->
				<?php
			}
		}
	}

?>