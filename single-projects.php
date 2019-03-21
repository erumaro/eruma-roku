<?php get_header(); ?>
    <main id="content" class="site-content">
        <?php
        while( have_posts() ) : 
            
            the_post();

            get_template_part( 'template-parts/content', 'single-projects' );

            if ( ! is_page() ) {
            echo eruma_roku_custom_post_nav();
            // the_post_navigation();
            } else{ ?>
                <div class="back-to-top-wrapper">
                <?php
                $backtotoplinkinner = '<i class="fas fa-angle-up"></i><span class="screen-reader-text">' . __( 'Back to top' ) .'</span>';
                $backtotop = '<div class="back-to-top"><a href="#masthead">'. $backtotoplinkinner .'</a></div>';
                echo $backtotop;
                ?>
                </div>
                <?php
            }

			if ( comments_open() || get_comments_number() ) {
				comments_template();
            }

        endwhile;
        ?>
    </main><!-- #content .site-content -->
<?php get_footer(); ?>