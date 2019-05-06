<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header hero <?php echo ( has_post_thumbnail( $post->ID ) ) ? 'is-medium' : '' ?> is-danger" <?php getFeaturedImage() ?>>
        <div class="hero-body">
            <div class="container">
            <?php
            if ( is_page() || is_single('project') ) :
                the_title( '<h2 class="entry-title title"><!-- this is content-singular.php -->', '</h2>' );
            elseif ( is_single() ) :
                the_title( '<h2 class="entry-title title"><!-- this is content-singular.php -->', '</h2>' );
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

    </footer>
</article>