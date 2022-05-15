<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmProAddonsController extends FrmAddonsController {

	/**
	 * Render a conditional action button for a specified plugin
	 *
	 * @param string $plugin
	 * @param array|string $upgrade_link_args
	 * @since 4.09.01
	 */
	public static function conditional_action_button( $plugin, $upgrade_link_args ) {
		if ( ! is_callable( 'self::get_addon' ) ) {
			// FrmAddonsController may not have this function depending on version.
			return;
		}

		$addon = self::get_addon( $plugin );
		$atts = array(
			'addon'         => $addon,
			'license_type'  => self::get_license_type(),
			'plan_required' => FrmFormsHelper::get_plan_required( $addon ),
			'upgrade_link'  => FrmAppHelper::admin_upgrade_link( $upgrade_link_args ),
		);

		self::show_conditional_action_button( $atts );
	}

	/**
	 * Render a conditional action button for an add on
	 *
	 * @since 4.09
	 * @param array $addon
	 * @param string|false $license_type
	 * @param string $plan_required
	 * @param string $upgrade_link
	 */
	public static function show_conditional_action_button( $atts ) {
		$addon         = $atts['addon'];
		$license_type  = $atts['license_type'];
		$plan_required = $atts['plan_required'];
		$upgrade_link  = $atts['upgrade_link'];
		if ( ! $addon ) {
			self::addon_upgrade_link( $addon, $upgrade_link );

		} elseif ( $addon['status']['type'] === 'installed' ) {
			?>
			<a href="#" rel="<?php echo esc_attr( $addon['plugin'] ); ?>" class="button button-primary frm-button-primary frm-activate-addon <?php echo esc_attr( empty( $addon['activate_url'] ) ? 'frm_hidden' : '' ); ?>">
				<?php esc_html_e( 'Activate', 'formidable' ); ?>
			</a>
			<?php
		} elseif ( ! empty( $addon['url'] ) ) {
			?>
			<a href="#" class="frm-install-addon button button-primary frm-button-primary" rel="<?php echo esc_attr( $addon['url'] ); ?>" aria-label="<?php esc_attr_e( 'Install', 'formidable' ); ?>">
				<?php esc_html_e( 'Install', 'formidable' ); ?>
			</a>
			<?php
		} elseif ( $license_type && $license_type === strtolower( $plan_required ) ) {
			?>
			<a class="install-now button button-secondary frm-button-secondary" href="<?php echo esc_url( FrmAppHelper::admin_upgrade_link( 'addons', 'account/downloads/' ) . '&utm_content=' . $addon['slug'] ); ?>" target="_blank" aria-label="<?php esc_attr_e( 'Upgrade Now', 'formidable' ); ?>">
				<?php esc_html_e( 'Renew Now', 'formidable' ); ?>
			</a>
			<?php
		} else {
			self::addon_upgrade_link( $addon, $upgrade_link );
		}
	}

	/**
	 * @since 4.06
	 * @since 5.0.03 added $force_type parameter.
	 *
	 * @param bool $force_type return type instead of checking expiration or code so "expired" or "grandfathered" are never returned.
	 */
	public static function license_type( $force_type = false ) {
		$api    = new FrmFormApi();
		$addons = $api->get_api_info();
		$type   = 'free';

		if ( isset( $addons['error'] ) ) {
			if ( isset( $addons['error']['code'] ) && $addons['error']['code'] === 'expired' ) {
				return $addons['error']['code'];
			}
			$type = isset( $addons['error']['type'] ) ? $addons['error']['type'] : $type;
		}

		if ( ! is_callable( 'self::get_pro_from_addons' ) ) {
			$pro = isset( $addons['93790'] ) ? $addons['93790'] : array();
		} else {
			$pro = self::get_pro_from_addons( $addons );
		}

		if ( $type === 'free' ) {
			$type = isset( $pro['type'] ) ? $pro['type'] : $type;
			if ( $type === 'free' ) {
				return $type;
			}
		}

		if ( $force_type ) {
			return strtolower( $type );
		}

		if ( isset( $pro['code'] ) && $pro['code'] === 'grandfathered' ) {
			return $pro['code'];
		}

		$expires = isset( $pro['expires'] ) ? $pro['expires'] : '';
		$expired = $expires ? $expires < time() : false;
		return $expired ? 'expired' : strtolower( $type );
	}

	/**
	 * @since 5.0.03
	 * @return string "Basic", "Plus", "Business" or "Elite" depending on license type. "Premium" by default if type can not be determined.
	 */
	public static function get_readable_license_type() {
		$license_type = self::license_type( true );
		if ( in_array( $license_type, array( 'personal', 'creator' ), true ) ) {
			$license_type = 'plus';
		} elseif ( ! in_array( $license_type, array( 'basic', 'elite', 'business', 'plus' ), true ) ) {
			$license_type = 'premium';
		}
		return ucfirst( $license_type );
	}

	/**
	 * @since 4.08
	 *
	 * @return boolean|int false or the number of days until expiration.
	 */
	public static function is_license_expiring() {
		$version_info = self::get_primary_license_info();
		if ( ! isset( $version_info['active_sub'] ) || $version_info['active_sub'] !== 'no' ) {
			// Check for a subscription first.
			return false;
		}

		if ( isset( $version_info['error'] ) || empty( $version_info['expires'] ) ) {
			// It's either invalid or already expired.
			return false;
		}

		$expiration = $version_info['expires'];
		$days_left  = ( $expiration - time() ) / DAY_IN_SECONDS;
		if ( $days_left > 30 || $days_left < 0 ) {
			return false;
		}

		return $days_left;
	}

	/**
	 * @since 4.09.01
	 */
	public static function show_expired_message() {
		$expired = self::is_license_expired();

		if ( $expired ) {
			?>
			<div id="frm-create-footer" class="frm_modal_footer">
				<?php self::renewal_message(); ?>
			</div>
			<?php
		} elseif ( self::is_license_expiring() ) {
			?>
			<div id="frm-create-footer" class="frm_modal_footer">
				<?php self::expiring_message(); ?>
			</div>
			<?php
		}
	}

	/**
	 * @since 4.07
	 */
	public static function renewal_message() {
		if ( ! self::is_license_expired() ) {
			self::expiring_message();
			return;
		}
		?>
		<div class="frm_error_style" style="text-align:left">
			<?php FrmAppHelper::icon_by_class( 'frmfont frm_alert_icon' ); ?>
			&nbsp;
			<?php esc_html_e( 'Your account has expired', 'formidable' ); ?>
			<div style="float:right">
				<a href="<?php echo esc_url( FrmAppHelper::admin_upgrade_link( 'form-expired', 'account/downloads/' ) ); ?>">
					<?php esc_html_e( 'Renew Now', 'formidable' ); ?>
				</a>
			</div>
		</div>
		<?php
	}

	/**
	 * @since 4.08
	 */
	public static function expiring_message() {
		$expiring = self::is_license_expiring();
		if ( ! $expiring || $expiring < 0 ) {
			return;
		}
		?>
		<div class="frm_warning_style" style="text-align:left">
			<?php FrmAppHelper::icon_by_class( 'frmfont frm_alert_icon' ); ?>
			&nbsp;
			<?php
			printf(
				esc_html(
					/* translators: %1$s: start HTML tag, %2$s: end HTML tag */
					_n(
						'Your form subscription expires in %1$s day%2$s.',
						'Your form subscription expires in %1$s days%2$s.',
						intval( $expiring ),
						'formidable'
					)
				),
				'<strong>' . esc_html( number_format_i18n( $expiring ) ),
				'</strong>'
			);
			?>
			<div style="float:right">
				<a href="<?php echo esc_url( FrmAppHelper::admin_upgrade_link( 'form-renew', 'account/downloads/' ) ); ?>">
					<?php esc_html_e( 'Renew Now', 'formidable' ); ?>
				</a>
			</div>
		</div>
		<?php
	}

	/**
	 * @since 4.06.02
	 */
	public static function ajax_multiple_addons() {
		self::install_addon_permissions();

		// Set the current screen to avoid undefined notices.
		global $hook_suffix;
		set_current_screen();

		$free_plugin_supports_current_plugin_var = is_callable( 'self::get_current_plugin' );

		$download_urls = explode( ',', FrmAppHelper::get_param( 'plugin', '', 'post' ) );
		FrmAppHelper::sanitize_value( 'esc_url_raw', $download_urls );

		foreach ( $download_urls as $download_url ) {
			if ( $free_plugin_supports_current_plugin_var ) {
				self::$plugin = $download_url;
			} else {
				$_POST['plugin'] = $download_url;
			}

			if ( strpos( $download_url, 'http' ) !== false ) {
				// Installing.
				self::maybe_show_cred_form();

				$installed = self::install_addon();
				self::maybe_activate_addon( $installed );
			} else {
				// Activating.
				self::maybe_activate_addon( $download_url );
			}
		}

		echo json_encode( __( 'Your plugins have been installed and activated.', 'formidable' ) );

		wp_die();
	}
}
