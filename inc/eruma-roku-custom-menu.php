<?php
class Eruma_Roku_Custom_Menu extends Walker_Nav_Menu
{

    function __construct()
    {
        add_filter('wp_nav_menu_args', array(__class__, 'items_wrap'));
    }

    static function items_wrap($args)
    {
        $args['container'] = '';
        $args['items_wrap'] = '<ul id="%1$s" class="%2$s">%3$s</ul>';
        $args['fallback_cb'] = '__return_false';
        return $args;
    }

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"navbar-dropdown\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent</div>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : ( array ) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'navbar-item';

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= $id . $value . $class_names;

        $item_output = !empty($args->before) ? $args->before : '';
        $item_output .= '<li><a'. $attributes .'>';
        $item_output .= !empty($args->links_before) ? $args->links_before : '';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= !empty($args->links_after) ? $args->links_after : '';
        $item_output .= '</a></li>';
        $item_output .= !empty($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el( &$output, $item, $depth = 0, $args = array() )
    {
        $output .= "\n";
    }
}

/*
<div id="primary-menu" class="navbar-start">
    <a href="https://eruma.lndo.site/" id="menu-item-206" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-203 current_page_item menu-item-206 navbar-item">Hem</a>
    <a href="https://eruma.lndo.site/projects/" id="menu-item-428" class="menu-item menu-item-type-post_type_archive menu-item-object-projects menu-item-428 navbar-item">Projekt</a>
    <a href="https://eruma.lndo.site/about-me/" id="menu-item-67" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-67 navbar-item">Om Mig</a>
    <a href="https://eruma.lndo.site/blogg/" id="menu-item-205" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-205 navbar-item">Blogg</a>
    <a href="#colophon" id="menu-item-427" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-427 navbar-item">Kontakta mig</a>
</div>
*/
