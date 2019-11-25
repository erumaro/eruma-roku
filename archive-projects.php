<?php get_header(); ?>
    <main id="content" class="site-content">
        <?php
        if( have_posts() ) :
            if( is_post_type_archive('projects') && ! is_singular('projects') ) :
                ?>
                <header>
                    <h2 class="page-title screen-reader-text"><?php echo __( 'Projects' ) ?></h2>
                </header>
                <?php
            endif;

            while( have_posts() ) : 
                
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );
                
            endwhile; ?>

            <div class="back-to-top-wrapper">
            <?php
            $backtotoplinkinner = '<i class="fas fa-angle-up"></i><span class="screen-reader-text">' . __( 'Back to top' ) .'</span>';
            $backtotop = '<div class="back-to-top"><a href="#masthead">'. $backtotoplinkinner .'</a></div>';
            echo $backtotop;
            ?>
            </div><?php

            eruma_roku_pagination( $before = '<div class="container">', $after = '</div>' );

        else : 

            // content none

        endif;
        ?>
    </main><!-- #content .site-content -->
<?php get_footer(); ?>