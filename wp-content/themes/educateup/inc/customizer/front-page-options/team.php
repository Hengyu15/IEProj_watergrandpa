<?php
/**
 * Team Section
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_team_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Team Section', 'educateup' ),
	)
);

// Team Section - Enable Section.
$wp_customize->add_setting(
	'educateup_enable_team_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_team_section',
		array(
			'label'    => esc_html__( 'Enable Team Section', 'educateup' ),
			'section'  => 'educateup_team_section',
			'settings' => 'educateup_enable_team_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_enable_team_section',
		array(
			'selector' => '#educateup_team_section .section-link',
			'settings' => 'educateup_enable_team_section',
		)
	);
}

// Team Section - Section Title.
$wp_customize->add_setting(
	'educateup_team_section_title',
	array(
		'default'           => __( 'Experienced People', 'educateup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_team_section_title',
	array(
		'label'           => esc_html__( 'Section Title', 'educateup' ),
		'section'         => 'educateup_team_section',
		'settings'        => 'educateup_team_section_title',
		'type'            => 'text',
		'active_callback' => 'educateup_is_team_section_enabled',
	)
);

// Team Section - Section Subtitle.
$wp_customize->add_setting(
	'educateup_team_section_subtitle',
	array(
		'default'           => __( 'Our Team', 'educateup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'educateup_team_section_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'educateup' ),
		'section'         => 'educateup_team_section',
		'settings'        => 'educateup_team_section_subtitle',
		'type'            => 'text',
		'active_callback' => 'educateup_is_team_section_enabled',
	)
);

// Team Section - Number of Posts.
$wp_customize->add_setting(
	'educateup_team_count',
	array(
		'default'           => 3,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'educateup_team_count',
	array(
		'label'           => esc_html__( 'Number of Items to Show', 'educateup' ),
		'section'         => 'educateup_team_section',
		'settings'        => 'educateup_team_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 12,
		),
		'active_callback' => 'educateup_is_team_section_enabled',
	)
);

// Team Section - Content Type.
$wp_customize->add_setting(
	'educateup_team_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'educateup_sanitize_select',
	)
);

$wp_customize->add_control(
	'educateup_team_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'educateup' ),
		'section'         => 'educateup_team_section',
		'settings'        => 'educateup_team_content_type',
		'type'            => 'select',
		'active_callback' => 'educateup_is_team_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'educateup' ),
			'post' => esc_html__( 'Post', 'educateup' ),
		),
	)
);

// List out selected number of fields.
$team_count = get_theme_mod( 'educateup_team_count', 3 );

for ( $i = 1; $i <= $team_count; $i++ ) {
	// Team Section - Select Post.
	$wp_customize->add_setting(
		'educateup_team_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'educateup_team_content_post_' . $i,
		array(
			/* translators: %d: count. */
			'label'           => sprintf( esc_html__( 'Select Post %d', 'educateup' ), $i ),
			'section'         => 'educateup_team_section',
			'settings'        => 'educateup_team_content_post_' . $i,
			'active_callback' => 'educateup_is_team_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => educateup_get_post_choices(),
		)
	);

	// Team Section - Select Page.
	$wp_customize->add_setting(
		'educateup_team_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'educateup_team_content_page_' . $i,
		array(
			/* translators: %d: count. */
			'label'           => sprintf( esc_html__( 'Select Page %d', 'educateup' ), $i ),
			'section'         => 'educateup_team_section',
			'settings'        => 'educateup_team_content_page_' . $i,
			'active_callback' => 'educateup_is_team_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => educateup_get_page_choices(),
		)
	);

	// Team Section - Designation.
	$wp_customize->add_setting(
		'educateup_team_position_' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'educateup_team_position_' . $i,
		array(
			/* translators: %d: count. */
			'label'           => sprintf( esc_html__( 'Designation %d', 'educateup' ), $i ),
			'section'         => 'educateup_team_section',
			'settings'        => 'educateup_team_position_' . $i,
			'active_callback' => 'educateup_is_team_section_enabled',
		)
	);

	// Team Section - Social Links.
	$wp_customize->add_setting(
		'educateup_team_social_links_' . $i,
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new EducateUp_Sortable_Repeater_Custom_Control(
			$wp_customize,
			'educateup_team_social_links_' . $i,
			array(
				/* translators: %d: count. */
				'label'           => sprintf( esc_html__( 'Social Links %d', 'educateup' ), $i ),
				'section'         => 'educateup_team_section',
				'button_labels'   => array(
					'add' => __( 'Add', 'educateup' ),
				),
				'active_callback' => 'educateup_is_team_section_enabled',
			)
		)
	);
}

// Team Section - Button Label.
$wp_customize->add_setting(
	'educateup_team_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'educateup_team_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'educateup' ),
		'section'         => 'educateup_team_section',
		'settings'        => 'educateup_team_button_label',
		'type'            => 'text',
		'active_callback' => 'educateup_is_team_section_enabled',
	)
);

// Team Section - Button Link.
$wp_customize->add_setting(
	'educateup_team_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'educateup_team_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'educateup' ),
		'section'         => 'educateup_team_section',
		'settings'        => 'educateup_team_button_link',
		'type'            => 'url',
		'active_callback' => 'educateup_is_team_section_enabled',
	)
);
