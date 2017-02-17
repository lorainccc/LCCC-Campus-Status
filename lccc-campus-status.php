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

function lc_campus_status_init() {
	if( class_exists( 'WordPressAngularJS' ) ) {

		// do my plugin stuff here

	}else{
		function lc_campus_status_angular_admin_notice() {
   			$class = 'notice notice-error is-dismissible';
						$message = __( '
The plugin <a href="https://wordpress.org/plugins/angularjs-for-wp/">AngularJS for WordPress</a> by <a href="https://profiles.wordpress.org/guavaworks/">Roy Sivan</a> is currently Inactive or Unistalled. Please install and activate the plugin so that LCCC News plugin can function properly.', 'lc-campus-status' );
						printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
					}
add_action( 'network_admin_notices', 'lc_campus_status_angular_admin_notice' );

	}
}
add_action( 'plugins_loaded', 'lc_campus_status_init' );

function lorainccc_campus_status_scripts() {
 wp_enqueue_script('angular-resources', '//ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-resource.js', 'angular-core', '20170216', false);
 wp_enqueue_script('firebase-core', '//www.gstatic.com/firebasejs/3.6.9/firebase.js', 'angular-core', '20170216', false);
 wp_enqueue_script('angularfire', '//cdn.firebase.com/libs/angularfire/2.3.0/angularfire.min.js', 'firebase-core', '20170216', false);
	wp_enqueue_script('lccc_campus_status_style', plugin_dir_url( __FILE__ ) . 'js/firebase-init.js', 'angularfire', '20170216', false);
}

add_action ('init','lorainccc_campus_status_scripts');



function lorainccc_campus_status_wp_admin_scripts() {
 // Check and see if the user is and admin or editor.  Load the following js and css if user is and admin.
 if( current_user_can('publish') ){
  wp_enqueue_script('lc_campus_status_script', plugin_dir_url( __FILE__ ) . 'js/lc-campus-status-admin.js', array( 'jquery' ) );
  wp_enqueue_style('lc_campus_status_styles', plugin_dir_url( __FILE__ ) . 'css/lc-campus-status.css', 40);
 };
}

add_action( 'admin_enqueue_scripts', 'lorainccc_campus_status_wp_admin_scripts' );

require_once( plugin_dir_path( __FILE__ ).'php/campus-status-admin.php');

