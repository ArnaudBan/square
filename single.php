<?php
/**
 * Single template
 */

get_header();


the_post();

?>

<div class="single-container">

    <div class="hentry-container">

        <article <?php post_class(); ?>>

            <header class="entry-header">

                <?php
                the_title( '<h1 class="entry-title">', '</h1>');
                ?>

                <div class="entry-meta">

                    <?php
                    if( 'project' == get_post_type() ){
                        get_template_part('parts/project', 'meta');
                    } else {

                        ?>
                        <div class="entry-date"><?php the_date() ?></div>
                        <?php
                    }
                    ?>

                </div>
            </header>


            <div class="entry-content">
                <?php the_content(); ?>
            </div>

        </article>

    </div>

    <?php
    $post_type = get_post_type();
    get_sidebar( $post_type );

    $archive_class = 'post-grid';
    $nb_related_post = 3;
    $related_post_title = __('Related posts', 'square');

    if( $post_type == 'project' ){

        $archive_class = 'project-grid';
        $nb_related_post = 2;
        $related_post_title = __('Related projects', 'square');
    }

    global $post;
    $topics = get_the_terms( $post, 'topic' );
    $topics_id = wp_list_pluck( $topics, 'term_id');

    $related_post_args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => $nb_related_post,
        'post__not_in'      => array( get_the_ID() ),
        'tax_query'         => array(
            array(
                array(
                    'taxonomy' => 'topic',
                    'field'    => 'id',
                    'terms'    => $topics_id,
                ),
            )
        ),
        'no_found_rows' => true
    );

    $related_post_query = new WP_Query( $related_post_args );

    if( $related_post_query->have_posts() ){

        ?>

        <div class="related-post">

            <h2 class="related-post-title"><?php echo $related_post_title; ?></h2>

            <div class="<?php echo $archive_class; ?>">

                <?php

                while ( $related_post_query->have_posts() ){
                    $related_post_query->the_post();

                    get_template_part('parts/content', get_post_type() );
                }


                wp_reset_query();
                ?>
            </div>

        </div>

        <?php
    }
    ?>
</div>

<?php

get_footer();