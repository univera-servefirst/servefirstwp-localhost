<?php
/**
 * The sidebar containing the main widget area for Get Involved and sub pages.
 *
 * @package serve-first
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
</div><!-- #secondary -->