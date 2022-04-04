<?php
/**
 * Global Customizer Options
 *
 * @package kidsvibe
 */

// Add Global section
$wp_customize->add_section( 'kidsvibe_global_section', array(
	'title'             => esc_html__( 'Global Setting','kidsvibe' ),
	'description'       => esc_html__( 'Global Setting Options', 'kidsvibe' ),
	'panel'             => 'kidsvibe_theme_options_panel',
) );

// breadcrumb setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_breadcrumb]', array(
	'default'           => kidsvibe_theme_option( 'enable_breadcrumb' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_breadcrumb]', array(
	'label'             => esc_html__( 'Enable Breadcrumb', 'kidsvibe' ),
	'section'           => 'kidsvibe_global_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// site layout setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[site_layout]', array(
	'sanitize_callback'   => 'kidsvibe_sanitize_select',
	'default'             => kidsvibe_theme_option('site_layout'),
) );

$wp_customize->add_control(  new KidsVibe_Radio_Image_Control ( $wp_customize, 'kidsvibe_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'kidsvibe' ),
	'section'             => 'kidsvibe_global_section',
	'choices'			  => kidsvibe_site_layout(),
) ) );

// loader setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_loader]', array(
	'default'           => kidsvibe_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'kidsvibe' ),
	'section'           => 'kidsvibe_global_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[loader_type]', array(
	'default'          	=> kidsvibe_theme_option('loader_type'),
	'sanitize_callback' => 'kidsvibe_sanitize_select',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'kidsvibe' ),
	'section'           => 'kidsvibe_global_section',
	'type'				=> 'select',
	'choices'			=> kidsvibe_get_spinner_list(),
) );

// Site layout setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[sortable]', array(
	'sanitize_callback'   => 'sanitize_text_field',
) );

$wp_customize->add_control( new KidsVibe_Sortable_Control ( $wp_customize, 'kidsvibe_theme_options[sortable]', array(
	'label'               => esc_html__( 'Sortable Homepage', 'kidsvibe' ),
	'description'         => esc_html__( 'Drag and Drop to sort the sections according to your preference.', 'kidsvibe' ),
	'section'             => 'kidsvibe_global_section',
	'type'                => 'hidden',
) ) );

// sortable reset setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[sortable_reset]', array(
	'default'           => kidsvibe_theme_option('sortable_reset'),
	'sanitize_callback' => 'kidsvibe_sanitize_checkbox',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[sortable_reset]', array(
	'label'             => esc_html__( 'Reset Sortable', 'kidsvibe' ),
	'description'       => esc_html__( 'Note: Refresh the page as you publish the settings to see the change.', 'kidsvibe' ),
	'type'              => 'checkbox',
	'section'           => 'kidsvibe_global_section',
) );