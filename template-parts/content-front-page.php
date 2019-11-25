<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section id="introduction" class="introduction full-width-bg" <?php getFeaturedImage() ?>>
        <div class="container intro-content content">
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
    </section>
    <section id="projects" class="projects full-width-bg">
        <div class="container content">
            <h2 class="title">Projekt</h2>
            <div class="columns">
            <?php
            $latest_project = array(
                'post_type'         => 'projects',
                'posts_per_page'    => '2',
            );
            $query_latest_project = new WP_Query( $latest_project );
            if ( $query_latest_project->have_posts() ) {
                // The Loop
                while ( $query_latest_project->have_posts() ) {
                    $query_latest_project->the_post(); ?>
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
                            <a class="button is-primary is-inverted" href="<?php echo esc_url( get_permalink() ) ?>">
                                <?php echo __( 'Continue reading ', 'eruma-roku' ); ?>
                                <span class="screen-reader-text"><?php echo get_the_title(); ?></span>
                            </a>
                            <?php
                            if( get_field('live_link') ) :
                                echo '<a class="button is-primary is-inverted" href="' . esc_url( get_field('live_link') ) . '">'. __( 'Visit Website', 'eruma-roku' ) .'</a>';
                            endif;
                            if( get_field('github_link') ) :
                                echo '<a class="button is-primary is-inverted" href="' . esc_url( get_field('github_link') ) . '"><span>'. __( 'Visit Github Repo', 'eruma-roku' ) .'</span><span class="icon is-medium"><i class="fab fa-github"></i></span></a>';
                            endif;
                            ?>
                            </footer>
                        </div>
                    </div><!-- .column --><?php
                }
                wp_reset_postdata();
            } ?>
            <hr>
            </div><!-- .columns -->
        </div><!-- .container -->
    </section>
    <section id="skills" class="skills full-width-bg">
        <div class="container content">
            <h2 class="title">Min verktygslåda</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque ut sapien nec hendrerit. Aliquam molestie eget odio auctor pulvinar.</p>
            <div class="columns">
                <div class="column">
                    <h3 class="title">Front-end</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque ut sapien nec hendrerit. Aliquam molestie eget odio auctor pulvinar.</p>
                    <div class="tags">
                        <span class="tag">One</span>
                        <span class="tag">Two</span>
                        <span class="tag">Three</span>
                        <span class="tag">Four</span>
                        <span class="tag">Five</span>
                        <span class="tag">Six</span>
                        <span class="tag">Seven</span>
                        <span class="tag">Eight</span>
                        <span class="tag">Nine</span>
                    </div>
                </div>
                <div class="column">
                    <h3 class="title">Back-end</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque ut sapien nec hendrerit. Aliquam molestie eget odio auctor pulvinar.</p>
                    <div class="tags">
                        <span class="tag">One</span>
                        <span class="tag">Two</span>
                        <span class="tag">Three</span>
                        <span class="tag">Four</span>
                        <span class="tag">Five</span>
                        <span class="tag">Six</span>
                        <span class="tag">Seven</span>
                        <span class="tag">Eight</span>
                        <span class="tag">Nine</span>
                    </div>
                </div>
                <div class="column">
                    <h3 class="title">Personal</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque ut sapien nec hendrerit. Aliquam molestie eget odio auctor pulvinar.</p>
                    <div class="tags">
                        <span class="tag">One</span>
                        <span class="tag">Two</span>
                        <span class="tag">Three</span>
                        <span class="tag">Four</span>
                        <span class="tag">Five</span>
                        <span class="tag">Six</span>
                        <span class="tag">Seven</span>
                        <span class="tag">Eight</span>
                        <span class="tag">Nine</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>