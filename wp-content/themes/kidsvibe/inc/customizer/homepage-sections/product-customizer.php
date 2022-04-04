<?php
/**
 * Product Customizer Options
 *
 * @package kidsvibe
 */

// featured menu enable setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[enable_product]', array(
	'default'           => kidsvibe_theme_option('enable_product'),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[enable_product]', array(
	'label'             => esc_html__( 'Enable Product', 'kidsvibe' ),
	'section'           => 'kidsvibe_product_section',
	'on_off_label' 		=> kidsvibe_show_options(),
	'active_callback'	=> 'kidsvibe_has_woocommerce',
) ) );

// featured sub title chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[product_sub_title]', array(
	'default'          	=> kidsvibe_theme_option('product_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[product_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_product_section',
	'type'				=> 'text',
	'active_callback'	=> 'kidsvibe_has_woocommerce',
) );

// featured title chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[product_title]', array(
	'default'          	=> kidsvibe_theme_option('product_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[product_title]', array(
	'label'             => esc_html__( 'Title', 'kidsvibe' ),
	'section'           => 'kidsvibe_product_section',
	'type'				=> 'text',
	'active_callback'	=> 'kidsvibe_has_woocommerce',
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// featured products drop down chooser control and setting
	$wp_customize->add_setting( 'kidsvibe_theme_options[product_content_product_' . $i . ']', array(
		'sanitize_callback' => 'kidsvibe_sanitize_page_post',
	) );

	$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[product_content_product_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Product %d', 'kidsvibe' ), $i ),
		'section'           => 'kidsvibe_product_section',
		'choices'			=> kidsvibe_product_choices(),
		'active_callback'	=> 'kidsvibe_has_woocommerce',
	) ) );

endfor;
