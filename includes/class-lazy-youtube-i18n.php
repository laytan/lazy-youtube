<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       github.com/laytan
 * @since      1.0.0
 *
 * @package    Lazy_Youtube
 * @subpackage Lazy_Youtube/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Lazy_Youtube
 * @subpackage Lazy_Youtube/includes
 * @author     Laytan Laats <laytanlaats@hotmail.com>
 */
class Lazy_Youtube_I18n {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'lazy-youtube',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
