<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kidsvibe
 */
$sidebar_layout = kidsvibe_sidebar_layout();
if ( in_array( $sidebar_layout , array( 'no-sidebar', 'no-sidebar-content' ) ) ) {
	return;
}

$sidebar = 'sidebar-1';
if ( is_singular() ) {
	$sidebar = get_post_meta( get_the_ID(), 'kidsvibe-selected-sidebar', true );
	$sidebar = ! empty( $sidebar ) ? $sidebar : 'sidebar-1';
} elseif ( class_exists( 'WooCommerce' ) && ( is_shop() || is_product_category() || is_product_tag() ) ) {
	$sidebar = 'woocommerce-sidebar';
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->
