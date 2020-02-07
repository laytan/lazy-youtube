<?php
/**
 * The file that defines the core plugin class
 *
 * @link https://github.com/laytan
 * @since 1.0.0
 *
 * @package Lazy_Youtube
 * @subpackage Lazy_Youtube/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Lazy_Youtube
 * @subpackage Lazy_Youtube/includes
 * @author     Laytan Laats <laytanlaats@hotmail.com>
 */
class Lazy_Youtube {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * The base path of the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $base_path The base path of the plugin.
	 */
	protected $base_path;

	/**
	 * Set up the plugin
	 *
	 * @since 1.0.0
	 */
	public function __construct( $base_path ) {
		$this->version     = defined( 'LAZY_YOUTUBE_VERSION' ) ? LAZY_YOUTUBE_VERSION : '1.0.0';
		$this->plugin_name = 'lazy-youtube';
		$this->base_path   = $base_path;

		$this->load_dependencies();
		$this->set_locale();
		$this->define_block_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Lazy_Youtube_Loader. Orchestrates the hooks of the plugin.
	 * - Lazy_Youtube_i18n. Defines internationalization functionality.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-lazy-youtube-i18n.php';

		/**
		 * The class responsible for the block functionality.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'block/class-lazy-youtube-block.php';
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Lazy_Youtube_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Lazy_Youtube_I18n();

		add_action( 'plugins_loaded', array( $plugin_i18n, 'load_plugin_textdomain' ), 10 );
	}

	/**
	 * Register all of the hooks related to the block's functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_block_hooks() {

		$plugin_block = new Lazy_Youtube_Block( $this->get_plugin_name(), $this->get_version() );
		add_action( 'init', array( $plugin_block, 'init' ), 10 );
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Lazy_Youtube_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
