<?php
/**
 * main template
 */

get_header();

while ( have_posts() ){

    the_post();

    get_template_part( 'parts/content', get_post_type() );

}

get_footer();