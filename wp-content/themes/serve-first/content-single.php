<?php
/**
 * @package serve-first
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
            
            <?php
                /* translators: used between list items, there is a space after the comma */
                $category_list = get_the_category_list( __( ', ', 'serve-first' ) );

                if ( serve_first_categorized_blog() ) {
                    echo '<div class="category-list">' . $category_list . '</div>';
                }
            ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php serve_first_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'serve-first' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
            <!--this code prints out unordered list with icons from font awesome-->
		<?php
                    echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' );
                ?>

		<?php edit_post_link( __( 'Edit', 'serve-first' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
