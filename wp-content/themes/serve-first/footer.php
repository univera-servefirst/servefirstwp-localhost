<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package serve-first
 */
?>
<!---back to top link-->
    <a href="#" class="back-to-top">Back to Top</a>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
            <?php get_sidebar('footer'); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'serve-first' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'serve-first' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'serve-first' ), 'Serve First', '<a href="http://amberalter.com" rel="designer">Amber</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
