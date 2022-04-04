<?php
/**
 * KidsVibe Theme Customizer
 *
 * @package kidsvibe
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kidsvibe_customize_register( $wp_customize ) {
	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/controls.php';

	// Load callback functions.
	require get_template_directory() . '/inc/customizer/callbacks.php';

	// Load validation functions.
	require get_template_directory() . '/inc/customizer/validate.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'kidsvibe_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'kidsvibe_customize_partial_blogdescription',
		) );
	}

	// Register custom section types.
	$wp_customize->register_section_type( 'KidsVibe_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new KidsVibe_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'KidsVibe Pro', 'kidsvibe' ),
				'pro_text' => esc_html__( 'Buy Pro', 'kidsvibe' ),
				'pro_url'  => 'http://www.sharkthemes.com/downloads/kidsvibe-pro/',
				'priority'  => 10,
			)
		)
	);

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'kidsvibe_homepage_sections_panel' , array(
	    'title'      => esc_html__( 'Homepage Sections','kidsvibe' ),
	    'description'=> esc_html__( 'KidsVibe Homepage Sections.', 'kidsvibe' ),
	    'priority'   => 100,
	) );


	$sortable_sections = kidsvibe_sortable_sections();
	$sorted = kidsvibe_theme_option( 'sortable' );
	
	if ( ! empty( $sorted ) ) {
		$sorted = explode( ',' , $sorted );
		$sortable_sections = array_merge( array_flip( $sorted ), $sortable_sections );
	}

	foreach ( $sortable_sections as $key => $value ) {
			// Add sections.
			$wp_customize->add_section( 'kidsvibe_' . $key . '_section',
				array(
					'title' => $value,
					'priority'   => 100,
					'panel' => 'kidsvibe_homepage_sections_panel'
				)
			);

			require get_template_directory() . '/inc/customizer/homepage-sections/' . str_replace('_', '-', $key) . '-customizer.php';
		
	}


	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'kidsvibe_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','kidsvibe' ),
	    'description'=> esc_html__( 'KidsVibe Theme Options.', 'kidsvibe' ),
	    'priority'   => 100,
	) );

	// header settings
	require get_template_directory() . '/inc/customizer/header-customizer.php';

	// footer settings
	require get_template_directory() . '/inc/customizer/footer-customizer.php';
	
	// blog/archive settings
	require get_template_directory() . '/inc/customizer/blog-customizer.php';

	// single settings
	require get_template_directory() . '/inc/customizer/single-customizer.php';

	// page settings
	require get_template_directory() . '/inc/customizer/page-customizer.php';

	// global settings
	require get_template_directory() . '/inc/customizer/global-customizer.php';

}
add_action( 'customize_register', 'kidsvibe_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function kidsvibe_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function kidsvibe_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kidsvibe_customize_preview_js() {
	wp_enqueue_script( 'kidsvibe-customizer', get_template_directory_uri() . '/assets/js/customizer' . kidsvibe_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kidsvibe_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function kidsvibe_customize_control_js() {
	wp_enqueue_script( 'jquery-ui' );

	// Choose from select jquery.
	wp_enqueue_style( 'jquery-chosen', get_template_directory_uri() . '/assets/css/chosen' . kidsvibe_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen' . kidsvibe_min() . '.js', array( 'jquery' ), '1.4.2', true );

	// Choose fontawesome select jquery.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . kidsvibe_min() . '.css' );
	wp_enqueue_style( 'simple-iconpicker', get_template_directory_uri() . '/assets/css/simple-iconpicker' . kidsvibe_min() . '.css' );
	wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . kidsvibe_min() . '.js', array( 'jquery' ), '', true );

	// admin script
	wp_enqueue_style( 'kidsvibe-customizer-style', get_template_directory_uri() . '/assets/css/customizer' . kidsvibe_min() . '.css' );
	wp_enqueue_script( 'kidsvibe-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls' . kidsvibe_min() . '.js', array( 'jquery', 'jquery-chosen', 'jquery-simple-iconpicker' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'kidsvibe_customize_control_js' );

if ( ! function_exists( 'kidsvibe_reset_sortable_options' ) ) :
	/**
	 * Reset sortable options
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function kidsvibe_reset_sortable_options() {
		if ( true === kidsvibe_theme_option('sortable_reset') ) {

			$kidsvibe_default_options = kidsvibe_get_default_theme_options();
	  		$theme_data = wp_parse_args( get_theme_mod( 'kidsvibe_theme_options' ), $kidsvibe_default_options ) ;
	  		$sortable_update = array( 'sortable_reset' => false, 'sortable' => '' );
	  		$theme_data_update = array_replace( $theme_data, $sortable_update );

			// Reset sortable theme options.
			set_theme_mod( 'kidsvibe_theme_options', $theme_data_update );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'kidsvibe_reset_sortable_options' );
