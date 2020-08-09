<?php
/*
Plugin Name: Essential Addons for KingComposer
Plugin URI: https://wordpress.org/plugins/essential-addons-for-kingcomposer/
Description: Essential Addons For KingComposer plugin is a powerful addons collection for King Composer Drag and Drop page builder. New Addons will be add day by day with lots of customizable Option.
Author: wpcodestar
Version: 1.1.6
Requires at least: 3.8
Tested up to:      5.2
Author URI: https://codenat.com
License: GPL2
Text Domain: eafkc
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// prevent direct access
defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {

	// Vendor Composer Autoload
	if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
		require_once dirname( __FILE__ ) . '/vendor/autoload.php';
	}

	//The code that runs during plugin activation
	function eafkc_activate_plugin() {
		Eak\Base\Activate::activate();
	}

	register_activation_hook( __FILE__, 'eafkc_activate_plugin' );


	//The code that runs during plugin deactivation
	function eafkc_deactivate_plugin() {
		Eak\Base\Deactivate::deactivate();
	}

	register_deactivation_hook( __FILE__, 'eafkc_deactivate_plugin' );

	//The code that runs during plugin Uninstall
	function eafkc_uninstall_plugin() {
		Eak\Base\Uninstall::uninstall();
	}

	register_uninstall_hook( __FILE__, 'eafkc_uninstall_plugin' );


	// Redirect Settings Page After Plugin Activation
	function eafkc_activation_redirect( $plugin ) {
		if ( $plugin == plugin_basename( __FILE__ ) ) {
			exit( wp_redirect( admin_url( 'admin.php?page=rdextkc_kingcomposer' ) ) );
		}
	}

	add_action( 'activated_plugin', 'eafkc_activation_redirect' );

	// Register ALL Services
	if ( class_exists( 'Eak\\Init' ) ) {
		Eak\Init::register_services();
	}
	// Register Extensions Services
	if ( class_exists( 'Eak\\Extensions' ) ) {
		Eak\Extensions::register_services();
	}

} else {
	function eafkc_required_plugin() {
		if ( is_admin() && current_user_can( 'activate_plugins' ) && ! is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
			add_action( 'admin_notices', 'eafkc_required_plugin_notice' );

			deactivate_plugins( plugin_basename( __FILE__ ) );

			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
		}
	}

	add_action( 'admin_init', 'eafkc_required_plugin' );

	function eafkc_required_plugin_notice() {
		?>
        <div class="error"><p>Error! you need to install or activate the <a href="https://wordpress.org/plugins/kingcomposer/">King Composer</a> plugin to run "<span style="font-weight: bold;">Essential Addons For King Composer</span>" plugin.</p></div><?php
	}
}

