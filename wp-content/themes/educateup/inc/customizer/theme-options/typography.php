<?php
/**
 * Typography
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_typography',
	array(
		'panel' => 'educateup_theme_options',
		'title' => esc_html__( 'Typography', 'educateup' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'educateup_site_title_font',
	array(
		'default'           => 'Lexend',
		'sanitize_callback' => 'educateup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'educateup_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'educateup' ),
		'section'  => 'educateup_typography',
		'settings' => 'educateup_site_title_font',
		'type'     => 'select',
		'choices'  => educateup_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'educateup_site_description_font',
	array(
		'default'           => 'Lexend',
		'sanitize_callback' => 'educateup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'educateup_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'educateup' ),
		'section'  => 'educateup_typography',
		'settings' => 'educateup_site_description_font',
		'type'     => 'select',
		'choices'  => educateup_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'educateup_header_font',
	array(
		'default'           => 'Lexend',
		'sanitize_callback' => 'educateup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'educateup_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'educateup' ),
		'section'  => 'educateup_typography',
		'settings' => 'educateup_header_font',
		'type'     => 'select',
		'choices'  => educateup_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'educateup_body_font',
	array(
		'default'           => 'Lexend',
		'sanitize_callback' => 'educateup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'educateup_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'educateup' ),
		'section'  => 'educateup_typography',
		'settings' => 'educateup_body_font',
		'type'     => 'select',
		'choices'  => educateup_get_all_google_font_families(),
	)
);
