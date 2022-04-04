<?php
/**
 * Callbacks functions
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_has_woocommerce' ) ) :
	/**
	 * Check if woocommerce is enabled enabled
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function kidsvibe_has_woocommerce() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
endif;

if ( ! function_exists( 'kidsvibe_slider_wave_enable' ) ) :
	/**
	 * Check if slider wave enable.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function kidsvibe_slider_wave_enable( $control ) {
		return $control->manager->get_setting( 'kidsvibe_theme_options[enable_slider_wave]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'kidsvibe_recent_content_category_enable' ) ) :
	/**
	 * Check if recent content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function kidsvibe_recent_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'kidsvibe_theme_options[recent_content_type]' )->value();
	}
endif;
