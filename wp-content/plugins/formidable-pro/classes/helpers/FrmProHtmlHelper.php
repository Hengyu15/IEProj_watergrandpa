<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmProHtmlHelper {

	/**
	 * @since 5.0.17
	 *
	 * @param string $id
	 * @param string $name
	 * @param array  $args
	 * @return string|void
	 */
	public static function toggle( $id, $name, $args ) {
		return self::clip(
			function() use ( $id, $name, $args ) {
				require FrmProAppHelper::plugin_path() . '/classes/views/shared/toggle.php';
			},
			isset( $args['echo'] ) ? $args['echo'] : false
		);
	}

	/**
	 * Call an echo function and either echo it or return the result as a string.
	 *
	 * @since 5.0.17
	 *
	 * @param Closure $echo_function
	 * @param bool    $echo
	 * @return string|void
	 */
	private static function clip( $echo_function, $echo = false ) {
		if ( ! $echo ) {
			ob_start();
		}

		$echo_function();

		if ( ! $echo ) {
			$return = ob_get_contents();
			ob_end_clean();
			return $return;
		}
	}
}
