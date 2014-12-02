<?php
/**
 * The custom template for the one-page style front page.
 *
 * 
 */

get_header(); ?>

	<div id="primary" class="content-area front-page">
		<main id="main" class="site-main" role="main">

                    <section id="call-to-action">
                        <div class="indent clear">
                                        <?php 
                                        $query = new WP_Query( 'pagename=book-an-appointment' );
                                        // The Loop
                                        if ( $query->have_posts() ) {
                                                while ( $query->have_posts() ) {
                                                        $query->the_post();
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
                        <div class="indent">
                        Testimonials
                        </div>
                    </section>
                
                
                   
                <section id="services">
                        <div class="indent clear">
                                <?php 
                                $query = new WP_Query( 'pagename=services' );
                                $services_id = $query->queried_object->ID;

                                // The Loop
                                if ( $query->have_posts() ) {
                                        while ( $query->have_posts() ) {
                                                $query->the_post();
                                                echo '<h2 class="section-title">' . get_the_title() . '</h2>';
                                                echo '<div class="entry-content">';
                                                the_content('');
                                                echo '</div>';
                                        }
                                }

                                /* Restore original Post Data */
                                wp_reset_postdata();

                                $args = array(
                                        'post_type' => 'page',
                                        'post_parent' => $services_id
                                );
                                $services_query = new WP_Query( $args );

                                // The Loop
                                if ( $services_query->have_posts() ) {

                                        echo '<ul class="services-list">';
                                        while ( $services_query->have_posts() ) {
                                                $services_query->the_post();
                                                echo '<li class="clear">';
                                                echo '<a href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">';
                                                echo '<h3 class="services-title">' . get_the_title() . '</h3>';
                                                echo '</a>';
                                                echo '<div class="services-lede">';
                                                the_content();
                                                echo '</div>';
                                                echo '</li>';
                                        }
                                        echo '</ul>';
                                }

                                /* Restore original Post Data */
                                wp_reset_postdata();
                                ?>
                        </div><!-- .indent -->
                </section><!--#services-->
			
                <section id="meet">
                        <div class="indent clear">
                                <?php 
                                $query = new WP_Query( 'pagename=meet-dr-britton' );
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
