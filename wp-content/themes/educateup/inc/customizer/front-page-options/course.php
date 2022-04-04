<?php
/**
 * Course Section
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_course_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Course Section', 'educateup' ),
	)
);

// Course Section - Enable Section.
$wp_customize->add_setting(
	'educateup_enable_course_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_course_section',
		array(
			'label'    => esc_html__( 'Enable Course Section', 'educateup' ),
			'section'  => 'educateup_course_section',
			'settings' => 'educateup_enable_course_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_enable_course_section',
		array(
			'selector' => '#educateup_course_section .section-link',
			'settings' => 'educateup_enable_course_section',
		)
	);
}

// Course Section - Section Title.
$wp_customize->add_setting(
	'educateup_course_title',
	array(
		'default'           => __( 'Popular Courses', 'educateup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_course_title',
	array(
		'label'           => esc_html__( 'Section Title', 'educateup' ),
		'section'         => 'educateup_course_section',
		'settings'        => 'educateup_course_title',
		'type'            => 'text',
		'active_callback' => 'educateup_is_course_section_enabled',
	)
);

// Course Section - Section Text.
$wp_customize->add_setting(
	'educateup_course_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_course_text',
	array(
		'label'           => esc_html__( 'Section Text', 'educateup' ),
		'section'         => 'educateup_course_section',
		'settings'        => 'educateup_course_text',
		'type'            => 'text',
		'active_callback' => 'educateup_is_course_section_enabled',
	)
);

// Course Section - Number of Posts.
$wp_customize->add_setting(
	'educateup_course_count',
	array(
		'default'           => 6,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'educateup_course_count',
	array(
		'label'           => esc_html__( 'Number of posts to show', 'educateup' ),
		'section'         => 'educateup_course_section',
		'settings'        => 'educateup_course_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 12,
		),
		'active_callback' => 'educateup_is_course_section_enabled',
	)
);

// Course Section - Content Type.
$wp_customize->add_setting(
	'educateup_course_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'educateup_sanitize_select',
	)
);

$wp_customize->add_control(
	'educateup_course_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'educateup' ),
		'section'         => 'educateup_course_section',
		'settings'        => 'educateup_course_content_type',
		'type'            => 'select',
		'active_callback' => 'educateup_is_course_section_enabled',
		'choices'         => educateup_get_course_content_type_choices(),
	)
);

// List out selected number of fields.
$course_count = get_theme_mod( 'educateup_course_count', 6 );
for ( $i = 1; $i <= $course_count; $i++ ) {

	// Course Section - Select Post.
	$wp_customize->add_setting(
		'educateup_course_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'educateup_course_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'educateup' ) . $i,
			'section'         => 'educateup_course_section',
			'settings'        => 'educateup_course_content_post_' . $i,
			'active_callback' => 'educateup_is_course_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => educateup_get_post_choices(),
		)
	);

	// Course Section - Select Page.
	$wp_customize->add_setting(
		'educateup_course_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'educateup_course_content_page_' . $i,
		array(
			'label'           => esc_html__( 'Select Page ', 'educateup' ) . $i,
			'section'         => 'educateup_course_section',
			'settings'        => 'educateup_course_content_page_' . $i,
			'active_callback' => 'educateup_is_course_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => educateup_get_page_choices(),
		)
	);

	// Course Section - Select Course.
	$wp_customize->add_setting(
		'educateup_course_content_course_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'educateup_course_content_course_' . $i,
		array(
			'label'           => esc_html__( 'Select Course ', 'educateup' ) . $i,
			'section'         => 'educateup_course_section',
			'settings'        => 'educateup_course_content_course_' . $i,
			'active_callback' => 'educateup_is_course_section_and_content_type_course_enabled',
			'type'            => 'select',
			'choices'         => educateup_get_course_choices(),
		)
	);

}

// Course Section - Button Label.
$wp_customize->add_setting(
	'educateup_course_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'educateup_course_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'educateup' ),
		'section'         => 'educateup_course_section',
		'settings'        => 'educateup_course_button_label',
		'type'            => 'text',
		'active_callback' => 'educateup_is_course_section_enabled',
	)
);



// Course Section - Button Link.
$wp_customize->add_setting(
	'educateup_course_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'educateup_course_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'educateup' ),
		'section'         => 'educateup_course_section',
		'settings'        => 'educateup_course_button_link',
		'type'            => 'url',
		'active_callback' => 'educateup_is_course_section_enabled',
	)
);
