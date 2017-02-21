<?php
/**
 * main template
 */

get_header();

if( have_posts() ){

    while ( have_posts() ){

        the_post();

        get_template_part( 'parts/content', get_post_type() );

    }

    the_posts_pagination();
}


get_footer();