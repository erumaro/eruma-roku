<?php

function eruma_roku_custom_post_nav( $args = array() ) {
    $args = wp_parse_args( $args, array(
        'prev_text'             =>  '<i class="fas fa-angle-left"></i><span class="screen-reader-text">' . __( 'Prevous post:' ) . ' %title</span>',
        'next_text'             =>  '<i class="fas fa-angle-right"></i><span class="screen-reader-text">' . __( 'Next post:' ) . ' %title</span>',
        'in_same_term'          =>  false,
        'excluded_terms'        =>  '',
        'taxonomy'              =>  'category',
        'screen_reader_text'    =>  __( 'Post navigation' ),
    ) );

    $navigation = '';

    $previous = get_previous_post_link(
        '<div class="previous-post">%link</div>',
        $args['prev_text'],
        $args['in_same_term'],
        $args['exclude_terms'],
        $args['taxonomy']
    );

    $next = get_next_post_link(
        '<div class="next-post">%link</div>',
        $args['next_text'],
        $args['in_same_term'],
        $args['excluded_terms'],
        $args['taxonomy']
    );

    $backtotoplinkinner = '<i class="fas fa-angle-up"></i><span class="screen-reader-text">' . __( 'Back to top' ) .'</span>';
    $backtotop = '<div class="back-to-top"><a href="#masthead">'. $backtotoplinkinner .'</a></div>';

    if( $previous || $next ) {
        $navigation = _navigation_markup( $previous . $backtotop . $next, 'post-navigation', $args['screen_reader_text'] );
    }

    return $navigation;
}