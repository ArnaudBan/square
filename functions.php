<?php
/**
 * The theme functions
 */



/**
 * Include de tous les fichiers dans /inc
 *
 */

foreach (glob( plugin_dir_path( __FILE__ ) . "/inc/*.php" ) as $filename){
    require_once $filename;
}



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

    add_theme_support( 'custom-header', array(
        'default-image'          => '',
        'width'                  => 630,
        'height'                 => 400,
        'flex-height'            => true,
        'flex-width'             => true,
        'uploads'                => true,
        'random-default'         => false,
        'header-text'            => false,
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


add_action( 'wp_enqueue_scripts', 'ab_square_enqueue_scripts' );

function ab_square_enqueue_scripts() {

    // Css
    wp_enqueue_style( 'ab_square', get_template_directory_uri() . '/css/screen.min.css', array(), '20170220' );

    // Js
    wp_enqueue_script( 'webfontloader', 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js', array(), '1', true);
    wp_enqueue_script( 'ab_square-scripts', get_template_directory_uri() . '/minjs/scripts.min.js', array( 'webfontloader' ), '20170220', true);

    // localize
    wp_localize_script( 'ab_square-scripts', 'scripts_l10n', array(
        'svgSpriteUrl' => get_template_directory_uri() . '/css/img/svg-social-media.svg',

    ) );

}


add_action( 'customize_register', 'ab_square_customize_register' );

function ab_square_customize_register( $wp_customize ) {

    $all_supported_social_media = array( 'twitter-alt', 'facebook' );

    foreach ( $all_supported_social_media as $social_media ){
        $wp_customize->add_setting( $social_media, array(
            'type' => 'theme_mod', // or 'option'
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( $social_media, array(
            'type' => 'url',
            'section' => 'square_theme_options', // Required, core or custom.
            'label' => $social_media,
        ) );
    }

    $wp_customize->add_setting( 'telephone', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'telephone', array(
        'type' => 'tel',
        'section' => 'square_theme_options', // Required, core or custom.
        'label' => __('Téléphone', 'square'),
    ) );
    $wp_customize->add_setting( 'Email', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'Email', array(
        'type' => 'email',
        'section' => 'square_theme_options', // Required, core or custom.
        'label' => __('Email', 'square'),
    ) );

    $wp_customize->add_section( 'square_theme_options', array(
        'title'         => __( 'Theme options', 'square' ),
        'capability'    => 'edit_theme_options',
    ) );
}


function ab_square_display_social_media(){

    $all_supported_social_media = array( 'twitter-alt', 'facebook' );

    echo '<div class="social-media-menu">';

    foreach ( $all_supported_social_media as $social_media ){

        $social_media_url = get_theme_mod( $social_media );

        if( $social_media_url ){
            echo "<a href='{$social_media_url}' class='social-link'><svg class='icon icon-social'><use xlink:href='#{$social_media}'></use></svg></a>";
        }

    }

    echo '</div>';

}