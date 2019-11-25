<?php get_header(); ?>
    <main id="content" class="site-content">
    <?php
        if( have_posts() ) : ?>
			<header class="page-header hero is-primary">
            <div class="hero-body">
            <div class="container">
				<?php
				the_archive_title( '<h2 class="page-title title">', '</h2>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </div>
            </div>
            </header><!-- .page-header -->
            <?php
            // echo '<div class="container">';
            while( have_posts() ) : 
                
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );
                
            endwhile; ?>
            <?php // echo '</div>'; ?>

            <div class="back-to-top-wrapper">
            <?php
            $backtotoplinkinner = '<i class="fas fa-angle-up"></i><span class="screen-reader-text">' . __( 'Back to top' ) .'</span>';
            $backtotop = '<div class="back-to-top"><a href="#masthead">'. $backtotoplinkinner .'</a></div>';
            echo $backtotop;
            ?>
            </div><?php

            eruma_roku_pagination( $before = '<div class="container">', $after = '</div>' );
        endif;
        ?>
    </main><!-- #content .site-content -->
<?php get_footer(); ?>