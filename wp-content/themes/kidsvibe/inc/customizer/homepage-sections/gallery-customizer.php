<?php
/**
 * Gallery Customizer Options
 *
 * @package kidsvibe
 */

// gallery menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_gallery]', array(
	'default'           => kidsvibe_theme_option('enable_gallery'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_gallery]', array(
	'label'             => esc_html__( 'Enable Gallery', 'kidsvibe' ),
	'section'           => 'kidsvibe_gallery_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// gallery sub title chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[gallery_sub_title]', array(
	'default'          	=> kidsvibe_theme_option('gallery_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[gallery_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_gallery_section',
	'type'				=> 'text',
) );

// gallery label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[gallery_title]', array(
	'default'          	=> kidsvibe_theme_option('gallery_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[gallery_title]', array(
	'label'             => esc_html__( 'Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_gallery_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 8; $i++ ) :

	// gallery posts drop down chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[gallery_content_post_' . $i . ']', array(
		'sanitize_callback' => 'kidsvibe_sanitize_page_post',
	) );

	$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[gallery_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_gallery_section',
		'choices'			=> kidsvibe_post_choices(),
	) ) );

endfor;
