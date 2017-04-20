<?php
/**
 *  Parts to show project in archive view
 *
 */

?><article <?php post_class(); ?>>

    <div class="thumbnail-wrapper">
        <?php
        the_post_thumbnail( 'square' );
        ?>
    </div>

    <div class="project-content-wrapper">

        <a href="<?php the_permalink() ?>" class="entry-link">
            <?php
            the_title( '<h2 class="entry-title">', '</h2>');
            ?>
        </a>

        <?php get_template_part('parts/project', 'meta'); ?>


    </div>

</article>
