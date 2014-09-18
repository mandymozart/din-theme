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

<div id="secondary" class="widget-area" role="complementary">
    <?
    $defaults = array(
    'theme_location'  => '',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => '',
    'container_id'    => '',
    'menu_class'      => '',
    'menu_id'         => 'main-menu',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 1,
    'walker'          => ''
    );
    ?>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
