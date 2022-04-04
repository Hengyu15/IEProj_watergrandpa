<?php
/**
 * Footer Options
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_footer_options',
	array(
		'panel' => 'educateup_theme_options',
		'title' => esc_html__( 'Footer Options', 'educateup' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'educateup' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'educateup_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'educateup_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'educateup' ),
		'section'  => 'educateup_footer_options',
		'settings' => 'educateup_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'educateup_scroll_top',
	array(
		'sanitize_callback' => 'educateup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'educateup' ),
			'section' => 'educateup_footer_options',
		)
	)
);
