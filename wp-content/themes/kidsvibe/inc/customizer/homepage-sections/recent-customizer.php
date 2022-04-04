<?php
/**
 * Recent Customizer Options
 *
 * @package kidsvibe
 */

// recent enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_recent]', array(
	'default'           => kidsvibe_theme_option('enable_recent'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_recent]', array(
	'label'             => esc_html__( 'Enable Recent', 'kidsvibe' ),
	'section'           => 'kidsvibe_recent_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// recent sub title chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[recent_sub_title]', array(
	'default'          	=> kidsvibe_theme_option('recent_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[recent_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_recent_section',
	'type'				=> 'text',
) );

// recent label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[recent_title]', array(
	'default'          	=> kidsvibe_theme_option('recent_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[recent_title]', array(
	'label'             => esc_html__( 'Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_recent_section',
	'type'				=> 'text',
) );

// recent content type control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[recent_content_type]', array(
	'default'          	=> kidsvibe_theme_option('recent_content_type'),
	'sanitize_callback' => 'kidsvibe_sanitize_select',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[recent_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'kidsvibe' ),
	'section'           => 'kidsvibe_recent_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'recent' 	=> esc_html__( 'Recent', 'kidsvibe' ),
		'category' 	=> esc_html__( 'Category', 'kidsvibe' ),
	),
) );

// recent pages drop down chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[recent_content_category]', array(
	'sanitize_callback' => 'kidsvibe_sanitize_category',
) );

$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[recent_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'kidsvibe' ),
	'section'           => 'kidsvibe_recent_section',
	'choices'			=> kidsvibe_category_choices(),
	'active_callback'	=> 'kidsvibe_recent_content_category_enable',
) ) );
