<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.a07.com.au
 * @since             1.0.0
 * @package           Behave_Archive
 *
 * @wordpress-plugin
 * Plugin Name:       Behave Archive
 * Plugin URI:        https://www.a07.com.au
 * Description:       Hide Pages with status `Archived` from the default listing.
 * Version:           1.0.0
 * Author:            Trevor Wistaff
 * Author URI:        https://www.a07.com.au
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       behave-archive
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-behave-archive-activator.php
 */
function activate_behave_archive() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-behave-archive-activator.php';
	Behave_Archive_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-behave-archive-deactivator.php
 */
function deactivate_behave_archive() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-behave-archive-deactivator.php';
	Behave_Archive_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_behave_archive' );
register_deactivation_hook( __FILE__, 'deactivate_behave_archive' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-behave-archive.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_behave_archive() {

	$plugin = new Behave_Archive();
	$plugin->run();

}
run_behave_archive();
