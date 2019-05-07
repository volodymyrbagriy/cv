<?php

	function unrovr_post_tags()
	{
		if (get_the_tags() != "")
		{
			?>
				<footer class="entry-meta tags">
					<?php
						the_tags("", ' ', "");
					?>
				</footer>
			<?php
		}
	}

?>