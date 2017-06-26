<?php
/**
 * Created by PhpStorm.
 * User: goliath
 * Date: 05/06/2017
 * Time: 14:29
 */


add_action( 'add_meta_boxes_page', 'square_add_page_offer_metabox', 10, 2);
/**
 * Register offers page metabox
 *
 */
function square_add_page_offer_metabox( $post )
{

    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

    if($pageTemplate == 'template-offers.php' ){

        add_meta_box( 'page_offer_metabox', __( 'Offers', 'square' ) , 'square_page_offers_metabox_display', 'page' );
    }

}
/**
 * Display the upload file metabox
 *
 */
function square_page_offers_metabox_display( $post )
{

    wp_nonce_field( 'square_meta_offers_nonce', 'secure_document_nonce_name');


    $meta_offer = get_post_meta( $post->ID, 'meta-offer', true );

    $offers = get_terms( array ( 'taxonomy' => 'offer', 'hide_empty' => false ) );

    if( $offers ){

        foreach ( $offers as $offer ){

            $term_id = $offer->term_id;

            $description = isset( $meta_offer[ $term_id ]['description'] ) ? $meta_offer[ $term_id ]['description'] : '';
            ?>
            <div>
                <h3><?php echo $offer->name; ?></h3>
                <table class="form-table">
                    <tr>
                        <th><label for="<?php echo $term_id; ?>-description"><?php _e('Description', 'square'); ?></label></th>
                        <td>
                            <textarea id="<?php echo $term_id; ?>-description" name="meta-offer[<?php echo $term_id; ?>][description]" class="large-text" rows="4"><?php echo $description ?></textarea>
                        </td>
                    </tr>
                    <?php
                    for( $i = 1; $i <= 3; $i++ ){
                        $content = isset( $meta_offer[ $term_id ]['row-'. $i] ) ? $meta_offer[ $term_id ]['row-'. $i]  : '';
                        ?>
                        <tr>
                            <th><label for="<?php echo "{$term_id}-row-{$i}"; ?>"><?php printf( __('Col %d', 'square'), $i ); ?></label></th>
                            <td>
                                <textarea id="<?php echo "{$term_id}-row-{$i}"; ?>" name="meta-offer[<?php echo $term_id; ?>][row-<?php echo $i; ?>]" class="large-text" rows="4"><?php echo $content ?></textarea>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php
        }
    }

}
add_action( 'save_post_page', 'goliath_secure_documents_save_file_and_meta');
function goliath_secure_documents_save_file_and_meta( $post_id )
{
    if( isset( $_POST['secure_document_nonce_name'] ) && check_admin_referer( 'square_meta_offers_nonce','secure_document_nonce_name' ) ){

        update_post_meta( $post_id, 'meta-offer', $_POST['meta-offer']  );

    }
}