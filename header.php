<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">


    <header id="masthead" class="site-header" role="banner">

        <div class="site-branding">
            <?php

            if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
            <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php endif;

            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; ?></p>
            <?php endif;
            ?>
        </div>


        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class'     => 'top-menu',
            'depth'          => 1,
            'container'      => 'nav',
            'container_class' => 'top-menu-container'
        ));
        ?>
    </header>


    <div id="content" class="site-content">
