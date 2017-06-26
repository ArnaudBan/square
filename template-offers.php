<?php
/**
 * Template Name: Solutions
 */

get_header();


the_post();

?>

    <div class="page-container">

        <div class="hentry-container">

            <article <?php post_class( 'page-offer' ); ?>>

                <header class="entry-header archive-title-wrapper">

                    <?php
                    the_title( '<h1 class="entry-title archive-title">', '</h1>');
                    ?>

                </header>

                <div class="entry-content-flex">

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    // Offres

                    $offers = get_terms( array ( 'taxonomy' => 'offer', 'hide_empty' => false) );
                    $meta_offer = get_post_meta( get_the_ID(), 'meta-offer', true );

                    echo '<div class="offer-list">';

                    foreach ( $offers as $offer ){

                        ?>
                        <div class="offer-wrapper">

                            <div class="offer-header">

                                <div class="offer-header-flex-img">
                                    <?php
                                    if( function_exists( 'get_field' ) ){
                                        $icon_id = get_field( 'icon', $offer );
                                        if( $icon_id ){

                                            echo wp_get_attachment_image( $icon_id, 'medium', false, array( 'class' => 'offer-icon') );
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="offer-header-flex-title">
                                    <h2 class='offer-title'><?php echo $offer->name; ?></h2>
                                    <?php echo wpautop( $offer->description ); ?>
                                </div>
                            </div>

                            <?php
                            if( $meta_offer ){

                                $description = isset( $meta_offer[ $offer->term_id ]['description'] ) ? $meta_offer[ $offer->term_id ]['description'] : '';
                                ?>
                                <div class="offer-content">

                                    <?php
                                    echo '<div class="page-offer-grid">';
                                    for( $i = 1; $i <= 3; $i++ ) {
                                        $content = isset($meta_offer[$offer->term_id]['row-' . $i]) ? $meta_offer[$offer->term_id]['row-' . $i] : '';
                                        if( $content ){

                                            echo '<div class="page-offer-row">' . wpautop( $content ) . '</div>';
                                        }
                                    }

                                    if( $description ){
                                        echo '<div class="offer-example">' . wpautop( $description ) . '</div>';
                                    }
                                    echo '</div>';
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }

                    echo '</div>';
                    ?>
                </div>


            </article>

        </div>

    </div>

<?php

get_footer();