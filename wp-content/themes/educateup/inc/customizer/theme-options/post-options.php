<?php
/**
 * Post Options
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'educateup' ),
		'panel' => 'educateup_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'educateup_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'educateup' ),
			'section' => 'educateup_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'educateup_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'educateup' ),
			'section' => 'educateup_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'educateup_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'educateup' ),
			'section' => 'educateup_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'educateup_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'educateup' ),
			'section' => 'educateup_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'educateup_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'educateup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'educateup' ),
		'section'  => 'educateup_post_options',
		'settings' => 'educateup_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'educateup_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'educateup' ),
			'section' => 'educateup_post_options',
		)
	)
);
