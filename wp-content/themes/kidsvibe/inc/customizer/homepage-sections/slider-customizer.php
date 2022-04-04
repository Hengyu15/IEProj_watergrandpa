<?php
/**
 * Slider Customizer Options
 *
 * @package kidsvibe
 */

// slider menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_slider]', array(
	'default'           => kidsvibe_theme_option('enable_slider'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'kidsvibe' ),
	'section'           => 'kidsvibe_slider_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[slider_arrow]', array(
	'default'           => kidsvibe_theme_option('slider_arrow'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'kidsvibe' ),
	'section'           => 'kidsvibe_slider_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// slider autoplay control enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[slider_autoplay]', array(
	'default'           => kidsvibe_theme_option('slider_autoplay'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[slider_autoplay]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'kidsvibe' ),
	'section'           => 'kidsvibe_slider_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// slider wave border enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_slider_wave]', array(
	'default'           => kidsvibe_theme_option('enable_slider_wave'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_slider_wave]', array(
	'label'             => esc_html__( 'Enable Slider Wave Border', 'kidsvibe' ),
	'section'           => 'kidsvibe_slider_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// slider wave type control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[slider_wave_layout]', array(
	'default'          	=> kidsvibe_theme_option('slider_wave_layout'),
	'sanitize_callback' => 'kidsvibe_sanitize_select',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[slider_wave_layout]', array(
	'label'             => esc_html__( 'Wave Layout', 'kidsvibe' ),
	'section'           => 'kidsvibe_slider_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'wave' 		=> esc_html__( 'Wave', 'kidsvibe' ),
		'cloud' 	=> esc_html__( 'Cloud', 'kidsvibe' ),
		'mountain' 	=> esc_html__( 'Mountain', 'kidsvibe' ),
	),
	'active_callback'	=> 'kidsvibe_slider_wave_enable',
) );

$wp_customize->add_setting( 'kidsvibe_theme_options[slider_color]', array(
	'default'           => '#000',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kidsvibe_theme_options[slider_color]', array(
	'label'             => esc_html__( 'Overlay Color', 'kidsvibe' ),
	'section'  => 'kidsvibe_slider_section',
) ) );

// slider count control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[slider_opacity]', array(
	'default'          	=> kidsvibe_theme_option('slider_opacity'),
	'sanitize_callback' => 'kidsvibe_sanitize_number_range',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[slider_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'kidsvibe' ),
	'section'           => 'kidsvibe_slider_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[slider_btn_label]', array(
	'default'          	=> kidsvibe_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'kidsvibe' ),
	'section'           => 'kidsvibe_slider_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// slider title drop down chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[slider_sub_title_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'kidsvibe_theme_options[slider_sub_title_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Sub Title %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_slider_section',
		'type'				=> 'text',
	) );

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'kidsvibe_sanitize_page_post',
	) );

	$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_slider_section',
		'choices'			=> kidsvibe_page_choices(),
	) ) );

endfor;
