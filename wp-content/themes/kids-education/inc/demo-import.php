<?php
/**
 * Demo Import.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Kids Education
 * @since Kids Education 1.0.0
 */

function kids_education_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Kids Education Theme.', 'kids-education' ),
    esc_url( 'https://themepalace.com/instructions/themes/kids-education' ), esc_html__( 'Click here for Demo File download', 'kids-education' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'kids_education_intro_text' );