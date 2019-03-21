<?php

if (!is_active_sidebar('sidebar-1')){
	return;
}
?>

<aside id="supplementary" class="container">
	<div id="footer-sidebar" class="footer-sidebar widget-area columns">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div><!-- #footer-sidebar -->
</aside><!-- #supplementary -->