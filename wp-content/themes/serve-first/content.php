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
                echo '<div class="index-box';
                if (has_post_thumbnail()) { echo ' has-thumbnail'; };
                echo '">';
            } else {
                echo '<div class="index-box">';
                if (has_post_thumbnail()) {
                    echo '<div class="small-index-thumbnail clear">';
                    echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'serve-first') . get_the_title() . '" rel="bookmark">';
                    echo the_post_thumbnail('index-thumb');
                    echo '</a>';
                    echo '</div>';
                }
            }
            ?>
	<header class="entry-header">
            
            <?php
                if (is_sticky()){
                    echo '<i class="fa fa-thumb-tack sticky-post"></i>';
                }
            ?>
              <?php
                /* translators: used between list items, there is a space after the comma */
                $category_list = get_the_category_list( __( ', ', 'serve-first' ) );

                if ( serve_first_categorized_blog() ) {
                    echo '<div class="category-list">' . $category_list . '</div>';
                }
            ?>
            
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php serve_first_posted_on(); ?>
                    <?php 
                        if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
                            echo '<span class="comments-link">';
                            comments_popup_link( __( 'Leave a comment', 'serve-first' ), __( '1 Comment', 'serve-first' ), __( '% Comments', 'serve-first' ) );
                            echo '</span>';
                        }
                    ?>
                    		<?php edit_post_link( __( 'Edit', 'serve-first' ), '<span class="edit-link">', '</span>' ); ?>

		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php 
        if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { 
            echo '<div class="entry-content">';
            the_content( __( '', 'serve-first' ) );
            echo '</div>';
            echo '<footer class="entry-footer continue-reading">';
            echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'serve-first') . get_the_title() . '" rel="bookmark">Read the article<i class="fa fa-arrow-circle-o-right"></i></a>'; 
            echo '</footer><!-- .entry-footer -->';
        } else { ?>
            <div class="entry-content">
            <?php the_excerpt(); ?>
            </div><!-- .entry-content -->
            <footer class="entry-footer continue-reading">
            <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'serve-first') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
            </footer><!-- .entry-footer -->
        <?php } ?>
	
    </div><!-- .index-box-->
</article><!-- #post-## -->