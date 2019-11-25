<article>
<?php
                // content template or content code
                if( has_post_thumbnail() ) :
                    echo '<figure class="image is-96x96">';
                        the_post_thumbnail('small');
                    echo '</figure>';
                endif;
                the_title( '<h3 class="entry-title title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
?>
</article>