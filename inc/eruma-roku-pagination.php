<?php
// Source of original code: https://github.com/tomhrtly/bulmawp/blob/master/src/functions.php

function eruma_roku_pagination( $before = '', $after = '' ) {
	global $wpdb, $wp_query;
	$request		 	= $wp_query->request;
	$posts_per_page		= intval( get_query_var( 'posts_per_page' ) );	
	$paged				= intval( get_query_var( 'paged' ) );
	$numposts			= $wp_query->found_posts;
	$max_page			= $wp_query->max_num_pages;

	if ( $numposts <= $posts_per_page ) { return; }
	if( empty($paged) || $paged == 0 ) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start = floor( $pages_to_show_minus_1 / 2 );
	$half_page_end = ceil( $pages_to_show_minus_1 / 2 );
	$start_page = $paged - $half_page_start;
	if( $start_page <= 0 ) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if( ($end_page - $start_page) != $pages_to_show_minus_1 ) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
    if( $end_page > $max_page ) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page = $max_page;
    }
    if( $start_page <= 0 ) {
        $start_page = 1;
    }

	echo $before.'<nav class="pagination is-centered" aria-label="'. esc_attr__('pagination', 'eruma-roku') .'">'."";

	$prevposts = get_previous_posts_link( esc_html__('Previous', 'eruma-roku') );
	if( $prevposts ){
		echo $prevposts;
	} else {
		echo '<a class="pagination-previous" title="'. esc_attr__('This is the first page', 'eruma-roku') .'" disabled>'. esc_html__('Previous', 'eruma-roku') .'</a>';
	}

	echo '<ul class="pagination-list">';
	for( $i = $start_page; $i <= $end_page; $i++){
        if( $i == $paged ){
            echo '<li><a href="#" class="pagination-link is-current" aria-label="'. esc_attr__('Page '. $i .'', 'eruma-roku') .'" aria-current="'. esc_attr__('page', 'eruma-roku') .'">'.$i.'</a></li>';
        } else {
            echo '<li><a class="pagination-link" href="'.get_pagenum_link($i).'" aria-label="'. esc_attr__('Go to page '. $i .'', 'eruma-roku') .'">'.$i.'</a></li>';
        }
	}

	echo '</ul>';

	$nextposts = get_next_posts_link( esc_html__('Next', 'eruma-roku') );
	if( $nextposts ){
		echo $nextposts;
	} else {
		echo '<a class="pagination-next" title="'. esc_attr__('This is the last page', 'eruma-roku') .'" disabled>'. esc_html__('Next page', 'eruma-roku') .'</a>';
	}
	echo '</nav>'.$after."";
}

add_filter( 'next_posts_link_attributes', 'eruma_roku_next_posts_link_class' );
add_filter( 'previous_posts_link_attributes', 'eruma_roku_previous_posts_link_class' );
function eruma_roku_next_posts_link_class() {
	return 'class="pagination-next"';
}
function eruma_roku_previous_posts_link_class() {
	return 'class="pagination-previous"';
}