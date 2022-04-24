<?php
/**
 * Plugin Name: Fancy Elementor Flipbox
 * Description: This plugin adds an amazing and customizable flip box widget(with many options) to the Elementor page builder plugin.
 * Plugin URI:  http://themeprix.com/fancy-elementor-flipbox/
 * Version:     2.4.2
 * Author:      ThemePrix
 * Author URI:  https://themeprix.com/
 * Text Domain: fancy-elementor-flipbox
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


define( 'FANCY_ELEMENTOR_FLIPBOX__FILE__', __FILE__ );
/**
 * Load elementor fancy flipbox
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function fancy_elementor_flipbox_load() {
	// Load localization file
	load_plugin_textdomain( 'fancy-elementor-flipbox' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'fancy_elementor_flipbox_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'fancy_elementor_flipbox_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'fancy_elementor_flipbox_load' );


function fancy_elementor_flipbox_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Fancy Elementor Flipbox is not working because you are using an old version of Elementor.', 'fancy-elementor-flipbox' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'fancy-elementor-flipbox' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}

function fancy_elementor_flipbox_fail_load() {
	if (!current_user_can('activate_plugins')) {
		return;
	}

	$elementor = 'elementor/elementor.php';

	if (fancy_elementor_flipbox_is_plugin_installed($elementor)) {
		$activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor);
		$message = __('<strong>Fancy Elementor Flipbox</strong> requires <strong>Elementor</strong> plugin to be active. Please activate Elementor to continue.', 'fancy-elementor-flipbox');
		$button_text = __('Activate Elementor', 'fancy-elementor-flipbox');
	} else {
		$activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
		$message = sprintf(__('<strong>Fancy Elementor Flipbox</strong> requires <strong>Elementor</strong> plugin to be installed and activated. Please install Elementor to continue.', 'fancy-elementor-flipbox'), '<strong>', '</strong>');
		$button_text = __('Install Elementor', 'fancy-elementor-flipbox');
	}

	$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';

	printf('<div class="error"><p>%1$s</p>%2$s</div>', __($message), $button);
}

/**
     * Check if a plugin is installed
     *
     * @since v1.0.6
     */
    function fancy_elementor_flipbox_is_plugin_installed($basename) {
        if (!function_exists('get_plugins')) {
            include_once ABSPATH . '/wp-admin/includes/plugin.php';
        }

        $installed_plugins = get_plugins();

        return isset($installed_plugins[$basename]);
    }

add_filter( 'plugin_row_meta', 'custom_plugin_row_meta', 10, 4 );
	//add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );
 
function custom_plugin_row_meta( $plugin_meta, $plugin_file, $plugin_data, $status ) {
 


    if ( strpos( $plugin_file, 'fancy-elementor-flipbox.php' ) !== false ) {
        $new_links = array(
                'donate' => '<a href="https://themeprix.com/fancy-elementor-flipbox/" target="_blank">View Flip Box Demos</a>',
                );
         
        $plugin_meta = array_merge( $plugin_meta, $new_links );
    }
     
    return $plugin_meta;
}