    <footer id="colophon" class="site-footer footer" role="contentinfo">
        <div id="supplementary" class="container">
            <div id="footer-sidebar" class="footer-sidebar widget-area columns" role="complementary">
            <?php get_sidebar('footer'); ?>
            </div>
        </div>
        <div class="site-info content has-text-centered">
            &copy; <?php echo date("Y"); ?> Eruma
            <span class="sep"> | </span>
            <?php
            printf( esc_html__( 'Theme: %1$s by %2$s.', 'eruma-roku' ), 'eruma-roku', '<a href="https://github.com/erumaro">Tobias Årud</a>' );
            ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon .site-footer -->
    <?php wp_footer(); ?>
</body>
</html>