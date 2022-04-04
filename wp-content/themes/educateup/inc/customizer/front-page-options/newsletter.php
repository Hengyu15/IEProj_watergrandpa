<?php
/**
 * Newsletter Section
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_newsletter_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Newsletter Section', 'educateup' ),
	)
);

// Newsletter Section - Enable Section.
$wp_customize->add_setting(
	'educateup_enable_newsletter_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_newsletter_section',
		array(
			'label'    => esc_html__( 'Enable Newsletter Section', 'educateup' ),
			'section'  => 'educateup_newsletter_section',
			'settings' => 'educateup_enable_newsletter_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_enable_newsletter_section',
		array(
			'selector' => '#educateup_newsletter_section .section-link',
			'settings' => 'educateup_enable_newsletter_section',
		)
	);
}

// Newsletter Section - Section Title.
$wp_customize->add_setting(
	'educateup_newsletter_title',
	array(
		'default'           => __( 'Join Our Mailing List', 'educateup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_newsletter_title',
	array(
		'label'           => esc_html__( 'Section Title', 'educateup' ),
		'section'         => 'educateup_newsletter_section',
		'settings'        => 'educateup_newsletter_title',
		'type'            => 'text',
		'active_callback' => 'educateup_is_newsletter_section_enabled',
	)
);

// Newsletter Section - Newsletter Content.
$wp_customize->add_setting(
	'educateup_newsletter_content',
	array(
		'default'           => esc_html__( 'Sign up for newsletter and get latest news and updates.', 'educateup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_newsletter_content',
	array(
		'label'           => esc_html__( 'Content', 'educateup' ),
		'section'         => 'educateup_newsletter_section',
		'settings'        => 'educateup_newsletter_content',
		'type'            => 'text',
		'active_callback' => 'educateup_is_newsletter_section_enabled',
	)
);

// Newsletter Section - Background Color.
$default_color = educateup_get_default_color();
$wp_customize->add_setting(
	'educateup_newsletter_background_color',
	array(
		'default'           => $default_color['primary'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'educateup_newsletter_background_color',
		array(
			'label'           => __( 'Background Color', 'educateup' ),
			'section'         => 'educateup_newsletter_section',
			'settings'        => 'educateup_newsletter_background_color',
			'active_callback' => 'educateup_is_newsletter_section_enabled',
		)
	)
);
