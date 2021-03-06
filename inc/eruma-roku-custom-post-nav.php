<?php

function eruma_roku_custom_post_nav( $args = array() ) {
    $args = wp_parse_args( $args, array(
        'prev_text'             =>  '<span class="icon"><i class="fas fa-angle-left"></i></span><span>' . __( 'Prevous post:' ) . ' %title</span>',
        'next_text'             =>  '<span>' . __( 'Next post:' ) . ' %title</span><span class="icon"><i class="fas fa-angle-right"></i></span>',
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

    if( $previous || $next ) {
        $navigation = _navigation_markup( $previous . $next, 'container', $args['screen_reader_text'] );
    }

    return $navigation;
}