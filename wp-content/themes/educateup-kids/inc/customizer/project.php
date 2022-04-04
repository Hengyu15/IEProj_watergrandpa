<?php
/**
 * Project Section
 *
 * @package EducateUp_Kids
 */

$wp_customize->add_section(
	'educateup_kids_project_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Project Section', 'educateup-kids' ),
	)
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'educateup_kids_enable_project_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_kids_enable_project_section',
		array(
			'label'    => esc_html__( 'Enable Project Section', 'educateup-kids' ),
			'section'  => 'educateup_kids_project_section',
			'settings' => 'educateup_kids_enable_project_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_kids_enable_project_section',
		array(
			'selector' => '#educateup_kids_project_section .section-link',
			'settings' => 'educateup_kids_enable_project_section',
		)
	);
}

// Project Section - Section Title.
$wp_customize->add_setting(
	'educateup_kids_project_title',
	array(
		'default'           => __( 'Latest Projects', 'educateup-kids' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_kids_project_title',
	array(
		'label'           => esc_html__( 'Section Title', 'educateup-kids' ),
		'section'         => 'educateup_kids_project_section',
		'settings'        => 'educateup_kids_project_title',
		'type'            => 'text',
		'active_callback' => 'educateup_kids_is_project_section_enabled',
	)
);

for ( $i = 1; $i <= 4; $i++ ) {

	// Project Section - Content Type Post.
	$wp_customize->add_setting(
		'educateup_kids_project_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'educateup_kids_project_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'educateup-kids' ) . $i,
			'section'         => 'educateup_kids_project_section',
			'settings'        => 'educateup_kids_project_content_post_' . $i,
			'active_callback' => 'educateup_kids_is_project_section_enabled',
			'type'            => 'select',
			'choices'         => educateup_get_post_choices(),
		)
	);

}

// Project Section - Button Label.
$wp_customize->add_setting(
	'educateup_kids_project_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_kids_project_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'educateup-kids' ),
		'section'         => 'educateup_kids_project_section',
		'settings'        => 'educateup_kids_project_button_label',
		'type'            => 'text',
		'active_callback' => 'educateup_kids_is_project_section_enabled',
	)
);

// Project Section - Button Link.
$wp_customize->add_setting(
	'educateup_kids_project_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'educateup_kids_project_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'educateup-kids' ),
		'section'         => 'educateup_kids_project_section',
		'settings'        => 'educateup_kids_project_button_link',
		'type'            => 'url',
		'active_callback' => 'educateup_kids_is_project_section_enabled',
	)
);
