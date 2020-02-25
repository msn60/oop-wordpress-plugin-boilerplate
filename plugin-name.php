<?php
/**
 * OOP WordPress Plugin Boilerplate
 *
 * Description for OOP Plugin
 *
 * @link              https://github.com/msn60/oop-wordpress-pluging-boilerplate-light-version
 * @since             1.0.0
 * @package           Plugin_Name_Name_Space
 *
 * @wordpress-plugin
 * Plugin Name:       OOP WordPress Plugin Boilerplate
 * Plugin URI:        https://github.com/msn60/oop-wordpress-pluging-boilerplate-light-version
 * Description:       Description for OOP Plugin
 * Version:           1.0.2
 * Author:            Mehdi Soltani
 * Author URI:        https://wpwebmaster.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
 * Define your namespaces here by use keyword
 * */

use Plugin_Name_Name_Space\Includes\Init\Core;
use Plugin_Name_Name_Space\Includes\Init\Constant;
use Plugin_Name_Name_Space\Includes\Init\Activator;
use Plugin_Name_Name_Space\Includes\Config\Initial_Value;
use Plugin_Name_Name_Space\Includes\Uninstall\Deactivator;
use Plugin_Name_Name_Space\Includes\Uninstall\Uninstall;

/**
 * If this file is called directly, then abort execution.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Class Plugin_Name_Plugin
 *
 * This class is primary file of plugin which is used from
 * singletone design pattern.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Your_Name <youremail@nomail.com>
 * @see        Plugin_Name_Name_Space\Includes\Init\Core Class
 * @see        Plugin_Name_Name_Space\Includes\Init\Constant Class
 * @see        Plugin_Name_Name_Space\Includes\Init\Activator Class
 * @see        Plugin_Name_Name_Space\Includes\Uninstall\Deactivator Class
 * @see        Plugin_Name_Name_Space\Includes\Uninstall\Uninstall Class
 */
final class Plugin_Name_Plugin {
	/**
	 * Instance property of Plugin_Name_Plugin Class.
	 * This is a property in your plugin primary class. You will use to create
	 * one object from Plugin_Name_Plugin class in whole of program execution.
	 *
	 * @access private
	 * @var    Plugin_Name_Plugin $instance create only one instance from plugin primary class
	 * @static
	 */
	private static $instance;
	/**
	 * @var Initial_Value $initial_values An object  to keep all of initial values for theme
	 */
	protected $initial_values;
	/**
	 * @var Core $core_object An object to keep core class for plugin.
	 */
	private $core_object;

	/**
	 * Plugin_Name_Plugin constructor.
	 * It defines related constant, include autoloader class, register activation hook,
	 * deactivation hook and uninstall hook and call Core class to run dependencies for plugin
	 *
	 * @access private
	 */
	public function __construct() {
		/**
		 * Currently plugin and database version.
		 * Rename this for your plugin and update it as you release new versions.
		 */
		define( 'PLUGIN_NAME_VERSION', '1.0.2' );
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
		 * Register activation hook for this plugin by invoking activate
		 * in Plugin_Name_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is activated.
		 */
		register_activation_hook(
			__FILE__,
			array( $this, 'activate' )
		);
		/**
		 * Register deactivation hook.
		 * Register deactivation hook for this plugin by invoking deactivate
		 * in Plugin_Name_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is deactivated.
		 */
		register_deactivation_hook(
			__FILE__,
			array( $this, 'deactivate' )
		);
		/**
		 * Register deactivation hook.
		 * Register deactivation hook for this plugin by invoking deactivate
		 * in Plugin_Name_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is deactivated.
		 */
		register_uninstall_hook(
			__FILE__,
			array( 'Plugin_Name_Plugin', 'uninstall' )
		);
	}

	/**
	 * Load Core plugin class.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function run_plugin_name_plugin() {
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
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Call uninstall method.
	 * This function calls uninstall method from Uninstall class.
	 * You can use from this method to run every thing you need when plugin is uninstalled.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public static function uninstall() {
		Uninstall::uninstall();
	}

	/**
	 * Call activate method.
	 * This function calls activate method from Activator class.
	 * You can use from this method to run every thing you need when plugin is activated.
	 *
	 * @access public
	 * @since  1.0.0
	 * @see    Plugin_Name_Name_Space\Includes\Init\Activator Class
	 */
	public function activate() {
		Activator::activate();
	}

	/**
	 * Call deactivate method.
	 * This function calls deactivate method from Dectivator class.
	 * You can use from this method to run every thing you need when plugin is deactivated.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function deactivate() {
		Deactivator::deactivate();
	}
}


$plugin_name_plugin_object = Plugin_Name_Plugin::instance();
$plugin_name_plugin_object->run_plugin_name_plugin();


