<?php
/**
 * Blog Section
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_blog_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Blog Section', 'educateup' ),
	)
);

// Blog Section - Enable Section.
$wp_customize->add_setting(
	'educateup_enable_blog_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_blog_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'educateup' ),
			'section'  => 'educateup_blog_section',
			'settings' => 'educateup_enable_blog_section',
			'type'     => 'checkbox',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_enable_blog_section',
		array(
			'selector' => '#educateup_blog_section .section-link',
			'settings' => 'educateup_enable_blog_section',
		)
	);
}

// Blog Section - Section Title.
$wp_customize->add_setting(
	'educateup_blog_title',
	array(
		'default'           => __( 'Featured Blog', 'educateup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_blog_title',
	array(
		'label'           => esc_html__( 'Section Title', 'educateup' ),
		'section'         => 'educateup_blog_section',
		'settings'        => 'educateup_blog_title',
		'type'            => 'text',
		'active_callback' => 'educateup_is_blog_section_enabled',
	)
);

// Blog Section - Section Subtitle.
$wp_customize->add_setting(
	'educateup_blog_subtitle',
	array(
		'default'           => __( 'Featured Blog', 'educateup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_blog_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'educateup' ),
		'section'         => 'educateup_blog_section',
		'settings'        => 'educateup_blog_subtitle',
		'type'            => 'text',
		'active_callback' => 'educateup_is_blog_section_enabled',
	)
);

// Blog Section - Number of Posts.
$wp_customize->add_setting(
	'educateup_blog_count',
	array(
		'default'           => 3,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'educateup_blog_count',
	array(
		'label'           => esc_html__( 'Number of Items to Show', 'educateup' ),
		'description'     => esc_html__( 'Note: Min 1 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'educateup' ),
		'section'         => 'educateup_blog_section',
		'settings'        => 'educateup_blog_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 12,
		),
		'active_callback' => 'educateup_is_blog_section_enabled',
	)
);

// List out selected number of fields.
$blog_count = get_theme_mod( 'educateup_blog_count', 3 );

for ( $i = 1; $i <= $blog_count; $i++ ) {
	// Blog Section - Select Post.
	$wp_customize->add_setting(
		'educateup_blog_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'educateup_blog_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'educateup' ) . $i,
			'section'         => 'educateup_blog_section',
			'settings'        => 'educateup_blog_content_post_' . $i,
			'type'            => 'select',
			'active_callback' => 'educateup_is_blog_section_enabled',
			'choices'         => educateup_get_post_choices(),
		)
	);

}

// Blog Section - Button Label.
$wp_customize->add_setting(
	'educateup_blog_button_label',
	array(
		'default'           => __( 'View All', 'educateup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_blog_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'educateup' ),
		'section'         => 'educateup_blog_section',
		'settings'        => 'educateup_blog_button_label',
		'type'            => 'text',
		'active_callback' => 'educateup_is_blog_section_enabled',
	)
);

// Blog Section - Button Link.
$wp_customize->add_setting(
	'educateup_blog_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'educateup_blog_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'educateup' ),
		'section'         => 'educateup_blog_section',
		'settings'        => 'educateup_blog_button_link',
		'type'            => 'url',
		'active_callback' => 'educateup_is_blog_section_enabled',
	)
);
