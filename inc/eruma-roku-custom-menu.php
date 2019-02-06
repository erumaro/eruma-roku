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
        $args['items_wrap'] = '<div id="%1$s" class="%2$s">%3$s</nav>';
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
        $item_output .= '<a'. $attributes .'>';
        $item_output .= !empty($args->links_before) ? $args->links_before : '';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= !empty($args->links_after) ? $args->links_after : '';
        $item_output .= '</a>';
        $item_output .= !empty($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "\n";
    }
}