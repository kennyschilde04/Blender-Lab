<?php
/**
 * Uninstall routine for Beckin Maintenance Mode.
 *
 * Removes all plugin data created by this plugin when uninstalled.
 *
 * @package Beckin_Maintenance_Mode
 * @see https://developer.wordpress.org/plugins/plugin-basics/uninstall-methods/
 */

// If uninstall not called from WordPress, exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}


/**
 * Delete all options added by this plugin.
 *
 * @return void
 */
function beckin_maintenancemode_delete_site_data(): void {
	// Remove the plugin's options stored in wp_options.
	delete_option( 'beckin_maintenancemode_options' );
}


/**
 * Run uninstall cleanup for all sites (single and multisite).
 *
 * @return void
 */
function beckin_maintenancemode_run_uninstall(): void {
	if ( is_multisite() ) {
		$beckin_mm_site_ids = get_sites(
			array(
				'fields' => 'ids',
				'number' => 0,
			)
		);

		foreach ( (array) $beckin_mm_site_ids as $beckin_mm_site_id ) {
			switch_to_blog( (int) $beckin_mm_site_id );
			beckin_maintenancemode_delete_site_data();
			restore_current_blog();
		}
	} else {
		beckin_maintenancemode_delete_site_data();
	}
}

beckin_maintenancemode_run_uninstall();
