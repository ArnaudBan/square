<?php
/**
 * The theme functions
 */


add_action( 'after_setup_theme', 'ab_square_setup' );

function ab_square_setup() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );


    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 390, 180, true );
    add_image_size( 'square', 640, 640, true);


    add_theme_support( 'custom-logo', array(
        'height'      => 170,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );


    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'square' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Indicate widget sidebars can use selective refresh in the Customizer.
    add_theme_support( 'customize-selective-refresh-widgets' );
}

function ab_square_enqueue_scripts() {

    // Css
    wp_enqueue_style( 'ab_square', get_template_directory_uri() . '/css/screen.min.css', array(), '20170220' );

    // Js
    wp_enqueue_script( 'webfontloader', 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js', array(), '1', true);
    wp_enqueue_script( 'ab_square-scripts', get_template_directory_uri() . '/minjs/scripts.min.js', array( 'webfontloader' ), '20170220', true);

}
add_action( 'wp_enqueue_scripts', 'ab_square_enqueue_scripts' );