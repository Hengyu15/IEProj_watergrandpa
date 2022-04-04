<?php
/**
 * Team Customizer Options
 *
 * @package kidsvibe
 */

// team menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_team]', array(
	'default'           => kidsvibe_theme_option('enable_team'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_team]', array(
	'label'             => esc_html__( 'Enable Team', 'kidsvibe' ),
	'section'           => 'kidsvibe_team_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// team sub title chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[team_sub_title]', array(
	'default'          	=> kidsvibe_theme_option('team_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[team_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_team_section',
	'type'				=> 'text',
) );

// team label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[team_title]', array(
	'default'          	=> kidsvibe_theme_option('team_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[team_title]', array(
	'label'             => esc_html__( 'Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_team_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// team pages drop down chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[team_content_page_' . $i . ']', array(
		'sanitize_callback' => 'kidsvibe_sanitize_page_post',
	) );

	$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[team_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_team_section',
		'choices'			=> kidsvibe_page_choices(),
	) ) );

	// team label chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[team_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'kidsvibe_theme_options[team_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_team_section',
		'type'				=> 'text',
	) );

	// team hr control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[team_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new KidsVibe_Horizontal_Line( $wp_customize, 'kidsvibe_theme_options[team_custom_hr_' . $i . ']', array(
		'section'           => 'kidsvibe_team_section',
	) ) );

endfor;
