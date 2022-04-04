<?php
/**
 * Portfolio Customizer Options
 *
 * @package kidsvibe
 */

// portfolio menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_portfolio]', array(
	'default'           => kidsvibe_theme_option('enable_portfolio'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_portfolio]', array(
	'label'             => esc_html__( 'Enable Portfolio', 'kidsvibe' ),
	'section'           => 'kidsvibe_portfolio_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// portfolio sub title chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[portfolio_sub_title]', array(
	'default'          	=> kidsvibe_theme_option('portfolio_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[portfolio_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_portfolio_section',
	'type'				=> 'text',
) );

// portfolio label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[portfolio_title]', array(
	'default'          	=> kidsvibe_theme_option('portfolio_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[portfolio_title]', array(
	'label'             => esc_html__( 'Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_portfolio_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 6; $i++ ) :

	// portfolio posts drop down chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[portfolio_content_post_' . $i . ']', array(
		'sanitize_callback' => 'kidsvibe_sanitize_page_post',
	) );

	$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[portfolio_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_portfolio_section',
		'choices'			=> kidsvibe_post_choices(),
	) ) );

	$wp_customize->add_setting( 'kidsvibe_theme_options[portfolio_content_color_' . $i . ']', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kidsvibe_theme_options[portfolio_content_color_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Background Color %d', 'kidsvibe' ), $i ),
		'section'  => 'kidsvibe_portfolio_section',
	) ) );

	// portfolio hr control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[portfolio_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new KidsVibe_Horizontal_Line( $wp_customize, 'kidsvibe_theme_options[portfolio_custom_hr_' . $i . ']', array(
		'section'           => 'kidsvibe_portfolio_section',
	) ) );

endfor;
