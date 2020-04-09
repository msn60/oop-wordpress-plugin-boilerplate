<?php
/**
 * Public_Hook Class File
 *
 * This file contains hooks that you need in public
 * (like enqueue styles or scripts in front end)
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Init;

use Plugin_Name_Name_Space\Includes\Interfaces\Action_Hook_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Public_Hook implements Action_Hook_Interface {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $plugin_version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.2
	 * @access   public
	 *
	 * @param      string $plugin_name    The name of the plugin.
	 * @param      string $plugin_version The version of this plugin.
	 */
	public function __construct( $plugin_name, $plugin_version ) {

		$this->plugin_name    = $plugin_name;
		$this->plugin_version = $plugin_version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.2
	 * @access   public
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style(
			$this->plugin_name . '-public-style',
			PLUGIN_NAME_CSS . 'plugin-name-public-ver-' . PLUGIN_NAME_CSS_VERSION . '.css',
			array(),
			null,
			'all'
		);
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.2
	 * @access   public
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script(
			$this->plugin_name . '-public-script',
			PLUGIN_NAME_JS . 'plugin-name-public-ver-' . PLUGIN_NAME_JS_VERSION . '.js',
			array( 'jquery' ),
			null,
			true
		);
	}

	/**
	 * Register actions that the object needs to be subscribed to.
	 *
	 */
	public function register_add_action() {
		$this->set_enqueue_scripts_action();
	}

	/**
	 * Register enqueue scripts action
	 */
	public function set_enqueue_scripts_action() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}
}

