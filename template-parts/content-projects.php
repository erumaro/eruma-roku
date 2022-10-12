<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="project-wrapper" <?php getFeaturedImage() ?>>
                    <a href="<?php echo esc_url(get_permalink()) ?>">
                        <div class="project-content">
                            <div class="project-text">
                            <?php
                                the_title('<h3 class="title">', '</h3>', true);
                                the_excerpt();
                            ?>
                            </div>
                        </div>
                    </a>
                    <?php if(get_field('live_link') || get_field('github_link')) { ?>
                    <footer class="project-footer buttons">
                        <?php
                        if(get_field('live_link') ) :
                            echo '<a class="button is-primary is-inverted" href="' . esc_url(get_field('live_link')) . '">'. __('Visit ', 'eruma-roku') . get_the_title() .'</a>';
                        endif;
                        if(get_field('github_link') ) :
                            echo '<a class="button is-primary is-inverted" href="' . esc_url(get_field('github_link')) . '"><span>'. __('Visit Github Repo', 'eruma-roku') .'</span><span class="icon is-medium"><i class="fab fa-github"></i></span></a>';
                        endif;
                        ?>
                    </footer>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</article>
