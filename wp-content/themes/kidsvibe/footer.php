<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kidsvibe
 */

/**
 * kidsvibe_site_content_ends_action hook
 *
 * @hooked kidsvibe_site_content_ends -  10
 *
 */
do_action( 'kidsvibe_site_content_ends_action' );

/**
 * kidsvibe_footer_start_action hook
 *
 * @hooked kidsvibe_footer_start -  10
 *
 */
do_action( 'kidsvibe_footer_start_action' );

/**
 * kidsvibe_site_info_action hook
 *
 * @hooked kidsvibe_site_info -  10
 *
 */
do_action( 'kidsvibe_site_info_action' );

/**
 * kidsvibe_footer_ends_action hook
 *
 * @hooked kidsvibe_footer_ends -  10
 * @hooked kidsvibe_slide_to_top -  20
 *
 */
do_action( 'kidsvibe_footer_ends_action' );

/**
 * kidsvibe_page_ends_action hook
 *
 * @hooked kidsvibe_page_ends -  10
 *
 */
do_action( 'kidsvibe_page_ends_action' );

wp_footer();

/**
 * kidsvibe_body_html_ends_action hook
 *
 * @hooked kidsvibe_body_html_ends -  10
 *
 */
do_action( 'kidsvibe_body_html_ends_action' );
