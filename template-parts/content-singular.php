<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header hero <?php echo ( has_post_thumbnail( $post->ID ) ) ? 'is-medium' : '' ?> is-primary" <?php getFeaturedImage() ?>>
        <div class="hero-body">
            <div class="container">
            <?php
            if ( is_page() ) :
                the_title( '<h2 class="entry-title title">', '</h2>' );
            else :
                the_title( '<h2 class="entry-title title">', '</h2>' );
                ?>
                <h3 class="entry-meta subtitle">
                    <?php
                    getPostDateHtml();
                    getPostAuthorHtml();
                    ?>
                </h3><?php
            endif;
            ?>
            </div>
        </div>
    </header>
    <div class="entry-content content">
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
    <footer class="entry-footer">
        <?php // Content dependant ?>
    </footer>
</article>