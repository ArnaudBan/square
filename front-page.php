<?php
/**
 * Page d'acceuil
 *
 */
get_header();

// Présentation
if( have_posts() ){

    the_post();
    ?>
    <div class="archive-page-header front-page-header">

        <div class="archive-title-wrapper">
            <h1 class="archive-title"><?php the_title(); ?></h1>
        </div>
        <div class="archive-description-wrapper">
            <div class="archive-description"><?php the_content(); ?></div>
        </div>
    </div>
    <?php
}

// Offres
$offers = get_terms( array ( 'taxonomy' => 'offer') );
echo '<div class="post-grid offer-grid">';
foreach ( $offers as $offer ){
    echo '<div class="hentry">';
    echo wp_get_attachment_image( get_field( 'icon', $offer ), 'medium' );
    echo "<h2 class='offer-title'>{$offer->name}</h2>";
    echo wpautop( $offer->description );
    echo '</div>';
}
echo '</div>';

// Projets
$latest_projects = new WP_Query( array(
    'post_type'         => 'project',
    'posts_per_page'    => 2,
    'no_found_rows'     => true,
));
if( $latest_projects->have_posts() ){

    ?>
    <div class="front-project-container project-grid">

        <div class="archive-title-wrapper">
            <h1 class="archive-title"><?php _e('Projets', 'square'); ?></h1>
        </div>

        <?php


        while ( $latest_projects->have_posts() ){

            $latest_projects->the_post();

            get_template_part( 'parts/content', get_post_type() );

        }
        ?>

        <a href="<?php echo get_post_type_archive_link( 'project') ?>" class="archive-link">
            <h2 class="archive-title"><?php _e('See all project', 'square'); ?></h2>
        </a>
    </div>
    <?php
}


// News
$latest_news = new WP_Query( array(
    'post_type'         => 'post',
    'posts_per_page'    => 2,
    'no_found_rows'     => true,
));
if( $latest_news->have_posts() ){

    ?>

    <div class='post-grid archive-page-header front-page-post-grid'>
        <div class="archive-title-wrapper">
            <h1 class="archive-title"><?php _e('News', 'square'); ?></h1>
        </div>
        <?php
        while ( $latest_news->have_posts() ){

            $latest_news->the_post();

            get_template_part( 'parts/content', get_post_type() );

        }
        ?>
    </div>
    <?php

}


get_footer();