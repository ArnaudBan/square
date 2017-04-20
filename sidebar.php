<?php
/**
 * The default sidebar
 */
?>
<aside class="site-sidebar">

    <?php
    $size = 'project' == get_post_type() ? 'square' : 'large';
    the_post_thumbnail( $size);
    ?>

</aside>
