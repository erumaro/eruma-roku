<?php

if (!is_active_sidebar('sidebar-1')){
	return;
}
?>

<div id="supplementary" class="container">
	<div id="footer-sidebar" class="footer-sidebar widget-area columns" role="complementary">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div><!-- #footer-sidebar -->
</div><!-- #supplementary -->