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


    <?php get_sidebar( get_post_type() ); ?>
</div>

<?php

get_footer();