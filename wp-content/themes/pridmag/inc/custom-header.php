<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package PridMag
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses pridmag_header_style()
 */
function pridmag_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'pridmag_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1400,
		'height'                 => 400,
		'flex-width'			 => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'pridmag_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'pridmag_custom_header_setup' );

if ( ! function_exists( 'pridmag_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see pridmag_custom_header_setup().
	 */
	function pridmag_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;


/**
 * Displays header image.
 */
function pridmag_header_image() {

$header_image = get_header_image();

if ( ! empty ( $header_image ) ) : 
	
	$pridmag_link_header_image = get_theme_mod( 'pridmag_link_header_image', true );
	echo '<div class="th-header-image">';
		if ( $pridmag_link_header_image === true ) { echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">'; }
			echo '<img src="' . esc_url ( $header_image ) . '" height="' . esc_attr( get_custom_header()->height ) . '" width="' . esc_attr( get_custom_header()->width ) . '" alt="" />';
		if ( $pridmag_link_header_image === true ) { echo '</a>'; }
	echo '</div>';

endif;

}