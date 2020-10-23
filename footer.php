    <?php get_sidebar('footer'); ?>
    <footer id="colophon" class="site-footer footer">
        <div class="container">
            <div class="site-info content">
                &copy; <?php echo date("Y"); ?> Eruma
                <span class="sep"> | </span>
                <?php
                printf( esc_html__( 'Theme: %1$s by %2$s.', 'eruma-roku' ), 'eruma-roku', '<a href="https://github.com/erumaro">Tobias Årud</a>' );
                ?>
            </div><!-- .site-info -->
            <?php
            $backtotoplinkinner = '<span class="icon"><i class="fas fa-angle-up"></i></span><span>' . __( 'Back to top' ) .'</span>';
            $backtotop = '<div class="back-to-top"><a class="button is-link is-rounded" href="#masthead">'. $backtotoplinkinner .'</a></div>';
            echo $backtotop;
            ?>
        </div>
    </footer><!-- #colophon .site-footer -->
    <?php wp_footer(); ?>
</body>
</html>