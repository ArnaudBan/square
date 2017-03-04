<?php
/**
 * default parts
 *
 */

?><article <?php post_class(); ?>>

    <a href="<?php the_permalink() ?>" class="entry-link">
        <?php
        the_title( '<h2 class="entry-title">', '</h2>');
        ?>
    </a>

    <?php

    echo '<div class="entry-date">' . get_the_date() . '</div>';

    the_post_thumbnail( 'post-thumbnail' );

    echo '<div class="entry-content">';
    the_excerpt();
    echo '</div>';

echo '</article>';
