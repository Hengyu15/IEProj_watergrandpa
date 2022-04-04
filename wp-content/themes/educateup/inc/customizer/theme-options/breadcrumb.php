<?php
/**
 * Breadcrumb
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'educateup' ),
		'panel' => 'educateup_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'educateup_enable_breadcrumb',
	array(
		'sanitize_callback' => 'educateup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'educateup' ),
			'section' => 'educateup_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'educateup_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'educateup_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'educateup' ),
		'active_callback' => 'educateup_is_breadcrumb_enabled',
		'section'         => 'educateup_breadcrumb',
	)
);
