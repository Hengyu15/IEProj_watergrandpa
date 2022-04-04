<?php
/**
 * Topbar Customizer Options
 *
 * @package kidsvibe
 */

// Add footer section
$wp_customize->add_section( 'kidsvibe_topbar_section', array(
	'title'             => esc_html__( 'Topbar Section','kidsgen' ),
	'description'       => esc_html__( 'Topbar Setting Options', 'kidsgen' ),
	'panel'             => 'kidsvibe_homepage_sections_panel',
	'priority'   		=> 50,
) );

// topbar enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_topbar]', array(
	'default'           => kidsvibe_theme_option('enable_topbar'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_topbar]', array(
	'label'             => esc_html__( 'Enable Topbar', 'kidsgen' ),
	'section'           => 'kidsvibe_topbar_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// topbar address control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[topbar_address]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[topbar_address]', array(
	'label'             => esc_html__( 'Address', 'kidsgen' ),
	'section'           => 'kidsvibe_topbar_section',
	'type'				=> 'text',
) ) );

// topbar phone control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[topbar_phone]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[topbar_phone]', array(
	'label'             => esc_html__( 'Phone No', 'kidsgen' ),
	'section'           => 'kidsvibe_topbar_section',
	'type'				=> 'text',
) ) );

// topbar email control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[topbar_email]', array(
	'sanitize_callback' => 'sanitize_email',
) );

$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[topbar_email]', array(
	'label'             => esc_html__( 'Email ID', 'kidsgen' ),
	'section'           => 'kidsvibe_topbar_section',
	'type'				=> 'email',
) ) );

// topbar cart enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_topbar_cart]', array(
	'default'           => kidsvibe_theme_option('show_topbar_cart'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_topbar_cart]', array(
	'label'             => esc_html__( 'Show Shopping Cart', 'kidsgen' ),
	'section'           => 'kidsvibe_topbar_section',
	'on_off_label' 		=> kidsvibe_show_options(),
	'active_callback'	=> 'kidsvibe_has_woocommerce',
) ) );

// topbar social menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_social_menu]', array(
	'default'           => kidsvibe_theme_option('show_social_menu'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_social_menu]', array(
	'label'             => esc_html__( 'Show Social Menu', 'kidsgen' ),
	'section'           => 'kidsvibe_topbar_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// topbar search enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_top_search]', array(
	'default'           => kidsvibe_theme_option('show_top_search'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_top_search]', array(
	'label'             => esc_html__( 'Show Search', 'kidsgen' ),
	'section'           => 'kidsvibe_topbar_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );