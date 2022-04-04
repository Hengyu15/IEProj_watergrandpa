<?php
/**
 * Pagination
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_pagination',
	array(
		'panel' => 'educateup_theme_options',
		'title' => esc_html__( 'Pagination', 'educateup' ),
	)
);

// Pagination - Enable Pagination
$wp_customize->add_setting(
	'educateup_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'educateup' ),
			'section'  => 'educateup_pagination',
			'settings' => 'educateup_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type
$wp_customize->add_setting(
	'educateup_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'educateup_sanitize_select',
	)
);

$wp_customize->add_control(
	'educateup_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'educateup' ),
		'section'         => 'educateup_pagination',
		'settings'        => 'educateup_pagination_type',
		'active_callback' => 'educateup_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'educateup' ),
			'numeric' => __( 'Numeric', 'educateup' ),
		),
	)
);
