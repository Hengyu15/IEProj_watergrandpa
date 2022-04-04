<?php
/**
 * EducateUp Kids functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EducateUp_Kids
 */

if ( ! function_exists( 'educateup_kids_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function educateup_kids_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'educateup-kids', get_stylesheet_directory() . '/languages' );
	}

endif;
add_action( 'after_setup_theme', 'educateup_kids_setup' );

if ( ! function_exists( 'educateup_kids_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function educateup_kids_enqueue_styles() {
		$parenthandle = 'educateup-style';
		$theme        = wp_get_theme();
		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'educateup-bootstrap-grid-style',
				'educateup-bootstrap-utilities-style',
				'educateup-bootstrap-icon-style',
				'educateup-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);
		wp_enqueue_style(
			'educateup-kids-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);
	}

endif;

add_action( 'wp_enqueue_scripts', 'educateup_kids_enqueue_styles' );


if ( ! function_exists( 'educateup_get_default_color' ) ) :
	/**
	 * Returns default colors.
	 */
	function educateup_get_default_color() {
		$color['primary']   = '#f98327';
		$color['secondary'] = '#ffd32a';
		return $color;
	}
endif;

/**
 * Add section link on customizer preview.
 */
function educateup_kids_section_link( $section_id ) {
	$section_name      = str_replace( 'educateup_kids_', ' ', $section_id );
	$section_name      = str_replace( '_', ' ', $section_name );
	$starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $starting_notation . $section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

if ( ! function_exists( 'educateup_kids_dynamic_css' ) ) :
	/**
	 * Dynamic CSS
	 */
	function educateup_kids_dynamic_css() {
		$default_color = educateup_get_default_color();

		$primary_color   = get_theme_mod( 'primary_color', $default_color['primary'] );
		$secondary_color = get_theme_mod( 'secondary_color', $default_color['secondary'] );

		$custom_css = '
		.popular-category-section .text-small,
        .popular-category-section h5 {
            color: ' . esc_attr( $primary_color ) . ';
        }

        .mission-section::before,
        .team-section::before,
        .team-section .media_img::before {
            background-color: ' . esc_attr( $primary_color ) . ';
        }
        
        .popular-category-section .gallery_item .gallery_item_img_wrap::after,
        .popular-course-section .card_list_inline_mid,
        .popular-course-section .card_list_inline,
        .popular-course-section .card:hover .card_media a,
		.popular-course-section .card:focus-within .card_media a {
            border-color: ' . esc_attr( $primary_color ) . ';
        }
        
        .project-list-item-content,
        .testimonial-section,
        .banner-section::before,
        .popular-course-section.pattern {
            background-color: ' . esc_attr( $secondary_color ) . ';
        }
        ';
		wp_add_inline_style( 'educateup-kids-style', $custom_css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'educateup_kids_dynamic_css', 99 );

require get_theme_file_path() . '/inc/customizer.php';
