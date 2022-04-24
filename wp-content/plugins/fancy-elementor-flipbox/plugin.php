<?php
namespace ElementorFancyFlipbox;

use FancyElementorFlipbox\Widgets\Fancy_Elementor_Flipbox;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		add_action( 'elementor/frontend/after_register_scripts', function() {
			wp_register_script( 'fancy-elementor-flipbox', plugins_url( '/assets/js/fancy-elementor-flipbox.js', FANCY_ELEMENTOR_FLIPBOX__FILE__ ), [ 'jquery' ], false, true );

		} );

		add_action( 'elementor/frontend/after_enqueue_styles', function() {
		   wp_enqueue_style('fancy-elementor-flipbox-css',   plugin_dir_url(__FILE__). '/assets/css/fancy-elementor-flipbox.css');
		} );

	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/fancy-elementor-flipbox.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Fancy_Elementor_Flipbox() );
	}
}

new Plugin();
