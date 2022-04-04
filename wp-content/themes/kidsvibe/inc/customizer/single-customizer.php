<?php
/**
 * Single Post Customizer Options
 *
 * @package kidsvibe
 */

// Add excerpt section
$wp_customize->add_section( 'kidsvibe_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','kidsvibe' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'kidsvibe' ),
	'panel'             => 'kidsvibe_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'kidsvibe_sanitize_select',
	'default'             => kidsvibe_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new KidsVibe_Radio_Image_Control ( $wp_customize, 'kidsvibe_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'kidsvibe' ),
	'section'             => 'kidsvibe_single_section',
	'choices'			  => kidsvibe_sidebar_position(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_single_date]', array(
	'default'           => kidsvibe_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'kidsvibe' ),
	'section'           => 'kidsvibe_single_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_single_category]', array(
	'default'           => kidsvibe_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'kidsvibe' ),
	'section'           => 'kidsvibe_single_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_single_tags]', array(
	'default'           => kidsvibe_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'kidsvibe' ),
	'section'           => 'kidsvibe_single_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_single_author]', array(
	'default'           => kidsvibe_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'kidsvibe' ),
	'section'           => 'kidsvibe_single_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );
