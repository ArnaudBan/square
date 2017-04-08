<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>

            </div><!-- .site-content -->

            <footer id="colophon" class="site-footer" role="contentinfo">
                <?php

                ab_square_display_social_media();

                $logo = get_custom_logo();

                if( $logo ){

                echo $logo;

                }
                ?>
            </footer><!-- .site-footer -->
        </div><!-- .site-inner -->
    </div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
