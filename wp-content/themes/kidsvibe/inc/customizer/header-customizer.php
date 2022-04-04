<?php
/**
 * Header Customizer Options
 *
 * @package kidsvibe
 */

// Add header section
$wp_customize->add_section( 'kidsvibe_header_section', array(
	'title'             => esc_html__( 'Header Section','kidsvibe' ),
	'description'       => esc_html__( 'Header Setting Options', 'kidsvibe' ),
	'panel'             => 'kidsvibe_theme_options_panel',
) );

// header sticky setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_sticky_header]', array(
	'default'           => kidsvibe_theme_option( 'enable_sticky_header' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_sticky_header]', array(
	'label'             => esc_html__( 'Make Header Sticky', 'kidsvibe' ),
	'section'           => 'kidsvibe_header_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );


// header layout control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[header_layout]', array(
	'default'          	=> kidsvibe_theme_option('header_layout'),
	'sanitize_callback' => 'kidsvibe_sanitize_select',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[header_layout]', array(
	'label'             => esc_html__( 'Header Layout', 'kidsvibe' ),
	'section'           => 'kidsvibe_header_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'normal-header' 	=> esc_html__( 'Normal', 'kidsvibe' ),
		'center-header' 	=> esc_html__( 'Center Align', 'kidsvibe' ),
	),
) );
