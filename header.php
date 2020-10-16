<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eruma-roku' ); ?></a>
    <header id="masthead" class="site-header" role="banner">
        <nav id="site-navigation" class="main-navigation navbar is-primary" aria-label="<?php esc_attr_e('Site Navigation', 'eruma-roku'); ?>">
            <div class="container">
                <div class="navbar-brand">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if (has_custom_logo()) {
                        echo '<h1 class="navbar-item custom-logo-link"><img class="custom-logo" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . ' - '. get_bloginfo('description') .'"></h1>';
                    } else {
                        echo '<h1 class="navbar-item custom-logo-link">' . get_bloginfo('name') . '</h1>';
                    }
                    ?>
                    <button class="navbar-burger burger" aria-label="<?php esc_attr_e('Menu', 'eruma-roku'); ?>" aria-expanded="false" data-target="navbarBasicExample" aria-controls="navbarBasicExample">
                        <span class="screen-reader-text"><?php esc_html_e('Primary menu', 'eruma-roku') ?></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </button>
                </div>

                <div id="navbarBasicExample" class="navbar-menu">
                    <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'menu-1',
                        'menu_id'           => 'primary-menu',
                        'menu_class'        => 'navbar-start',
                        'walker'            => new Eruma_Roku_Custom_Menu()
                    ) );
                    ?>
                </div>
            </div>
        </nav>
    </header><!-- #masthead .site-header -->