<?php
/**
 * Theme Customizer
 *
 * @package EducateUp_Kids
 */

function educateup_kids_customize_register( $wp_customize ) {

	require get_theme_file_path() . '/inc/customizer/categories.php';

	require get_theme_file_path() . '/inc/customizer/project.php';

	require get_theme_file_path() . '/inc/customizer/testimonial.php';

}
add_action( 'customize_register', 'educateup_kids_customize_register' );


function educateup_kids_customize_preview_js() {
	wp_enqueue_script( 'educateup-kids-customizer', get_stylesheet_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview', 'educateup-customizer' ), '1.0', true );
}
add_action( 'customize_preview_init', 'educateup_kids_customize_preview_js' );


function educateup_kids_custom_control_scripts() {
	wp_enqueue_script( 'educateup-kids-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'educateup-custom-controls-js' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'educateup_kids_custom_control_scripts' );

/*============= Active Callbacks =============*/

// Categories Section.
function educateup_kids_is_categories_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_kids_enable_categories_section' )->value() );
}

// Project Section.
function educateup_kids_is_project_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_kids_enable_project_section' )->value() );
}

// Testimonial Section.
function educateup_kids_is_testimonial_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_kids_enable_testimonial_section' )->value() );
}
