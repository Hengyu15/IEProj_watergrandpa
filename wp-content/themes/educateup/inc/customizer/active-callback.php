<?php
/**
 * Active Callbacks
 *
 * @package EducateUp
 */

// Theme Options.
function educateup_is_topbar_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_top_bar' )->value() );
}
function educateup_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_pagination' )->value() );
}
function educateup_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_breadcrumb' )->value() );
}

// Banner section.
function educateup_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_banner_section' )->value() );
}
function educateup_is_banner_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'educateup_banner_content' )->value();
	return ( educateup_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function educateup_is_banner_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'educateup_banner_content' )->value();
	return ( educateup_is_banner_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Mission section.
function educateup_is_mission_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_mission_section' )->value() );
}
function educateup_is_mission_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'educateup_mission_content' )->value();
	return ( educateup_is_mission_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function educateup_is_mission_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'educateup_mission_content' )->value();
	return ( educateup_is_mission_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Course section.
function educateup_is_course_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_course_section' )->value() );
}
function educateup_is_course_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'educateup_course_content_type' )->value();
	return ( educateup_is_course_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function educateup_is_course_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'educateup_course_content_type' )->value();
	return ( educateup_is_course_section_enabled( $control ) && ( 'page' === $content_type ) );
}
function educateup_is_course_section_and_content_type_course_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'educateup_course_content_type' )->value();
	return ( educateup_is_course_section_enabled( $control ) && ( 'lp_course' === $content_type ) );
}

// Team section.
function educateup_is_team_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_team_section' )->value() );
}
function educateup_is_team_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'educateup_team_content_type' )->value();
	return ( educateup_is_team_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function educateup_is_team_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'educateup_team_content_type' )->value();
	return ( educateup_is_team_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Counter section.
function educateup_is_counter_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_counter_section' )->value() );
}

// Blog section.
function educateup_is_blog_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_blog_section' )->value() );
}

// Newsletter section.
function educateup_is_newsletter_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'educateup_enable_newsletter_section' )->value() );
}

// Check if static homepage is enabled.
function educateup_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
