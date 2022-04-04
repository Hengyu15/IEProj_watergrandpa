<?php
/**
 * Header Options
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_header_options',
	array(
		'panel' => 'educateup_theme_options',
		'title' => esc_html__( 'Header Options', 'educateup' ),
	)
);

// Header Options - Enable Top Bar.
$wp_customize->add_setting(
	'educateup_enable_top_bar',
	array(
		'default'           => true,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_top_bar',
		array(
			'label'    => esc_html__( 'Enable Top Bar', 'educateup' ),
			'section'  => 'educateup_header_options',
			'settings' => 'educateup_enable_top_bar',
			'type'     => 'checkbox',
		)
	)
);

// Header Options - Contact Number.
$wp_customize->add_setting(
	'educateup_contact_number',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_contact_number',
	array(
		'label'           => esc_html__( 'Contact Number', 'educateup' ),
		'section'         => 'educateup_header_options',
		'settings'        => 'educateup_contact_number',
		'type'            => 'text',
		'active_callback' => 'educateup_is_topbar_enabled',
	)
);

// Header Options - Enable Search Form.
$wp_customize->add_setting(
	'educateup_enable_search_form',
	array(
		'sanitize_callback' => 'educateup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_search_form',
		array(
			'label'           => esc_html__( 'Enable Search Form', 'educateup' ),
			'section'         => 'educateup_header_options',
			'active_callback' => 'educateup_is_topbar_enabled',
		)
	)
);
