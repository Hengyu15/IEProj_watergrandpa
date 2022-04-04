<?php
/**
 * Introduction Customizer Options
 *
 * @package kidsvibe
 */

// introduction menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_introduction]', array(
	'default'           => kidsvibe_theme_option('enable_introduction'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_introduction]', array(
	'label'             => esc_html__( 'Enable Introduction', 'kidsvibe' ),
	'section'           => 'kidsvibe_introduction_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// introduction sub title drop down chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[introduction_sub_title]', array(
	'default'          	=> kidsvibe_theme_option('introduction_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[introduction_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_introduction_section',
	'type'				=> 'text',
) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'kidsvibe_sanitize_page_post',
) );

$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'kidsvibe' ),
	'section'           => 'kidsvibe_introduction_section',
	'choices'			=> kidsvibe_page_choices(),
) ) );

// introduction btn label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[introduction_btn_label]', array(
	'default'          	=> kidsvibe_theme_option('introduction_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[introduction_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'kidsvibe' ),
	'section'           => 'kidsvibe_introduction_section',
	'type'				=> 'text',
) );
