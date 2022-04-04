<?php
/**
 * Counter Section
 *
 * @package EducateUp
 */

$wp_customize->add_section(
	'educateup_counter_section',
	array(
		'panel' => 'educateup_front_page_options',
		'title' => esc_html__( 'Counter Section', 'educateup' ),
	)
);

// Counter Section - Enable Section.
$wp_customize->add_setting(
	'educateup_enable_counter_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'educateup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new EducateUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'educateup_enable_counter_section',
		array(
			'label'    => esc_html__( 'Enable Counter Section', 'educateup' ),
			'section'  => 'educateup_counter_section',
			'settings' => 'educateup_enable_counter_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'educateup_enable_counter_section',
		array(
			'selector' => '#educateup_counter_section .section-link',
			'settings' => 'educateup_enable_counter_section',
		)
	);
}

// Counter Section - Background Image.
$wp_customize->add_setting(
	'educateup_counter_background',
	array(
		'sanitize_callback' => 'educateup_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'educateup_counter_background',
		array(
			'label'           => esc_html__( 'Background Image', 'educateup' ),
			'section'         => 'educateup_counter_section',
			'settings'        => 'educateup_counter_background',
			'active_callback' => 'educateup_is_counter_section_enabled',
		)
	)
);

// Counter Section - Number of Counters.
$wp_customize->add_setting(
	'educateup_counter_count',
	array(
		'default'           => 4,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'educateup_counter_count',
	array(
		'label'           => esc_html__( 'Number of Counters', 'educateup' ),
		'description'     => esc_html__( 'Note: Min 1 & Max 4. Please input the valid number and save. Then refresh the page to see the change.', 'educateup' ),
		'section'         => 'educateup_counter_section',
		'settings'        => 'educateup_counter_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 4,
		),
		'active_callback' => 'educateup_is_counter_section_enabled',
	)
);

// List out selected number of fields.
$counter_count = get_theme_mod( 'educateup_counter_count', 4 );

for ( $i = 1; $i <= $counter_count; $i++ ) {

	$wp_customize->add_setting(
		'educateup_counter_icon_' . $i,
		array(
			'sanitize_callback' => 'educateup_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'educateup_counter_icon_' . $i,
			array(
				'label'           => esc_html__( 'Icon ', 'educateup' ) . $i,
				'section'         => 'educateup_counter_section',
				'settings'        => 'educateup_counter_icon_' . $i,
				'active_callback' => 'educateup_is_counter_section_enabled',
			)
		)
	);

	$wp_customize->add_setting(
		'educateup_counter_label_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'educateup_counter_label_' . $i,
		array(
			'label'           => esc_html__( 'Label ', 'educateup' ) . $i,
			'section'         => 'educateup_counter_section',
			'settings'        => 'educateup_counter_label_' . $i,
			'type'            => 'text',
			'active_callback' => 'educateup_is_counter_section_enabled',
		)
	);

	$wp_customize->add_setting(
		'educateup_counter_value_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'educateup_counter_value_' . $i,
		array(
			'label'           => esc_html__( 'Value ', 'educateup' ) . $i,
			'section'         => 'educateup_counter_section',
			'settings'        => 'educateup_counter_value_' . $i,
			'type'            => 'number',
			'input_attrs'     => array( 'min' => 1 ),
			'active_callback' => 'educateup_is_counter_section_enabled',
		)
	);

	$wp_customize->add_setting(
		'educateup_counter_value_suffix_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'educateup_counter_value_suffix_' . $i,
		array(
			'label'           => esc_html__( 'Value Suffix ', 'educateup' ) . $i,
			'section'         => 'educateup_counter_section',
			'settings'        => 'educateup_counter_value_suffix_' . $i,
			'type'            => 'text',
			'active_callback' => 'educateup_is_counter_section_enabled',
		)
	);

}
