<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kidsvibe
 */

/**
 * kidsvibe_doctype_action hook
 *
 * @hooked kidsvibe_doctype -  10
 *
 */
do_action( 'kidsvibe_doctype_action' );

/**
 * kidsvibe_head_action hook
 *
 * @hooked kidsvibe_head -  10
 *
 */
do_action( 'kidsvibe_head_action' );

/**
 * kidsvibe_body_start_action hook
 *
 * @hooked kidsvibe_body_start -  10
 *
 */
do_action( 'kidsvibe_body_start_action' );
 
/**
 * kidsvibe_page_start_action hook
 *
 * @hooked kidsvibe_page_start -  10
 * @hooked kidsvibe_loader -  20
 *
 */
do_action( 'kidsvibe_page_start_action' );

/**
 * kidsvibe_header_start_action hook
 *
 * @hooked kidsvibe_header_start -  10
 *
 */
do_action( 'kidsvibe_header_start_action' );

/**
 * kidsvibe_site_branding_action hook
 *
 * @hooked kidsvibe_site_branding -  10
 *
 */
do_action( 'kidsvibe_site_branding_action' );

/**
 * kidsvibe_primary_nav_action hook
 *
 * @hooked kidsvibe_primary_nav -  10
 *
 */
do_action( 'kidsvibe_primary_nav_action' );

/**
 * kidsvibe_header_ends_action hook
 *
 * @hooked kidsvibe_header_ends -  10
 *
 */
do_action( 'kidsvibe_header_ends_action' );

/**
 * kidsvibe_site_content_start_action hook
 *
 * @hooked kidsvibe_site_content_start -  10
 *
 */
do_action( 'kidsvibe_site_content_start_action' );

/**
 * kidsvibe_primary_content_action hook
 *
 */
if ( is_front_page() && ! is_home() ) {
	$sections = kidsvibe_sortable_sections();
	$sorted = kidsvibe_theme_option( 'sortable' );
	$sorted = ! empty( $sorted ) ? explode( ',' , $sorted ) : array_keys( $sections );
	$i = 1;

	foreach ( $sorted as $section ) {
		add_action( 'kidsvibe_primary_content_action', 'kidsvibe_add_'. $section .'_section', $i . 0 );
		$i++;
	}
	do_action( 'kidsvibe_primary_content_action' );
}