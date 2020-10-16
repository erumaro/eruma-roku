<?php get_header(); ?>
    <main id="content" class="site-content">
        <?php
        if( have_posts() ) : 
            if( is_home() && ! is_front_page() ) :
                ?>
                <header>
                    <h2 class="page-title screen-reader-text"><?php single_post_title(); ?></h2>
                </header>
                <?php
            endif;

            while( have_posts() ) : 
                
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );
                ?>
                <?php
            endwhile;

            eruma_roku_pagination( $before = '<div class="container">', $after = '</div>' );

        else : 

            // content none

        endif;
        ?>
    </main><!-- #content .site-content -->
<?php get_footer(); ?>