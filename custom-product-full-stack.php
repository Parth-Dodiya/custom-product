<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://the-gujarati.free.nf
 * @since             1.0.0
 * @package           Custom_Product_Full_Stack
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Product
 * Plugin URI:        https://www.google.com
 * Description:       This is a plugin to create custom product without using Woo-commerce. 
 * Version:           1.0.0
 * Author:            Parth Dodiya
 * Author URI:        https://the-gujarati.free.nf/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-product-full-stack
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
define( 'CUSTOM_PRODUCT_FULL_STACK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-product-full-stack-activator.php
 */
function activate_custom_product_full_stack() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-product-full-stack-activator.php';
	Custom_Product_Full_Stack_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-product-full-stack-deactivator.php
 */
function deactivate_custom_product_full_stack() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-product-full-stack-deactivator.php';
	Custom_Product_Full_Stack_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_product_full_stack' );
register_deactivation_hook( __FILE__, 'deactivate_custom_product_full_stack' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-product-full-stack.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_product_full_stack() {

	$plugin = new Custom_Product_Full_Stack();
	$plugin->run();

}
run_custom_product_full_stack();
