<?php
/**
 * Theme Options
 *
 * @package EducateUp
 */

$wp_customize->add_panel(
	'educateup_theme_options',
	array(
		'title'    => esc_html__( 'Theme Options', 'educateup' ),
		'priority' => 130,
	)
);

// Typography.
require get_template_directory() . '/inc/customizer/theme-options/typography.php';

// Excerpt.
require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

// Top Bar.
require get_template_directory() . '/inc/customizer/theme-options/header-options.php';

// Breadcrumb.
require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

// Layout.
require get_template_directory() . '/inc/customizer/theme-options/sidebar-layout.php';

// Post Options.
require get_template_directory() . '/inc/customizer/theme-options/post-options.php';

// Pagination.
require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

// Footer Options.
require get_template_directory() . '/inc/customizer/theme-options/footer-options.php';
