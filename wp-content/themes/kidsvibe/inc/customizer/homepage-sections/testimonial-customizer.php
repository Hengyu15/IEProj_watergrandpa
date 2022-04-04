<?php
/**
 * Testimonial Customizer Options
 *
 * @package kidsvibe
 */

// testimonial enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_testimonial]', array(
	'default'           => kidsvibe_theme_option('enable_testimonial'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_testimonial]', array(
	'label'             => esc_html__( 'Enable Testimonial', 'kidsvibe' ),
	'section'           => 'kidsvibe_testimonial_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// testimonial sub title chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[testimonial_sub_title]', array(
	'default'          	=> kidsvibe_theme_option('testimonial_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[testimonial_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_testimonial_section',
	'type'				=> 'text',
) );

// testimonial label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[testimonial_title]', array(
	'default'          	=> kidsvibe_theme_option('testimonial_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[testimonial_title]', array(
	'label'             => esc_html__( 'Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_testimonial_section',
	'type'				=> 'text',
) );

// testimonial control enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[testimonial_control]', array(
	'default'           => kidsvibe_theme_option('testimonial_control'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[testimonial_control]', array(
	'label'             => esc_html__( 'Show Dot Control', 'kidsvibe' ),
	'section'           => 'kidsvibe_testimonial_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

for ( $i = 1; $i <= 2; $i++ ) :

	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'kidsvibe_sanitize_page_post',
	) );

	$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_testimonial_section',
		'choices'			=> kidsvibe_page_choices(),
	) ) );

	// testimonial label chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[testimonial_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'kidsvibe_theme_options[testimonial_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_testimonial_section',
		'type'				=> 'text',
	) );

	$wp_customize->add_setting( 'kidsvibe_theme_options[testimonial_content_color_' . $i . ']', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kidsvibe_theme_options[testimonial_content_color_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Background Color %d', 'kidsvibe' ), $i ),
		'section'  => 'kidsvibe_testimonial_section',
	) ) );

	// testimonial hr control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[testimonial_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new KidsVibe_Horizontal_Line( $wp_customize, 'kidsvibe_theme_options[testimonial_custom_hr_' . $i . ']', array(
		'section'           => 'kidsvibe_testimonial_section',
	) ) );

endfor;
