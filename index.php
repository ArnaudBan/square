<?php
/**
 * main template
 */

get_header();

if( have_posts() ){


    $archive_tite = get_the_archive_title();
    $archive_description =  get_the_archive_description();
    ?>
    <div class="archive-page-header">

        <div class="archive-title-wrapper">
            <h1 class="archive-title"><?php echo $archive_tite; ?></h1>
        </div>
        <div class="archive-description-wrapper">
            <div class="archive-description"><?php echo $archive_description; ?></div>
        </div>
    </div>
    <?php

    echo '<div class="post-grid">';

    while ( have_posts() ){

        the_post();

        get_template_part( 'parts/content', get_post_type() );

    }
    echo '</div>';

    the_posts_pagination();
}


get_footer();