<?php

if ( ! function_exists( 'getPostDateHtml' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function getPostDateHtml() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'eruma-roku' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'getPostAuthorHtml' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function getPostAuthorHtml() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'eruma-roku' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

/* Function to add Featured image with inline css */
if ( ! function_exists( 'getFeaturedImage' ) ) : 
    function getFeaturedImage() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
        }
        
        echo 'style="background: url('. get_the_post_thumbnail_url() .') center center no-repeat"';
    }
endif;

/* Custom footers for blog and projects post type */

if ( ! function_exists( 'eruma_roku_post_footer' ) ) :
    function eruma_roku_post_footer() {
        if( ! is_page() ) { ?>
            <footer class="entry-footer">
                <nav id="single-post-type-navigation" class="post-navigation navbar is-dark">
                    <div class="container">
                        <?php
                            if ( is_singular( 'projects' ) ) :
                                echo '<div class="technology-list navbar-start">';
                                echo '<span class="screen-reader-text">'. __('Posted in', 'eruma-roku') .'</span>';
                                $terms = get_the_terms( $post->ID, 'technology' );
                                if ($terms && ! is_wp_error($terms)): ?>
                                    <?php foreach($terms as $term): ?>
                                        <a href="<?php echo get_term_link( $term->slug, 'technology'); ?>" rel="tag" class="navbar-item"><?php echo $term->name; ?></a>
                                    <?php endforeach;
                                endif;
                                echo '</div>';
                            elseif ( is_single() || is_home() ) : 
                                echo '<div class="category-list navbar-start">';
                                echo '<span class="screen-reader-text">'. __('Posted in', 'eruma-roku') .'</span>';
                                $terms = get_the_terms( $post->ID, 'category' );
                                if ($terms && ! is_wp_error($terms)): ?>
                                    <?php foreach($terms as $term): ?>
                                        <a href="<?php echo get_term_link( $term->slug, 'category'); ?>" rel="tag" class="navbar-item"><?php echo $term->name; ?></a>
                                    <?php endforeach;
                                endif;
                                echo '</div>';
                                echo '<div class="tags">';
                                echo '<span class="screen-reader-text">'. __('Tags:', 'eruma-roku') .'</span>';
                                $terms = get_the_terms( $post->ID, 'post_tag' );
                                if ($terms && ! is_wp_error($terms)): ?>
                                    <?php foreach($terms as $term): ?>
                                        <a href="<?php echo get_term_link( $term->slug, 'post_tag'); ?>" rel="tag" class="tag">
                                            <span><?php echo $term->name; ?></span>
                                            <span class="icon">
                                                <i class="fas fa-tag"></i>
                                            </span>
                                        </a>
                                    <?php endforeach;
                                endif;
                                echo '</div>';
                                if( is_home() ) :
                                    echo '<div class="comment-link navbar-end">';
                                    comments_popup_link( esc_html__( 'Leave a comment', 'eruma-roku' ), esc_html__( '1 Comment', 'eruma-roku' ), esc_html__( '% Comments', 'eruma-roku' ), 'navbar-item' );
                                    echo '</div>';
                                endif;
                            endif;
                        ?>
                    </div>
                </nav><!-- #single-post-type-navigation -->
            </footer><!-- .entry-footer --><?php
        }
    }
endif;

/* Custom markup for Comments */
function eruma_roku_comment( $comment, $args, $depth ) { ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
    <div class="card">
        <div class="card-content">
            <div class="media">
                <div class="media-left">
                    <figure class="image is-48x48">
                    <?php
                        echo get_avatar( $comment, $args['avatar_size'] );
                    ?>
                    </figure>
                </div>
                <div class="media-content">
                    <?php printf( __( '<h3 class="title is-4">%s says:</h3>', 'eruma-roku' ), get_comment_author_link() ); ?>
                    <h4 class="subtitle is-6">
                    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                        /* translators: 1: date, 2: time */
                        printf( 
                            __('%1$s at %2$s'), 
                            get_comment_date(),  
                            get_comment_time() 
                        ); ?>
                    </a>
                    </h4>
                </div>
            </div>
            <div class="content">
                <?php comment_text(); ?>
            </div>
        </div>
        <footer class="card-footer">
            <div class="card-footer-item">
            <?php
            comment_reply_link( 
                array_merge( 
                    $args, 
                    array( 
                        'add_below' => $add_below, 
                        'depth'     => $depth, 
                        'max_depth' => $args['max_depth'] 
                    ) 
                ) 
            ); 
            ?>
            </div>
            <?php if( is_user_logged_in() ) { ?>
            <div class="card-footer-item">
                <?php 
                edit_comment_link( __( 'Edit' ), '  ', '' ); ?>
            </div>
            <?php } ?>
        </footer>
    </div>
    <?php
}