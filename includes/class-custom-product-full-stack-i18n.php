<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://the-gujarati.free.nf
 * @since      1.0.0
 *
 * @package    Custom_Product_Full_Stack
 * @subpackage Custom_Product_Full_Stack/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Custom_Product_Full_Stack
 * @subpackage Custom_Product_Full_Stack/includes
 * @author     Parth Dodiya <parthdodiya.dodiya@gmail.com>
 */
class Custom_Product_Full_Stack_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'custom-product-full-stack',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
