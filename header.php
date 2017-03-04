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

        <?php
        wp_nav_menu(array(
            'theme_location'    => 'primary',
            'menu_class'        => 'top-menu',
            'depth'             => 1,
            'container'         => 'nav',
            'container_class'   => 'top-menu-container',
            'container_id'      => 'top-menu',
        ));
        ?>

        <div class="site-branding">
            <?php
            $logo = get_custom_logo();

            if( $logo ){

                echo $logo;

            } else {

                if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif;

            }



            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; ?></p>
            <?php endif;
            ?>
        </div>

        <div class="contact-information">

        </div>

        <a class="menu-toggle" href="#top-menu">
            <svg id="burger" width="30" height="30" class="openmenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                <line class="top" x1="0" y1="8" x2="30" y2="8" stroke-width="2" vector-effect="non-scaling-stroke"/>
                <line class="mid" x1="0" y1="15" x2="30" y2="15" stroke-width="2" vector-effect="non-scaling-stroke"/>
                <line class="bottom" x1="0" y1="22" x2="30" y2="22" stroke-width="2" vector-effect="non-scaling-stroke"/>
            </svg>
        </a>

    </header>


    <div id="content" class="site-content">
