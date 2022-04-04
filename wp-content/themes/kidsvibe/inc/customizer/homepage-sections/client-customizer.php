<?php
/**
 * Client Customizer Options
 *
 * @package kidsvibe
 */

// client menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_client]', array(
	'default'           => kidsvibe_theme_option('enable_client'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_client]', array(
	'label'             => esc_html__( 'Enable Client', 'kidsvibe' ),
	'section'           => 'kidsvibe_client_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// client sub title chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[client_sub_title]', array(
	'default'          	=> kidsvibe_theme_option('client_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[client_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_client_section',
	'type'				=> 'text',
) );

// client label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[client_title]', array(
	'default'          	=> kidsvibe_theme_option('client_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[client_title]', array(
	'label'             => esc_html__( 'Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_client_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// client pages drop down chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[client_content_page_' . $i . ']', array(
		'sanitize_callback' => 'kidsvibe_sanitize_page_post',
	) );

	$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[client_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_client_section',
		'choices'			=> kidsvibe_page_choices(),
	) ) );

endfor;
