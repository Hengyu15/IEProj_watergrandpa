<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * @since 3.0
 */
class FrmProFieldRte extends FrmFieldType {

	/**
	 * @var string
	 * @since 3.0
	 */
	protected $type = 'rte';

	protected function include_form_builder_file() {
		return FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/back-end/field-' . $this->type . '.php';
	}

	protected function field_settings_for_type() {
		$settings = array(
			'size'          => true,
			'unique'        => true,
		);

		FrmProFieldsHelper::fill_default_field_display( $settings );
		return $settings;
	}

	protected function extra_field_opts() {
		return array(
			'max' => 7,
		);
	}

	protected function prepare_display_value( $value, $atts ) {
		$value = $this->maybe_process_gallery_shortcode( $value );
		FrmFieldsHelper::run_wpautop( $atts, $value );
		return $value;
	}

	/**
	 * When media_buttons is turned on process the shortcode (see https://formidableforms.com/knowledgebase/frm_rte_options/#kb-add-media-button-to-tinymce-editor).
	 *
	 * @param string $value
	 * @return string
	 */
	private function maybe_process_gallery_shortcode( $value ) {
		if ( ! $this->should_process_gallery_shortcode( $value ) ) {
			return $value;
		}

		$pattern = get_shortcode_regex( array( 'gallery' ) );
		return preg_replace_callback(
			"/$pattern/",
			function( $match ) {
				$attr = shortcode_parse_atts( $match[3] );
				return gallery_shortcode( $attr );
			},
			$value
		);
	}

	/**
	 * Only process gallery shortcodes if one can be detected, and if media_buttons are enabled for field.
	 *
	 * @param string $value
	 * @return bool True if the value should be processed.
	 */
	private function should_process_gallery_shortcode( $value ) {
		return false !== strpos( $value, '[gallery' ) && $this->media_buttons_are_turned_on_for_field();
	}

	/**
	 * @return bool True if the media_buttons feature has been turned on via the frm_rte_options filter.
	 */
	private function media_buttons_are_turned_on_for_field() {
		// include every default to safely hook into frm_rte_options, but we only need to check how $options['media_buttons'] comes back.
		$default_options = array(
			'textarea_name' => $this->field->name,
			'editor_class'  => $this->field->default_value !== '' ? 'frm_has_default' : '',
			'dfw'           => FrmAppHelper::is_admin(),
			'media_buttons' => false,
			'textarea_rows' => ! empty( $this->field->max ) ? $this->field->max : '',
			'tinymce'       => array(
				'init_instance_callback' => 'frmProForm.changeRte',
			),
		);
		$options         = apply_filters( 'frm_rte_options', $default_options, (array) $this->field );
		return ! empty( $options['media_buttons'] );
	}

	protected function include_front_form_file() {
		return FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/front-end/rte.php';
	}

	/**
	 * If submitting with Ajax or on preview page and tinymce is not loaded yet, load it now
	 */
	protected function load_field_scripts( $args ) {
		if ( ! FrmAppHelper::is_admin() ) {
			global $frm_vars;
			$load_scripts = ( FrmAppHelper::doing_ajax() || FrmAppHelper::is_preview_page() ) && ( ! isset( $frm_vars['tinymce_loaded'] ) || ! $frm_vars['tinymce_loaded'] );
			if ( $load_scripts ) {
				add_action( 'wp_print_footer_scripts', '_WP_Editors::editor_js', 50 );
				add_action( 'wp_print_footer_scripts', '_WP_Editors::enqueue_scripts', 1 );
				$frm_vars['tinymce_loaded'] = true;
			}
		}
	}

	/**
	 * Load deafult editor scripts when ajax form includes an RTE field.
	 *
	 * @since 4.06.02
	 */
	public function load_default_rte_script() {
		global $frm_vars;
		if ( isset( $frm_vars['tinymce_loaded'] ) && $frm_vars['tinymce_loaded'] ) {
			// It's already been loaded on the page.
			return;
		}

		wp_enqueue_editor();
		if ( FrmAppHelper::is_preview_page() ) {
			// Call the right hooks instead of admin hooks.
			add_action( 'wp_print_footer_scripts', '_WP_Editors::force_uncompressed_tinymce', 1 );
			add_action( 'wp_print_footer_scripts', '_WP_Editors::print_default_editor_scripts', 45 );
		}
	}
}
