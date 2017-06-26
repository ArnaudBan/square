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

    global $post;
    $topics = get_the_terms( $post, 'topic' );
    if( $topics && ! is_wp_error( $topics ) ){

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

            // Related news
            ?>
            <h2 class="related-post-title sidebar-title">
                <?php
                'project' == $post_type ?
                    _e('Related News', 'square'):
                    _e('Related Projects', 'square'); ?>
            </h2>
            <?php


            while ( $related_new_query->have_posts() ){
                $related_new_query->the_post();

                get_template_part('parts/content', get_post_type() );
            }


            wp_reset_query();
        }
    }

    $more = get_post_meta( get_the_ID(), 'project-more', true);

    if( $more ){

        $more_title = __('Learn More', 'square');

        echo '<div class="sidebar-more">';
        echo "<h2 class='sidebar-more-title sidebar-title'>{$more_title}</h2>";
        echo $more;
        echo '</div>';
    }
    ?>

</aside>
