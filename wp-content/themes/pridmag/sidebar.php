<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prid_Mag
 */

$pridmag_sidebar_layout = pridmag_get_layout();

if ( $pridmag_sidebar_layout === 'th-content-centered' || $pridmag_sidebar_layout === 'th-no-sidebar' ) {
	return;
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
