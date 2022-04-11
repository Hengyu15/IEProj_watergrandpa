<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Prid_Mag
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function pridmag_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'type'		=> 'click',
		'container' => 'main',
		'render'    => 'pridmag_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

}
add_action( 'after_setup_theme', 'pridmag_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function pridmag_infinite_scroll_render() {

	$pridmag_post_listing_layout = get_theme_mod( 'pridmag_post_listing_layout', 'th-list-posts' );
	echo '<div class="th-posts-wrap ' . esc_attr( $pridmag_post_listing_layout ) . '">';

	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_type() );
		endif;
	}

	echo '</div>';
}
