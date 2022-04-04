<?php
/**
 * Banner Section
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_banner_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Banner Section', 'educateup' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'educateup_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'educateup' ),
			'section'  => 'educateup_banner_section',
			'settings' => 'educateup_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_enable_banner_section',
		array(
			'selector' => '#educateup_banner_section .section-link',
			'settings' => 'educateup_enable_banner_section',
		)
	);
}

// Banner Section - Content Type.
$wp_customize->add_setting(
	'educateup_banner_content',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'educateup_sanitize_select',
	)
);

$wp_customize->add_control(
	'educateup_banner_content',
	array(
		'label'           => esc_html__( 'Select Content Type', 'educateup' ),
		'section'         => 'educateup_banner_section',
		'settings'        => 'educateup_banner_content',
		'type'            => 'select',
		'active_callback' => 'educateup_is_banner_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'educateup' ),
			'post' => esc_html__( 'Post', 'educateup' ),
		),
	)
);

// Banner Section - Content Type Post.
$wp_customize->add_setting(
	'educateup_banner_content_post',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'educateup_banner_content_post',
	array(
		'label'           => esc_html__( 'Select Post', 'educateup' ),
		'section'         => 'educateup_banner_section',
		'settings'        => 'educateup_banner_content_post',
		'active_callback' => 'educateup_is_banner_section_and_content_type_post_enabled',
		'type'            => 'select',
		'choices'         => educateup_get_post_choices(),
	)
);

// Banner Section - Content Type Page.
$wp_customize->add_setting(
	'educateup_banner_content_page',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'educateup_banner_content_page',
	array(
		'label'           => esc_html__( 'Select Page', 'educateup' ),
		'section'         => 'educateup_banner_section',
		'settings'        => 'educateup_banner_content_page',
		'active_callback' => 'educateup_is_banner_section_and_content_type_page_enabled',
		'type'            => 'select',
		'choices'         => educateup_get_page_choices(),
	)
);
