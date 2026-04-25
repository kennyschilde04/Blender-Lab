<?php
/**
 * Class file: WP-CLI commands for Maintenance Mode.
 *
 * @package Beckin_Maintenance_Mode
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles WP-CLI commands for Beckin Maintenance Mode.
 *
 * Provides enable, disable, and status commands for controlling maintenance mode via the command line.
 *
 * @since 1.0.0
 */
class Beckin_Maintenance_Mode_CLI {
	/**
	 * Ensure the current WP-CLI user (if any) can manage maintenance mode.
	 *
	 * If no user is attached (ID 0), we assume a trusted CLI context and allow.
	 *
	 * @since 1.0.10
	 *
	 * @return void
	 */
	private function ensure_can_manage(): void {
		if ( ! function_exists( 'wp_get_current_user' ) ) {
			return;
		}

		$user = wp_get_current_user();

		// No user set (e.g., plain "wp ..." with no --user); allow in CLI.
		if ( 0 === (int) $user->ID ) {
			return;
		}

		if ( function_exists( 'current_user_can' ) && ! current_user_can( BECKIN_MAINTENANCEMODE_ADMIN_CAPABILITY ) ) {
			WP_CLI::error(
				/* translators: Error message shown when a user without permission tries to manage maintenance mode via WP-CLI. */
				__( 'Sorry, you are not allowed to manage this setting.', 'beckin-maintenance-mode' )
			);
		}
	}

	/**
	 * Enable maintenance mode.
	 *
	 * ## EXAMPLES
	 *   wp beckin-mm enable
	 */
	public function enable(): void {
		$this->ensure_can_manage();

		$opts            = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		$opts['enabled'] = true;
		update_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, $opts );
		WP_CLI::success(
			/* translators: Success message shown when maintenance mode is enabled via WP-CLI. */
			__( 'Maintenance mode enabled.', 'beckin-maintenance-mode' )
		);
	}

	/**
	 * Disable maintenance mode.
	 *
	 * ## EXAMPLES
	 *   wp beckin-mm disable
	 */
	public function disable(): void {
		$this->ensure_can_manage();

		$opts            = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		$opts['enabled'] = false;
		update_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, $opts );
		WP_CLI::success(
			/* translators: Success message shown when maintenance mode is disabled via WP-CLI. */
			__( 'Maintenance mode disabled.', 'beckin-maintenance-mode' )
		);
	}

	/**
	 * Show current status.
	 *
	 * ## EXAMPLES
	 *   wp beckin-mm status
	 */
	public function status(): void {
		$this->ensure_can_manage();

		$opts = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );

		$enabled_label = ! empty( $opts['enabled'] )
			? __( 'yes', 'beckin-maintenance-mode' )
			: __( 'no', 'beckin-maintenance-mode' );

		WP_CLI::log(
			sprintf(
				/* translators: %s is either 'yes' or 'no'. */
				__( 'Enabled: %s', 'beckin-maintenance-mode' ),
				$enabled_label
			)
		);

		if ( isset( $opts['retry_after'] ) ) {
			WP_CLI::log(
				sprintf(
					/* translators: %d is the Retry-After value in seconds. */
					__( 'Retry-After: %d', 'beckin-maintenance-mode' ),
					(int) $opts['retry_after']
				)
			);
		}
	}
}

add_action(
	'cli_init',
	function () {
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			WP_CLI::add_command( 'beckin-mm', 'Beckin_Maintenance_Mode_CLI' );
		}
	}
);
