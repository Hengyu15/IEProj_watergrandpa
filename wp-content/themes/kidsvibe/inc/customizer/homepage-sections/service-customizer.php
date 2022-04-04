<?php
/**
 * Service Customizer Options
 *
 * @package kidsvibe
 */

// service menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_service]', array(
	'default'           => kidsvibe_theme_option('enable_service'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_service]', array(
	'label'             => esc_html__( 'Enable Service', 'kidsvibe' ),
	'section'           => 'kidsvibe_service_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// service sub title chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[service_sub_title]', array(
	'default'          	=> kidsvibe_theme_option('service_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[service_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_service_section',
	'type'				=> 'text',
) );

// service label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[service_title]', array(
	'default'          	=> kidsvibe_theme_option('service_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[service_title]', array(
	'label'             => esc_html__( 'Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_service_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 6; $i++ ) :

	// service menu enable setting and control.
	$wp_customize->add_setting( 'kidsvibe_theme_options[service_icon_' . $i . ']', array(
		// 'default'           => kidsvibe_theme_option('service_icon_' . $i . ''),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new KidsVibe_Icon_Picker_Control( $wp_customize, 'kidsvibe_theme_options[service_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_service_section',
		'type' 				=> 'icon_picker',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'kidsvibe_sanitize_page_post',
	) );

	$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_service_section',
		'choices'			=> kidsvibe_page_choices(),
	) ) );

	$wp_customize->add_setting( 'kidsvibe_theme_options[service_content_color_' . $i . ']', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kidsvibe_theme_options[service_content_color_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Background Color %d', 'kidsvibe' ), $i ),
		'section'  => 'kidsvibe_service_section',
	) ) );

	// service hr control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[service_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new KidsVibe_Horizontal_Line( $wp_customize, 'kidsvibe_theme_options[service_custom_hr_' . $i . ']', array(
		'section'           => 'kidsvibe_service_section',
	) ) );

endfor;
