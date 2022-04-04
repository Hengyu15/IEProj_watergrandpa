<?php
/**
 * Page Customizer Options
 *
 * @package kidsvibe
 */

// Add excerpt section
$wp_customize->add_section( 'kidsvibe_page_section', array(
	'title'             => esc_html__( 'Page Setting','kidsvibe' ),
	'description'       => esc_html__( 'Page Setting Options', 'kidsvibe' ),
	'panel'             => 'kidsvibe_theme_options_panel',
) );

// frontpage setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_front_page]', array(
	'default'           => kidsvibe_theme_option( 'enable_front_page' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_front_page]', array(
	'label'             => esc_html__( 'Show Static Front Page', 'kidsvibe' ),
	'section'           => 'kidsvibe_page_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'kidsvibe_sanitize_select',
	'default'             => kidsvibe_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new KidsVibe_Radio_Image_Control ( $wp_customize, 'kidsvibe_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'kidsvibe' ),
	'section'             => 'kidsvibe_page_section',
	'choices'			  => kidsvibe_sidebar_position(),
) ) );
