    <?php get_sidebar('footer'); ?>
    <footer id="colophon" class="site-footer footer">
        <div class="site-info content">
            &copy; <?php echo date("Y"); ?> Eruma
            <span class="sep"> | </span>
            <?php
            printf( esc_html__( 'Theme: %1$s by %2$s.', 'eruma-roku' ), 'eruma-roku', '<a href="https://github.com/erumaro">Tobias Årud</a>' );
            ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon .site-footer -->
    <nav class="back-to-top-wrapper">
        <?php
        $backtotoplinkinner = '<i class="fas fa-angle-up"></i><span class="screen-reader-text">' . __( 'Back to top' ) .'</span>';
        $backtotop = '<div class="back-to-top"><a href="#masthead">'. $backtotoplinkinner .'</a></div>';
        echo $backtotop;
        ?>
    </nav>
    <?php wp_footer(); ?>
</body>
</html>