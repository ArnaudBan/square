<?php
/**
 * content part to display project meta
 */
?>
<div class="project-offers-list">
    <?php
    $offers = get_the_terms( get_the_ID(), 'offer' );

    if( $offers && ! is_wp_error( $offers ) ){
        $sep = '';

        foreach ( $offers as $term_offer ){
            echo "$sep<span class='term-offer'>{$term_offer->name}</span>";

            $sep = ' / ';
        }
    }
    ?>
</div>

<div class="project-meta">
    <?php
    $meta_to_display = array(
        'team' => __('Team', 'square'),
        'client' => __('Client', 'square'),
    );

    foreach ( $meta_to_display as $meta => $label ){

        $value = get_post_meta( get_the_ID(), $meta, true);

        if( $value ){
            echo "<p><span class='meta-label'>{$label}</span> : <span class='meta-value'>{$value}</span></p>";
        }
    }
    ?>
</div>
