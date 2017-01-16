<?php
/**
 * default parts
 *
 */

?>
<article <?php post_class(); ?>>

    <a href="<?php the_permalink() ?>">
        <?php
        the_title( '<h2 class="entry-title">', '<h2>');
        ?>
    </a>

    <?php

    echo get_the_date();

    the_post_thumbnail();

    echo '<div class="entry-content">';
    the_excerpt();
    echo '</div>';
    ?>

</article>
