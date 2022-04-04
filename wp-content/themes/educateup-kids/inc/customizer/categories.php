<?php
/**
 * Categories Section
 *
 * @package EducateUp_Kids
 */

if ( ! class_exists( 'LearnPress' ) ) {
	return;
}

$wp_customize->add_section(
	'educateup_kids_categories_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Categories Section', 'educateup-kids' ),
	)
);

// Categories Section - Enable Section.
$wp_customize->add_setting(
	'educateup_kids_enable_categories_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_kids_enable_categories_section',
		array(
			'label'    => esc_html__( 'Enable Categories Section', 'educateup-kids' ),
			'section'  => 'educateup_kids_categories_section',
			'settings' => 'educateup_kids_enable_categories_section',
			'type'     => 'checkbox',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_kids_enable_categories_section',
		array(
			'selector' => '#educateup_kids_categories_section .section-link',
			'settings' => 'educateup_kids_enable_categories_section',
		)
	);
}

// Categories Section - Section Title.
$wp_customize->add_setting(
	'educateup_kids_categories_title',
	array(
		'default'           => __( 'Popular Categories', 'educateup-kids' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_kids_categories_title',
	array(
		'label'           => esc_html__( 'Section Title', 'educateup-kids' ),
		'section'         => 'educateup_kids_categories_section',
		'settings'        => 'educateup_kids_categories_title',
		'type'            => 'text',
		'active_callback' => 'educateup_kids_is_categories_section_enabled',
	)
);

// Categories Section - Section Text.
$wp_customize->add_setting(
	'educateup_kids_categories_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_kids_categories_text',
	array(
		'label'           => esc_html__( 'Section Text', 'educateup-kids' ),
		'section'         => 'educateup_kids_categories_section',
		'settings'        => 'educateup_kids_categories_text',
		'type'            => 'text',
		'active_callback' => 'educateup_kids_is_categories_section_enabled',
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Categories Section - Select Course Category.
	$wp_customize->add_setting(
		'educateup_kids_categories_content_course_category_' . $i,
		array(
			'sanitize_callback' => 'educateup_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'educateup_kids_categories_content_course_category_' . $i,
		array(
			'label'           => esc_html__( 'Select Course Category ', 'educateup-kids' ) . $i,
			'section'         => 'educateup_kids_categories_section',
			'settings'        => 'educateup_kids_categories_content_course_category_' . $i,
			'active_callback' => 'educateup_kids_is_categories_section_enabled',
			'type'            => 'select',
			'choices'         => educateup_get_course_cat_choices(),
		)
	);

	$wp_customize->add_setting(
		'educateup_kids_categories_image_' . $i,
		array(
			'sanitize_callback' => 'educateup_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'educateup_kids_categories_image_' . $i,
			array(
				'label'           => esc_html__( 'Category Image ', 'educateup-kids' ) . $i,
				'section'         => 'educateup_kids_categories_section',
				'settings'        => 'educateup_kids_categories_image_' . $i,
				'active_callback' => 'educateup_kids_is_categories_section_enabled',
			)
		)
	);
}

// Categories Section - Button Label.
$wp_customize->add_setting(
	'educateup_kids_categories_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_kids_categories_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'educateup-kids' ),
		'section'         => 'educateup_kids_categories_section',
		'settings'        => 'educateup_kids_categories_button_label',
		'type'            => 'text',
		'active_callback' => 'educateup_kids_is_categories_section_enabled',
	)
);

// Categories Section - Button Link.
$wp_customize->add_setting(
	'educateup_kids_categories_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'educateup_kids_categories_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'educateup-kids' ),
		'section'         => 'educateup_kids_categories_section',
		'settings'        => 'educateup_kids_categories_button_link',
		'type'            => 'url',
		'active_callback' => 'educateup_kids_is_categories_section_enabled',
	)
);
