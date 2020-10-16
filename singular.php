<?php get_header(); ?>
    <main id="content" class="site-content">
        <?php
        while( have_posts() ) : 
            
            the_post();

            if ( is_front_page() || is_home() ) {
                get_template_part( 'template-parts/content', 'front-page' );
            } else {
            get_template_part( 'template-parts/content', 'singular' );
            }

            if ( ! is_page() ) {
            echo eruma_roku_custom_post_nav();
            // the_post_navigation();
            } else{
                
            }

			if ( comments_open() || get_comments_number() ) {
				comments_template();
            }

        endwhile;
        ?>
    </main><!-- #content .site-content -->
<?php get_footer(); ?>