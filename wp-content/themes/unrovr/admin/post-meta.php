<?php

	function unrovr_meta_date()
	{
		?>
			<span class="entry-date">
				<time class="entry-date" datetime="<?php echo get_the_date('c'); ?>">
					<?php
						echo get_the_date();
					?>
				</time>
			</span>
		<?php
	}
	
	
	function unrovr_meta_comment()
	{
		if (is_singular('post'))
		{
			if (get_comments_number())
			{
				?>
					<span class="comment-link">
						<?php
							comments_popup_link(esc_html__('0 Comments', 'unrovr'),
												esc_html__('1 Comment', 'unrovr'),
												esc_html__('% Comments', 'unrovr'),
												"",
												'Comments Off');
						?>
					</span>
				<?php
			}
		}
	}
	
	
	function unrovr_meta_category()
	{
		?>
			<span class="cat-links">
				<?php
					the_category(' ');
				?>
			</span>
		<?php
	}
	
	
	function unrovr_meta_edit()
	{
		edit_post_link(
			esc_html__('Edit', 'unrovr'),
			'<span class="edit-link">',
			'</span>'
		);
	}


/* ============================================================================================================================================= */


	function unrovr_meta()
	{
		?>
			<div class="entry-meta">
				<?php
					unrovr_meta_date();
					unrovr_meta_comment();
					unrovr_meta_category();
					unrovr_meta_edit();
				?>
			</div> <!-- .entry-meta -->
		<?php
	}

?>