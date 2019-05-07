<?php

	if (! function_exists('unrovr_single_navigation'))
	{
		function unrovr_single_navigation()
		{
			if (wp_attachment_is_image())
			{
				?>
					<nav class="row nav-single">
						<div class="col-sm-6 nav-previous">
							<h5>
								<?php
									previous_image_link(
										false,
										'<span class="meta-nav">&#8592;</span>' . esc_html__('Previous Image', 'unrovr')
									);
								?>
							</h5>
						</div> <!-- .col-sm-6 .nav-previous -->
						<div class="col-sm-6 nav-next">
							<h5>
								<?php
									next_image_link(
										false,
										esc_html__('Next Image', 'unrovr') . '<span class="meta-nav">&#8594;</span>'
									);
								?>
							</h5>
						</div> <!-- .col-sm-6 .nav-next -->
					</nav> <!-- .row .nav-single -->
				<?php
			}
			elseif (is_singular('portfolio'))
			{
				?>
					<div class="portfolio-nav">
						<?php
							next_post_link('<span class="prev ajax">%link</span>', "");
						?>
						<?php
							$unrovr_portfolio_page_slug = get_option('unrovr_portfolio_page_slug', "");
							
							if (! empty($unrovr_portfolio_page_slug))
							{
								$portfolio_page_url = get_home_url() . '/#/' . $unrovr_portfolio_page_slug;
								
								?>
									<span class="back">
										<a href="<?php echo esc_url($portfolio_page_url); ?>"></a>
									</span>
								<?php
							}
						?>
						<?php
							previous_post_link('<span class="next ajax">%link</span>', "");
						?>
					</div> <!-- .portfolio-nav -->
				<?php
			}
			else
			{
				$previous_post_link = get_previous_post_link();
				$next_post_link     = get_next_post_link();
				
				if ((! empty($previous_post_link)) || (! empty($next_post_link)))
				{
					?>
						<nav class="row nav-single">
							<div class="col-sm-6 nav-previous">
								<?php
									previous_post_link(
										'<h6>' . esc_html__('Previous Post', 'unrovr') . '</h6><h5>%link</h5>',
										'<span class="meta-nav">&#8592;</span> %title'
									);
								?>
							</div> <!-- .col-sm-6 .nav-previous -->
							<div class="col-sm-6 nav-next">
								<?php
									next_post_link(
										'<h6>' . esc_html__('Next Post', 'unrovr') . '</h6><h5>%link</h5>',
										'%title <span class="meta-nav">&#8594;</span>'
									);
								?>
							</div> <!-- .col-sm-6 .nav-next -->
						</nav> <!-- .row .nav-single -->
					<?php
				}
			}
		}
	}

?>