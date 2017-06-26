<?php
/**
 * Page template
 */

get_header();


the_post();

?>

    <div class="page-container">

        <div class="hentry-container">

            <article <?php post_class(); ?>>

                <header class="entry-header archive-title-wrapper">

                    <?php
                    the_title( '<h1 class="entry-title archive-title">', '</h1>');
                    ?>

                </header>


                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

            </article>

        </div>

    </div>

<?php

get_footer();