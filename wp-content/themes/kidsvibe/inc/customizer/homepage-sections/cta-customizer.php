<?php
/**
 * Call to Action Customizer Options
 *
 * @package kidsvibe
 */

// cta menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_cta]', array(
	'default'           => kidsvibe_theme_option('enable_cta'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_cta]', array(
	'label'             => esc_html__( 'Enable Call to Action', 'kidsvibe' ),
	'section'           => 'kidsvibe_cta_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// cta count control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[cta_opacity]', array(
	'default'          	=> kidsvibe_theme_option('cta_opacity'),
	'sanitize_callback' => 'kidsvibe_sanitize_number_range',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[cta_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'kidsvibe' ),
	'section'           => 'kidsvibe_cta_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'kidsvibe_sanitize_page_post',
) );

$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'kidsvibe' ),
	'section'           => 'kidsvibe_cta_section',
	'choices'			=> kidsvibe_page_choices(),
) ) );

// cta btn label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[cta_btn_label]', array(
	'default'          	=> kidsvibe_theme_option('cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'kidsvibe' ),
	'section'           => 'kidsvibe_cta_section',
	'type'				=> 'text',
) );
