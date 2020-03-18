    <footer id="colophon" class="site-footer footer" role="contentinfo">
        <?php get_sidebar('footer'); ?>
        <div class="site-info content">
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