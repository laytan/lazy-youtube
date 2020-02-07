<?php
/**
 * The registering of the lazy youtube block
 *
 * @link       https://github.com/laytan
 * @since      1.0.0
 *
 * @package    Lazy_Youtube
 * @subpackage Lazy_Youtube/block
 */

/**
 * Register the block
 *
 * @package    Lazy_Youtube
 * @subpackage Lazy_Youtube/admin
 * @author     Laytan Laats <laytanlaats@hotmail.com>
 */
class Lazy_Youtube_Block {
	/**
	 * The ID of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string  $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string  $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Called on the WordPress init hook.
	 *
	 * Registers the block.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		$asset_file = include( plugin_dir_path( __FILE__ ) . 'dist/lazy-youtube-block.asset.php' );
		wp_register_script(
			'lazy-youtube-block',
			plugins_url( 'dist/lazy-youtube-block.js', __FILE__ ),
			$asset_file['dependencies'],
			$asset_file['version']
		);

		// Give access to our youtube icon
		wp_localize_script( 'lazy-youtube-block', 'assets', array( 'youtubeIcon' => plugins_url( 'lazy-youtube/assets/youtube-brands.svg' ) ) );

		// Let WordPress know that our block needs to be translated and where to find the json translation file in the format ${domain}-${locale}-${handle}.json
		wp_set_script_translations( 'lazy-youtube-block', 'lazy-youtube', dirname( __FILE__, 2 ) . '\languages\json' );

		register_block_type(
			'lazy-youtube/lazy-youtube-block',
			array(
				'editor_script' => 'lazy-youtube-block',
			),
		);

	}
}
