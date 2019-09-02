<?php

// Add Shortcode for projects on first page
function get_front_page_projects( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'featured_post' => '0',
		),
		$atts
	);

}
add_shortcode( 'front-page-projects', 'get_front_page_projects' );