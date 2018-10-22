<?php
/**
 * WordPress OOP Plugin Boilerplate
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also includes all of the dependencies used by
 * the plugin, registers the activation and deactivation functions, and defines
 * a function that starts the plugin.
 *
 * @link              https://github.com/msn60/oop-wordpress-boilerplate
 * @since             1.0.0
 * @package           plugin_name
 *
 * @wordpress-plugin
 * Plugin Name:       OOP WordPress Plugin Boilerplate
 * Plugin URI:        https://github.com/msn60/oop-wordpress-boilerplate
 * Description:       This is a boilerplate for plugin development in WordPress with OOP structure
 * Version:           1.2.1
 * Author:            Mehdi Soltani
 * Author URI:        https://wpwebmaster.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*Define your namespaces here by use keyword*/

use Plugin_Name_Dir\Includes\Init\Core;
use Plugin_Name_Dir\Includes\Init\Constant;
use Plugin_Name_Dir\Includes\Init\Activator;
use Plugin_Name_Dir\Includes\Uninstall\Deactivator;
use Plugin_Name_Dir\Includes\Uninstall\Uninstall;

// If this file is called directly, then abort execution.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class Plugin_Name_Plugin
 *
 * This class is primary file of plugin which is used from
 * singletone design pattern.
 *
 * @package    plugin_name
 * @author     Your_Name <youremail@nomail.com>
 */
class Plugin_Name_Plugin {
	/**
	 * @access private
	 * @var    Plugin_Name_Plugin $instance create only one instance from plugin primary class
	 */
	private static $instance;

	/**
	 * Plugin_Name_Plugin constructor.
	 * It defines related constant, include autoloader class, register activation hook,
	 * deactivation hook and uninstall hook and call Core class to run dependencies for plugin
	 */
	private function __construct() {
		/**
		 * Currently plugin and database version.
		 * Rename this for your plugin and update it as you release new versions.
		 */
		define( 'PLUGIN_NAME_VERSION', '1.0.1' );
		/**
		 * Define database version
		 *
		 * You can use from this constant to apply your changes in updates or
		 * activate plugin again
		 */
		define( 'PLUGIN_NAME_DB_VERSION', 1 );

		/*Define Autoloader class for plugin*/
		$autoloader_path = 'includes/class-autoloader.php';
		/**
		 * Include autoloader class to load all of classes inside this plugin
		 */
		require_once trailingslashit( plugin_dir_path( __FILE__ ) ) . $autoloader_path;
		/*Define required constant for plugin*/
		Constant::define_constant();

		/**
		 * Register activation hook.
		 * Register activation hook for this plugin by invoking activate_plugin_name
		 * in Plugin_Name_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is activated.
		 */
		register_activation_hook(
			__FILE__,
			array( $this, 'activate_plugin_name' )
		);
		/**
		 * Register deactivation hook.
		 * Register deactivation hook for this plugin by invoking deactivate_plugin_name
		 * in Plugin_Name_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is deactivated.
		 */
		register_deactivation_hook(
			__FILE__,
			array( $this, 'deactivate_plugin_name' )
		);
		/**
		 * Register deactivation hook.
		 * Register deactivation hook for this plugin by invoking deactivate_plugin_name
		 * in Plugin_Name_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is deactivated.
		 */
		register_uninstall_hook(
			__FILE__,
			array( $this, 'uninstall_plugin_name' )
		);
		self::run_plugin_name_plugin();
	}

	/**
	 * Load Core plugin class.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public static function run_plugin_name_plugin() {
		$plugin = new Core();
		$plugin->run();
	}

	/**
	 * Create an instance from Plugin_Name_Plugin class.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return Plugin_Name_Plugin
	 */
	public static function instance() {
		if ( is_null( ( self::$instance ) ) ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public function activate_plugin_name() {
		Activator::activate();
	}

	public function deactivate_plugin_name() {
		Deactivator::deactivate();
	}

	public function uninstall_plugin_name() {
		Uninstall::uninstall();
	}
}

Plugin_Name_Plugin::instance();




