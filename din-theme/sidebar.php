<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package din-theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-xs-6 col-sm-3 sidebar-offcanvas" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
