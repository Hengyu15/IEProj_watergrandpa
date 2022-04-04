<?php
/**
 * Footer Customizer Options
 *
 * @package kidsvibe
 */

// Add footer section
$wp_customize->add_section( 'kidsvibe_footer_section', array(
	'title'             => esc_html__( 'Footer Section','kidsvibe' ),
	'description'       => esc_html__( 'Footer Setting Options', 'kidsvibe' ),
	'panel'             => 'kidsvibe_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[slide_to_top]', array(
	'default'           => kidsvibe_theme_option('slide_to_top'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'kidsvibe' ),
	'section'           => 'kidsvibe_footer_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'kidsvibe_theme_options[copyright_text]',
	array(
		'default'       		=> kidsvibe_theme_option('copyright_text'),
		'sanitize_callback'		=> 'kidsvibe_santize_allow_tags',
	)
);
$wp_customize->add_control( 'kidsvibe_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'kidsvibe' ),
		'section'    			=> 'kidsvibe_footer_section',
		'type'		 			=> 'textarea',
    )
);

