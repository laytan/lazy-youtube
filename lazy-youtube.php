<?php
/**
 * Plugin setup
 *
 * @link https://github.com/laytan
 * @since 1.0.0
 * @package Lazy_Youtube
 *
 * @wordpress-plugin
 * Plugin Name: Lazy Youtube
 * Plugin URI:  https://github.com/laytan/lazy-youtube
 * Description: A gutenberg Youtube embed block that only loads Youtube assets when the user needs them.
 * Version:     1.0.0
 * Author:      Laytan Laats
 * Author URI:  https://github.com/laytan
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: lazy-youtube
 * Domain Path: /languages
 */

// Abort if called directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Lazy youtube version
 *
 * @link https://semver.org
 */
define( 'LAZY_YOUTUBE_VERSION', '1.0.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lazy-youtube.php';
$plugin = new Lazy_Youtube( plugin_dir_path( __FILE__ ) );
