<?php
/**
 * Sidebar Option
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'educateup' ),
		'panel' => 'educateup_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'educateup_sidebar_position',
	array(
		'sanitize_callback' => 'educateup_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'educateup_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'educateup' ),
		'section' => 'educateup_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'educateup' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'educateup' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'educateup' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'educateup_post_sidebar_position',
	array(
		'sanitize_callback' => 'educateup_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'educateup_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'educateup' ),
		'section' => 'educateup_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'educateup' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'educateup' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'educateup' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'educateup_page_sidebar_position',
	array(
		'sanitize_callback' => 'educateup_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'educateup_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'educateup' ),
		'section' => 'educateup_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'educateup' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'educateup' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'educateup' ),
		),
	)
);
