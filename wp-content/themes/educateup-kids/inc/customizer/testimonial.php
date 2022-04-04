<?php
/**
 * Testimonial Section
 *
 * @package EducateUp_Kids
 */

$wp_customize->add_section(
	'educateup_kids_testimonial_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Testimonial Section', 'educateup-kids' ),
	)
);

// Testimonial Section - Enable Section.
$wp_customize->add_setting(
	'educateup_kids_enable_testimonial_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_kids_enable_testimonial_section',
		array(
			'label'    => esc_html__( 'Enable Testimonial Section', 'educateup-kids' ),
			'section'  => 'educateup_kids_testimonial_section',
			'settings' => 'educateup_kids_enable_testimonial_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_kids_enable_testimonial_section',
		array(
			'selector' => '#educateup_kids_testimonial_section .section-link',
			'settings' => 'educateup_kids_enable_testimonial_section',
		)
	);
}

// Testimonial Section - Section Title.
$wp_customize->add_setting(
	'educateup_kids_testimonial_section_title',
	array(
		'default'           => __( 'What Students Says', 'educateup-kids' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_kids_testimonial_section_title',
	array(
		'label'           => esc_html__( 'Section Title', 'educateup-kids' ),
		'section'         => 'educateup_kids_testimonial_section',
		'settings'        => 'educateup_kids_testimonial_section_title',
		'type'            => 'text',
		'active_callback' => 'educateup_kids_is_testimonial_section_enabled',
	)
);

// Testimonial Section - Section Subtitle.
$wp_customize->add_setting(
	'educateup_kids_testimonial_section_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_kids_testimonial_section_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'educateup-kids' ),
		'section'         => 'educateup_kids_testimonial_section',
		'settings'        => 'educateup_kids_testimonial_section_subtitle',
		'type'            => 'text',
		'active_callback' => 'educateup_kids_is_testimonial_section_enabled',
	)
);

for ( $i = 1; $i <= 4; $i++ ) {

	// Testimonial Section - Select Page.
	$wp_customize->add_setting(
		'educateup_kids_testimonial_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'educateup_kids_testimonial_content_page_' . $i,
		array(
			'label'           => esc_html__( 'Select Page ', 'educateup-kids' ) . $i,
			'section'         => 'educateup_kids_testimonial_section',
			'settings'        => 'educateup_kids_testimonial_content_page_' . $i,
			'active_callback' => 'educateup_kids_is_testimonial_section_enabled',
			'type'            => 'select',
			'choices'         => educateup_get_page_choices(),
		)
	);

	// Testimonial Section - Designation.
	$wp_customize->add_setting(
		'educateup_kids_testimonial_position_' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'educateup_kids_testimonial_position_' . $i,
		array(
			'label'           => esc_html__( 'Designation ', 'educateup-kids' ) . $i,
			'section'         => 'educateup_kids_testimonial_section',
			'settings'        => 'educateup_kids_testimonial_position_' . $i,
			'active_callback' => 'educateup_kids_is_testimonial_section_enabled',
		)
	);

}
