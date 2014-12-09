<?php
/**
 * The custom template for the one-page style front page.
 *
 * 
 */

get_header(); ?>
<?php 
global $more; //allows truncation of page content displayed on single page view
?>

	<div id="primary" class="content-area front-page">
		<main id="main" class="site-main" role="main">

                    <section id="call-to-action">
                        <div class="indent clear">
                                        <?php 
                                        $query = new WP_Query( 'pagename=about' );
                                        // The Loop
                                        if ( $query->have_posts() ) {
                                                while ( $query->have_posts() ) {
                                                        $query->the_post();
                                                        $more = 0; //sets more variable to false
                                                        echo '<div class="entry-content">';
                                                        the_content();
                                                        echo '</div>';
                                                }
                                        }

                                        /* Restore original Post Data */
                                        wp_reset_postdata();
                                        ?>
                        </div><!-- .indent -->
                </section><!-- #call-to-action -->
                
                 <section id="testimonials">
                        <div class="indent clear">
                                <?php 
                                $args = array(
                                        'posts_per_page' => 2,
                                        'orderby' => 'ID',
                                        'order' =>'ASC',
                                        'category_name' => 'statistics'
                                );

                                $query = new WP_Query( $args );
                                // The Loop
                                if ( $query->have_posts() ) {
                                        echo '<ul class="testimonials">';
                                        while ( $query->have_posts() ) {
                                                $query->the_post();
                                                $more = 0; //sets more variable to false
                                                echo '<li class="clear">';
                                                echo '<figure class="testimonial-thumb">';
                                                the_post_thumbnail('testimonial-mug');
                                                echo '</figure>';
                                                echo '<aside class="testimonial-text">';
                                                echo '<h3 class="testimonial-name">' . get_the_title() . '</h3>';
                                                echo '<div class="testimonial-excerpt">';
                                                the_content('');
                                                echo '</div>';
                                                echo '</aside>';
                                                echo '</li>';
                                        }
                                        echo '</ul>';
                                }

                                /* Restore original Post Data */
                                wp_reset_postdata();
                                ?>
                        </div><!-- .indent -->
                </section><!-- #testimonials -->
                
                  
                
                
                   
                
			
                <section id="meet">
                        <div class="indent clear">
                                <?php 
                                $query = new WP_Query( 'pagename=map' );
                                // The Loop
                                if ( $query->have_posts() ) {
                                        while ( $query->have_posts() ) {
                                                $query->the_post();
                                                echo '<h2 class="section-title">' . get_the_title() . '</h2>';
                                                echo '<div class="entry-content">';
                                                the_content();
                                                echo '</div>';
                                        }
                                }

                                /* Restore original Post Data */
                                wp_reset_postdata();
                                ?>
                        </div><!-- .indent -->
                </section><!-- #meet -->

                <section id="contact">
                        <div class="indent clear">
                                <?php 
                                $query = new WP_Query( 'pagename=contact' );
                                // The Loop
                                if ( $query->have_posts() ) {
                                        while ( $query->have_posts() ) {
                                                $query->the_post();
                                                echo '<h2 class="section-title">' . get_the_title() . '</h2>';
                                                echo '<div class="entry-content">';
                                                the_content();
                                                echo '</div>';
                                        }
                                }

                                /* Restore original Post Data */
                                wp_reset_postdata();
                                ?>
                        </div><!-- .indent -->
                </section><!-- #contact -->
                

			

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
