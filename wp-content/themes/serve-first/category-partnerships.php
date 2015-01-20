<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package serve-first
 */

get_header(); ?>

	<div id="primary" class="partnerships-content-area">
		<main id="main" class="site-main partnerships-site-main" role="main">
                    
                    <div class='making-a-difference'>
                        <h1 class='entry-title'>Our Partnerships</h1>
                        <p>Please click on the pictures below to see heartwarming letters we have received from the following organizations that Univera Serve First™ has donated products to.</p>
                    </div>
                <div class="partnership-box">
    
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content-partnerships', get_post_format() );
				?>

			<?php endwhile; ?>
			<div class="partnerships-paging-nav">
			<?php serve_first_paging_nav(); ?>
			</div>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
                </div><!---partnership box-->    
                    

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
