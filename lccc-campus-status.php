<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.lorainccc.edu
 * @since             1.0.0
 * @package           Lccc_Campus_Status
 *
 * @wordpress-plugin
 * Plugin Name:       LCCC Campus Status
 * Plugin URI:        http://www.lorainccc.edu
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            LCCC Web Development Team
 * Author URI:        http://www.lorainccc.edu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lccc-campus-status
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lccc-campus-status-activator.php
 */
function activate_lccc_campus_status() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lccc-campus-status-activator.php';
	Lccc_Campus_Status_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lccc-campus-status-deactivator.php
 */
function deactivate_lccc_campus_status() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lccc-campus-status-deactivator.php';
	Lccc_Campus_Status_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lccc_campus_status' );
register_deactivation_hook( __FILE__, 'deactivate_lccc_campus_status' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lccc-campus-status.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lccc_campus_status() {

	$plugin = new Lccc_Campus_Status();
	$plugin->run();

}
run_lccc_campus_status();
