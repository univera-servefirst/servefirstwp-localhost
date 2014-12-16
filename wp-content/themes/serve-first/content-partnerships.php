<?php
/**
 * @package serve-first
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
            if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { // Custom template for the first post on the front page
                if (has_post_thumbnail()) {
                    echo '<div class="front-index-thumbnail clear">';
                    echo '<div class="image-shifter">';
                    echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'serve-first') . get_the_title() . '" rel="bookmark">';
                    echo the_post_thumbnail('large-thumb');
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';
                } 
                echo '<div class="partnerships-index-box';
                if (has_post_thumbnail()) { echo ' has-thumbnail'; };
                echo '">';
            } else {
                echo '<div class="partnerships-index-box">';
                if (has_post_thumbnail()) {
                    echo '<div class="small-index-thumbnail clear">';
                    echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'serve-first') . get_the_title() . '" rel="bookmark">';
                    echo the_post_thumbnail('index-thumb');
                    echo '</a>';
                    echo '</div>';
                }
            }
            ?>
 
    </div><!-- .index-box-->
</article><!-- #post-## -->
