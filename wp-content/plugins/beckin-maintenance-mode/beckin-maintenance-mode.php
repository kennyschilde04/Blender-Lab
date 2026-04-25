<?php
/**
 * Plugin Name: Beckin Maintenance Mode
 * Description: Simple maintenance / coming soon toggle with customizable message, admin bypass, and proper 503 + Retry-After.
 *
 * @package                 Beckin_Maintenance_Mode
 * Version: 1.2.0
 * Requires at least: 6.8
 * Tested up to: 6.9
 * Requires PHP: 8.0
 * Author: Beckin, Christopher Silvey
 * Author URI: https://www.beckin.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: beckin-maintenance-mode
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Core constants */
if ( ! defined( 'BECKIN_MAINTENANCEMODE_VERSION' ) ) {
	define( 'BECKIN_MAINTENANCEMODE_VERSION', '1.2.0' );
}
if ( ! defined( 'BECKIN_MAINTENANCEMODE_PLUGIN_BASENAME' ) ) {
	define( 'BECKIN_MAINTENANCEMODE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'BECKIN_MAINTENANCEMODE_PLUGIN_FILE' ) ) {
	define( 'BECKIN_MAINTENANCEMODE_PLUGIN_FILE', __FILE__ );
}
if ( ! defined( 'BECKIN_MAINTENANCEMODE_PLUGIN_DIR' ) ) {
	define( 'BECKIN_MAINTENANCEMODE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'BECKIN_MAINTENANCEMODE_PLUGIN_URL' ) ) {
	define( 'BECKIN_MAINTENANCEMODE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}


/** Plugin settings/capability */
if ( ! defined( 'BECKIN_MAINTENANCEMODE_OPTION_KEY' ) ) {
	define( 'BECKIN_MAINTENANCEMODE_OPTION_KEY', 'beckin_maintenancemode_options' );
}
if ( ! defined( 'BECKIN_MAINTENANCEMODE_ADMIN_CAPABILITY' ) ) {
	define( 'BECKIN_MAINTENANCEMODE_ADMIN_CAPABILITY', 'manage_options' );
}
if ( ! defined( 'BECKIN_MAINTENANCEMODE_EDIT_POSTS_CAPABILITY' ) ) {
	define( 'BECKIN_MAINTENANCEMODE_EDIT_POSTS_CAPABILITY', 'edit_posts' );
}


/** Includes */
require_once BECKIN_MAINTENANCEMODE_PLUGIN_DIR . 'includes/class-beckin-maintenance-mode-admin.php';
require_once BECKIN_MAINTENANCEMODE_PLUGIN_DIR . 'includes/class-beckin-maintenance-mode-frontend.php';
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once BECKIN_MAINTENANCEMODE_PLUGIN_DIR . 'includes/class-beckin-maintenance-mode-cli.php';
}


/** Activation: add default options */
register_activation_hook(
	__FILE__,
	function () {
		$defaults = array(
			'enabled'                    => false,
			'editor_bypass_mode'         => false,
			'header'                     => __(
				/* translators: H1 header text for the maintenance page. &#128119; is an HTML entity and should not be translated. */
				'&#128119; Site under maintenance',
				'beckin-maintenance-mode'
			),
			'message'                    => __(
				/* translators: Default body message shown on the maintenance page. */
				"We'll be right back! We're doing a bit of maintenance.",
				'beckin-maintenance-mode'
			),
			'retry_after'                => 3600,
			'background_color'           => '#0f172a',
			'message_background_color'   => '#ffffff',
			'message_background_opacity' => 6, // percent, matches 0.06 default.
			'header_text_color'          => '#e2e8f0',
			'body_text_color'            => '#e2e8f0',
			'allowed_roles'              => array( 'administrator' ),
		);
		add_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, $defaults );
	}
);


// Deactivation: no action (keep settings).
register_deactivation_hook( __FILE__, function () {} );
