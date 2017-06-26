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
                <div class="contact-information">
                    <?php
                    ab_square_display_social_media();

                    $tel = get_theme_mod( 'telephone' );
                    $email = get_theme_mod( 'Email' );
                    echo "<p>$tel</p>";
                    echo "<p>$email</p>";
                    ?>
                </div>
                <?php


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
