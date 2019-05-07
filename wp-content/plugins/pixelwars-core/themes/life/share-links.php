<?php

	function life_share_links_meta()
	{
		?>
			<span class="entry-share">
				<span class="entry-share-text">
					<?php
						esc_html_e('Share', 'pixelwars-core');
					?>
				</span>
				
				<span class="entry-share-wrap">
					<span class="entry-share-inner-wrap">
						<a class="share-facebook" rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode(the_title_attribute('echo=0')); ?>" title="<?php esc_attr_e('Share this post on Facebook', 'pixelwars-core'); ?>"><?php esc_html_e('Facebook', 'pixelwars-core'); ?></a>
						
						<a class="share-twitter" rel="nofollow" target="_blank" href="http://twitter.com/home?status=<?php esc_attr_e('Currently%20reading', 'pixelwars-core'); ?>:%20'<?php echo urlencode(the_title_attribute('echo=0')); ?>'%20<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post with your followers', 'pixelwars-core'); ?>"><?php esc_html_e('Twitter', 'pixelwars-core'); ?></a>
						
						<a class="share-pinterest" rel="nofollow" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?><?php if (has_post_thumbnail()) { echo '&media='; the_post_thumbnail_url('life_image_size_1'); } ?>&description=<?php echo urlencode(the_title_attribute('echo=0')); ?>"><?php esc_html_e('Pinterest', 'pixelwars-core'); ?></a>
						
						<a class="share-gplus" rel="nofollow" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post on Google+', 'pixelwars-core'); ?>"><?php esc_attr_e('Google+', 'pixelwars-core'); ?></a>
						
						<a class="share-mail" rel="nofollow" target="_blank" href="mailto:?subject=<?php echo urlencode(esc_attr__('I wanted you to see this post', 'pixelwars-core')); ?>&amp;body=<?php echo urlencode(esc_attr__('Check out this post', 'pixelwars-core')); ?>%20:%20<?php echo urlencode(the_title_attribute('echo=0')); ?>%20-%20<?php the_permalink(); ?>" title="<?php esc_attr_e('Email this post to a friend', 'pixelwars-core'); ?>"><?php esc_attr_e('Email', 'pixelwars-core'); ?></a>
					</span> <!-- .entry-share-inner-wrap -->
				</span> <!-- .entry-share-wrap -->
			</span> <!-- .entry-share -->
		<?php
	}
	
	
	function life_share_links()
	{
		$share_links = get_theme_mod('life_setting_share_links', 'Yes');
		
		if ($share_links != 'No')
		{
			?>
				<div class="share-links">
					<h3>
						<?php
							esc_html_e('Share This', 'pixelwars-core');
						?>
					</h3>
					
					<a class="share-facebook" rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode(the_title_attribute('echo=0')); ?>" title="<?php esc_attr_e('Share this post on Facebook', 'pixelwars-core'); ?>">
						<i class="pw-icon-facebook"></i>
					</a>
					
					<a class="share-twitter" rel="nofollow" target="_blank" href="http://twitter.com/home?status=<?php esc_attr_e('Currently%20reading', 'pixelwars-core'); ?>:%20'<?php echo urlencode(the_title_attribute('echo=0')); ?>'%20<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post with your followers', 'pixelwars-core'); ?>">
						<i class="pw-icon-twitter"></i>
					</a>
					
					<a class="share-pinterest" rel="nofollow" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?><?php if (has_post_thumbnail()) { echo '&media='; the_post_thumbnail_url('life_image_size_1'); } ?>&description=<?php echo urlencode(the_title_attribute('echo=0')); ?>" title="<?php esc_attr_e('Pin It', 'pixelwars-core'); ?>">
						<i class="pw-icon-pinterest-circled"></i>
					</a>
					
					<a class="share-gplus" rel="nofollow" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post on Google+', 'pixelwars-core'); ?>">
						<i class="pw-icon-gplus"></i>
					</a>
					
					<a class="share-mail" rel="nofollow" target="_blank" href="mailto:?subject=<?php echo urlencode(esc_attr__('I wanted you to see this post', 'pixelwars-core')); ?>&amp;body=<?php echo urlencode(esc_attr__('Check out this post', 'pixelwars-core')); ?>%20:%20<?php echo urlencode(the_title_attribute('echo=0')); ?>%20-%20<?php the_permalink(); ?>" title="<?php esc_attr_e('Email this post to a friend', 'pixelwars-core'); ?>">
						<i class="pw-icon-mail"></i>
					</a>
				</div> <!-- .share-links -->
			<?php
		}
	}

?>