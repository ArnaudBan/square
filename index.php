<?php
/**
 * main template
 */

get_header();

if( have_posts() ){

    echo '<div class="post-grid">';

    while ( have_posts() ){

        the_post();

        get_template_part( 'parts/content', get_post_type() );

    }
    echo '</div>';

    the_posts_pagination();
}


get_footer();