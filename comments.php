<?php

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area is-warning">
    <div class="container">
    <?php
    if ( have_comments() ) :
        ?>
        <h2 class="comments-title title">
        <?php
			$eruma_roku_comment_count = get_comments_number();
			if ( '1' === $eruma_roku_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'eruma-roku' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $eruma_roku_comment_count, 'comments title', 'eruma-roku' ) ),
					number_format_i18n( $eruma_roku_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
            } 
            ?>
        </h2><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
        <?php
			wp_list_comments( array(
                'callback'      => 'eruma_roku_comment',
                'avatar_size'   => 48
			) );
		?>
        </ol><!-- .comment-list -->

		<?php
        the_comments_navigation();
        
        if ( ! comments_open() ) {
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'eruma-roku' ); ?></p>
            <?php
        }

    endif;

    /*comment_form( array(
        'title_reply_before'    => '<h2 id="reply-title" class="comment-reply-title title">',
        'title_reply_after'     => '</h2>',
        'fields'                => array(
            'author'    => '<div class="comment-form-author field"><label class="label" for="author">' . __( 'Name', 'eruma-roku' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
            '<div class="control"><input id="author" class="input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '"' . $aria_req . '/></div></div>',
            'email'    => '<div class="comment-form-email field"><label class="label" for="email">' . __( 'Email', 'eruma-roku' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
            '<div class="control has-icons-left has-icons-right"><input id="email" class="input" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
            '"' . $aria_req . '/><span class="icon is-small is-left"><i class="fas fa-envelope"></i></span></div></div>',
            'url'    => '<div class="comment-form-url field"><label class="label" for="url">' . __( 'Website', 'eruma-roku' ) . '</label>' .
            '<div class="control"><input id="url" class="input" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" /></div></div>',
        ),
        'comment_field'         => '<div class="comment-form-comment field"><label class="label" for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" class="textarea" name="comment" aria-required="true"></textarea></div>',
    ) );  */

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

    comment_form( array(
        'format'                => 'html5',
        'title_reply_before'    => '<h2 id="reply-title" class="comment-reply-title title">',
        'title_reply_after'     => '</h2>',
        'fields'                => array(
            'author'    => '<div class="comment-form-author field"><label class="label" for="author">' . __( 'Name', 'eruma-roku' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
            '<div class="control"><input id="author" class="input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '"' . $aria_req . '/></div></div>',
            'email'    => '<div class="comment-form-email field"><label class="label" for="email">' . __( 'Email', 'eruma-roku' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
            '<div class="control has-icons-left has-icons-right"><input id="email" class="input" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
            '"' . $aria_req . '/><span class="icon is-small is-left"><i class="fas fa-envelope"></i></span></div></div>',
            'url'    => '<div class="comment-form-url field"><label class="label" for="url">' . __( 'Website', 'eruma-roku' ) . '</label>' .
            '<div class="control"><input id="url" class="input" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" /></div></div>',
        ),
        'comment_field'         => '<div class="comment-form-comment field"><label class="label" for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" class="textarea" name="comment" aria-required="true"></textarea></div>',
        'submit_field'          => '<div class="form-submit field">%1$s %2$s</div>',
        'submit_button'         => '<div class="control"><input name="%1$s" type="submit" id="%2$s" class="%3$s button is-primary" value="%4$s" /></div>',
    ) );
    ?>
    </div>
</div>