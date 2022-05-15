<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * @since 3.0
 */
class FrmProFieldTextarea extends FrmFieldTextarea {

	protected function field_settings_for_type() {
		$settings = parent::field_settings_for_type();

		$settings['autopopulate'] = true;
		$settings['calc']         = true;
		$settings['read_only']    = true;
		$settings['unique']       = true;

		FrmProFieldsHelper::fill_default_field_display( $settings );
		return $settings;
	}

	/**
	 * @param array $args
	 * @param array $shortcode_atts
	 *
	 * @return string
	 */
	public function front_field_input( $args, $shortcode_atts ) {
		$input_html = parent::front_field_input( $args, $shortcode_atts );

		if ( ! empty( $this->field['auto_grow'] ) ) {
			$input_html = preg_replace( '/<textarea/', '<textarea data-auto-grow="' . esc_attr( $this->field['auto_grow'] ) . '" ', $input_html, 1 );
		}

		return $input_html;
	}


}
