<?php
/* Adds core functionality to the theme */
if (! function_exists('setupTheme') ) {
    function setupTheme()
    {
        load_theme_textdomain('eruma-roku', get_template_directory() . '/languages');
        add_theme_support('title-tag');
        add_theme_support(
            'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            ) 
        );
        add_theme_support(
            'custom-background', apply_filters(
                'custom_background_args', array(
                'default-color' => 'ffffff',
                'default-image' => '',
                ) 
            ) 
        );
        add_theme_support('custom-logo');
        register_nav_menus(
            array(
            'menu-1' => esc_html__('Primary', 'eruma-roku'),
            ) 
        );
        add_theme_support('post-thumbnails');
    }
}
add_action('after_setup_theme', 'setupTheme');

function addFooterSidebar()
{
    register_sidebar(
        array(
        'name'          => __('Footer Widget Area', 'eruma-roku'),
        'id'            => 'sidebar-1',
        'description'   => __('Adds widgets to the footer of the theme.', 'eruma-roku'),
        'before_widget' => '<div id="%1$s" class="widget %2$s column">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title title is-5">',
        'after_title'   => '</h2>',
        ) 
    );
}
add_action('widgets_init', 'addFooterSidebar');

function getThemeScriptsAndStyles()
{
    // Unstyle Gutenberg blocks.
    wp_dequeue_style('wp-block-library');
    // Bundled Stylesheet (Bulma, Bulma-Timeline, Custom styles)
    $cssFilePath = glob(get_template_directory() . '/dist/eruma-roku.min.*.css');
    wp_enqueue_style('eruma-roku-custom-style', get_template_directory_uri() . '/dist/' . basename($cssFilePath[0]), false, '20190206');
    wp_enqueue_style('eruma-roku-style', get_stylesheet_uri());

    wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/releases/v5.3.1/js/all.js', array(), '', true);
    wp_enqueue_script('jquery-validate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js', array( 'jquery' ), '', true);

    $jsFilePath = glob(get_template_directory() . '/dist/bundle.min.*.js');
    wp_enqueue_script('eruma-roku-bundle-js', get_template_directory_uri() . '/dist/' . basename($jsFilePath[0]), array(), '20190206', true);
}
add_action('wp_enqueue_scripts', 'getThemeScriptsAndStyles');

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/eruma-roku-custom-menu.php';
require get_template_directory() . '/inc/post-type-project.php';
require get_template_directory() . '/inc/eruma-roku-custom-post-nav.php';
require get_template_directory() . '/inc/eruma-roku-pagination.php';
