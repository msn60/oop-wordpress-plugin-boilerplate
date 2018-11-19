<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @package    Plugin_Name_Dir\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Dir\Includes\Init;

use Plugin_Name_Dir\Includes\Admin\Admin_Menu;
use Plugin_Name_Dir\Includes\Admin\Admin_Sub_Menu;
use Plugin_Name_Dir\Includes\Functions\Init_Functions;
use Plugin_Name_Dir\Includes\Config\Initial_Value;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.1
 * @package    Plugin_Name_Dir\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 */
class Core {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $plugin_name The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'plugin_name';

		$this->load_dependencies();
		$this->set_locale();
		if ( is_admin() ) {
			$this->set_admin_menu();
			$this->define_admin_hooks();
		}

		if ( ! is_admin() ) {
			$this->define_public_hooks();
			$this->check_url();
		}

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * You can Include related files or init functions that you need when
	 * your plugin is executed. The first thing is creating an object from
	 * Loader class that can run all of actions and filters in your plugin
	 * in an organized way.
	 * Then e.g. you can load init functions that you need in starting of your
	 * plugin (in this sample, we use from Init_Function class and related static
	 * methods)
	 * Notice that create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @see      \Plugin_Name_Dir\Includes\Init\Loader
	 * @see      \Plugin_Name_Dir\Includes\Functions\Init_Functions
	 */
	private function load_dependencies() {

		$this->loader             = new Loader();
		$plugin_name_hooks_loader = new Init_Functions();
		$this->loader->add_action( 'init', $plugin_name_hooks_loader, 'app_output_buffer' );
		/**
		$this->loader->add_action( 'init', $plugin_name_hooks_loader, 'remove_admin_bar' );
		 */
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Plugin_Name_I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @see      \Plugin_Name_Dir\Includes\Init\I18n
	 */
	private function set_locale() {

		$plugin_i18n = new I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Define admin menu for your plugin
	 *
	 * If you need some admin menus in WordPress admin panel, you can use
	 * from this method.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @see      \Plugin_Name_Dir\Includes\Admin\Admin_Menu
	 * @see      \Plugin_Name_Dir\Includes\Config\Initial_Value
	 */
	private function set_admin_menu() {
		$plugin_name_sample_admin_menu = new Admin_Menu( Initial_Value::sample_menu_page() );
		$this->loader->add_action( 'admin_menu', $plugin_name_sample_admin_menu, 'add_admin_menu_page' );

		$plugin_name_sample_admin_sub_menu1 = new Admin_Sub_Menu( Initial_Value::sample_sub_menu_page1() );
		$this->loader->add_action( 'admin_menu', $plugin_name_sample_admin_sub_menu1, 'add_admin_sub_menu_page' );

		$plugin_name_sample_admin_sub_menu2 = new Admin_Sub_Menu( Initial_Value::sample_sub_menu_page2() );
		$this->loader->add_action( 'admin_menu', $plugin_name_sample_admin_sub_menu2, 'add_admin_sub_menu_page' );

	}

	/**
	 * Define hooks these are needed in admin panel of WordPress
	 *
	 * If you need to some hooks these are needed in WordPress admin panel
	 * you can use from this method. In this boilerplate, I only use it to
	 * register and enqueueing styles and scripts in admin panel
	 *
	 * @since    1.0.0
	 * @access   private
	 * @see      \Plugin_Name_Dir\Includes\Init\Admin_Hook
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Admin_Hook( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

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
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @see      \Plugin_Name_Dir\Includes\Init\Public_Hook
	 */
	private function define_public_hooks() {

		$plugin_public = new Public_Hook( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Define router to handle url request
	 *
	 * If you need to check url and redirect user to other page except admin
	 * panel of WordPress (or you need to have specific panel for your WordPress
	 * site), you need to handle request by routers. To do that, you can use from
	 * Router class to manage your routes inside of your plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @see      \Plugin_Name_Dir\Includes\Init\Router
	 */
	private function check_url() {
		$check_url_object = new Router();
		$this->loader->add_action( 'init', $check_url_object, 'boot' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @see      \Plugin_Name_Dir\Includes\Init\Loader
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @access    public
	 * @return    Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}
}

