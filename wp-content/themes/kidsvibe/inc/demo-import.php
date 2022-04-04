<?php
/**
 * demo import
 *
 * @package kidsvibe
 */

function kidsvibe_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Get demo content files for KidsVibe Theme.', 'kidsvibe' ),
    esc_url( 'https://sharkthemes.com/downloads/kidsvibe' ), esc_html__( 'Click Here', 'kidsvibe' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'kidsvibe_intro_text' );