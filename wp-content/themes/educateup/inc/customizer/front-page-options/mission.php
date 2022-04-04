<?php
/**
 * Mission Section
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_mission_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Mission Section', 'educateup' ),
	)
);

// Mission Section - Enable Section.
$wp_customize->add_setting(
	'educateup_enable_mission_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_mission_section',
		array(
			'label'    => esc_html__( 'Enable Mission Section', 'educateup' ),
			'section'  => 'educateup_mission_section',
			'settings' => 'educateup_enable_mission_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_enable_mission_section',
		array(
			'selector' => '#educateup_mission_section .section-link',
			'settings' => 'educateup_enable_mission_section',
		)
	);
}

// Mission Section - Content Type.
$wp_customize->add_setting(
	'educateup_mission_content',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'educateup_sanitize_select',
	)
);

$wp_customize->add_control(
	'educateup_mission_content',
	array(
		'label'           => esc_html__( 'Select Content Type', 'educateup' ),
		'section'         => 'educateup_mission_section',
		'settings'        => 'educateup_mission_content',
		'type'            => 'select',
		'active_callback' => 'educateup_is_mission_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'educateup' ),
			'post' => esc_html__( 'Post', 'educateup' ),
		),
	)
);

// Mission Section - Content Type Post.
$wp_customize->add_setting(
	'educateup_mission_content_post',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'educateup_mission_content_post',
	array(
		'section'         => 'educateup_mission_section',
		'settings'        => 'educateup_mission_content_post',
		'label'           => esc_html__( 'Select Post', 'educateup' ),
		'active_callback' => 'educateup_is_mission_section_and_content_type_post_enabled',
		'type'            => 'select',
		'choices'         => educateup_get_post_choices(),
	)
);

// Mission Section - Content Type Page.
$wp_customize->add_setting(
	'educateup_mission_content_page',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'educateup_mission_content_page',
	array(
		'label'           => esc_html__( 'Select Page', 'educateup' ),
		'section'         => 'educateup_mission_section',
		'settings'        => 'educateup_mission_content_page',
		'active_callback' => 'educateup_is_mission_section_and_content_type_page_enabled',
		'type'            => 'select',
		'choices'         => educateup_get_page_choices(),
	)
);

// Mission Section - Button Label.
$wp_customize->add_setting(
	'educateup_mission_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'educateup_mission_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'educateup' ),
		'section'         => 'educateup_mission_section',
		'settings'        => 'educateup_mission_button_label',
		'type'            => 'text',
		'active_callback' => 'educateup_is_mission_section_enabled',
	)
);

// Mission Section - Button Link.
$wp_customize->add_setting(
	'educateup_mission_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'educateup_mission_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'educateup' ),
		'section'         => 'educateup_mission_section',
		'settings'        => 'educateup_mission_button_link',
		'type'            => 'url',
		'active_callback' => 'educateup_is_mission_section_enabled',
	)
);
