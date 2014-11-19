<?php
/**
 * The footer widgets
 *
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return; //if no widgets added then don't display
}
?>

<div id="supplementary">
	<div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- #footer-sidebar -->
</div><!-- #supplementary -->