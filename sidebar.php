<?php
/**
 * The default sidebar
 */
?>
<aside class="site-sidebar">

    <?php
    $post_type = get_post_type();

    $size = 'project' == $post_type ? 'square' : 'large';
    the_post_thumbnail( $size);

    // Related news
    ?>
    <h2 class="related-post-title"><?php _e('Related News', 'square'); ?></h2>
    <?php
    global $post;
    $topics = get_the_terms( $post, 'topic' );
    $topics_id = wp_list_pluck( $topics, 'term_id');

    $related_new_args = array(
        'post_type'         => 'project' == $post_type ? 'post' : 'project',
        'posts_per_page'    => 3,
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

    $related_new_query = new WP_Query( $related_new_args );

    if( $related_new_query->have_posts() ){


        while ( $related_new_query->have_posts() ){
            $related_new_query->the_post();

            get_template_part('parts/content', get_post_type() );
        }


        wp_reset_query();
    }
    ?>

</aside>
