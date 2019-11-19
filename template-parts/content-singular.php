<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header hero <?php echo ( has_post_thumbnail( $post->ID ) ) ? 'is-medium' : '' ?> is-primary" <?php getFeaturedImage() ?>>
        <div class="hero-body">
            <div class="container">
            <?php
            if ( is_page() ){
                the_title( '<h2 class="entry-title title">', '</h2>' );
            } elseif ( is_single() && !is_singular('projects') ){
                the_title( '<h2 class="entry-title title">', '</h2>' );
                ?>
                <h3 class="entry-meta subtitle">
                    <?php
                    getPostDateHtml();
                    getPostAuthorHtml();
                    ?>
                </h3><?php
            } elseif ( is_singular( 'projects' ) ){ 
                the_title( '<h2 class="entry-title title">', '</h2>' ); ?>
                <div class="entry-meta buttons">
                <?php
                if( get_field('live_link') ) :
                    echo '<a class="button is-primary is-inverted" href="' . esc_url( get_field('live_link') ) . '">'. __( 'Visit Website', 'eruma-roku' ) .'</a>';
                endif;
                if( get_field('github_link') ) :
                    echo '<a class="button is-primary is-inverted" href="' . esc_url( get_field('github_link') ) . '"><span>'. __( 'Visit Github Repo', 'eruma-roku' ) .'</span><span class="icon is-medium"><i class="fab fa-github"></i></span></a>';
                endif;
                ?>
                </div><?php
            } 
            ?>
            </div>
        </div>
    </header>
    <div class="entry-content content is-large">
        <div class="container">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'eruma-roku' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
        ) );
        ?>
        </div>
    </div>
    <?php eruma_roku_post_footer(); ?>
</article>