<?php

	if (! function_exists('unrovr_content_none'))
	{
		function unrovr_content_none()
		{
			?>
				<article class="hentry">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php
								if (is_404())
								{
									esc_html_e('Whoops!', 'unrovr');
								}
								elseif (is_search())
								{
									esc_html_e('Nothing Found', 'unrovr');
								}
								else
								{
									esc_html_e('Nothing Found', 'unrovr');
								}
							?>
						</h1>
					</header>
					<div class="entry-content">
						<div class="http-alert">
							<h1><i class="pe-7s-way"></i></h1>
							<?php
								if (is_404())
								{
									?><p><?php esc_html_e('The page you are looking for was not found!', 'unrovr'); ?></p><?php
								}
								elseif (is_search())
								{
									?><p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'unrovr'); ?></p><?php
									
									get_search_form();
								}
								else
								{
									?><p><?php esc_html_e('It seems we can not find what you are looking for. Perhaps searching can help.', 'unrovr'); ?></p><?php
									
									get_search_form();
								}
							?>
						</div>
					</div>
				</article>
			<?php
		}
	}

?>