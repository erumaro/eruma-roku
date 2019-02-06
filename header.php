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
        <nav id="site-navigation" class="main-navigation navbar is-primary">
            <div class="container">
                <div class="navbar-brand">
                    <!--
                    <a class="navbar-item custom-logo-link" href="index.html">
                        <img class="custom-logo" src="https://eruma.se/wp-content/uploads/2016/05/cropped-logo_small.png?x69471" alt="Eruma">
                    </a>
                    -->
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if (has_custom_logo()) {
                        echo '<h1 class="navbar-item custom-logo-link"><img class="custom-logo" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . ' - '. get_bloginfo('description') .'"></h1>';
                    } else {
                        echo '<h1>' . get_bloginfo('name') . '</h1>';
                    }
                    ?>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
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