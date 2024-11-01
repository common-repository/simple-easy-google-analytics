<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.ifourtechnolab.com/
 * @since             1.0.0
 * @package           Simple_Easy_Google_Analytics
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Easy Google Analytics
 * Plugin URI:        https://wordpress.org/plugins/simple-easy-google-analytics/
 * Description:       Simple Easy Google Analytics plugin enables you to track your site using the latest Google Analytics tracking code or client ID.
 * Version:           1.0.0
 * Author:            ifourtechnolab
 * Author URI:        http://www.ifourtechnolab.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-easy-google-analytics
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-easy-google-analytics-activator.php
 */
function activate_simple_easy_google_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-easy-google-analytics-activator.php';
	Simple_Easy_Google_Analytics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-easy-google-analytics-deactivator.php
 */
function deactivate_simple_easy_google_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-easy-google-analytics-deactivator.php';
	Simple_Easy_Google_Analytics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_easy_google_analytics' );
register_deactivation_hook( __FILE__, 'deactivate_simple_easy_google_analytics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-easy-google-analytics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_simple_easy_google_analytics() {

	$plugin = new Simple_Easy_Google_Analytics();
	$plugin->run();

}
run_simple_easy_google_analytics();
