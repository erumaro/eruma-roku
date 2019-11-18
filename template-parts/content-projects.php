<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="project-wrapper">
                    <div class="project-content" <?php getFeaturedImage() ?>>
                        <div class="project-text">
                        <?php
                            the_title('<h3 class="title">', '</h3>', true);
                            the_excerpt();
                        ?>
                        </div>
                    </div>
                    <footer class="project-footer buttons">
                    <?php 
                    echo '<a class="button is-primary is-inverted" href="' . esc_url( get_permalink() ) . '">'. __( 'Read more', 'eruma-roku' ) .'</a>';
                    if( get_field('live_link') ) :
                        echo '<a class="button is-primary is-inverted" href="' . esc_url( get_field('live_link') ) . '">'. __( 'Visit Website', 'eruma-roku' ) .'</a>';
                    endif;
                    if( get_field('github_link') ) :
                        echo '<a class="button is-primary is-inverted" href="' . esc_url( get_field('github_link') ) . '"><span>'. __( 'Visit Github Repo', 'eruma-roku' ) .'</span><span class="icon is-medium"><i class="fab fa-github"></i></span></a>';
                    endif;
                    ?>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</article>