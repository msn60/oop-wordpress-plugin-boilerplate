<?php
/**
 * OOP WordPress Plugin Boilerplate
 *
 * Description for OOP Plugin
 *
 * @link              https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since             1.0.2
 * @package           Plugin_Name_Name_Space
 *
 * @wordpress-plugin
 * Plugin Name:       OOP WordPress Plugin Boilerplate
 * Plugin URI:        https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * Description:       Description for OOP Plugin
 * Version:           1.0.2
 * Author:            Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * Author URI:        https://wpwebmaster.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Define your namespaces here by use keyword
 */
use Plugin_Name_Name_Space\Includes\Init\{
	Admin_Hook, Core, Constant, Activator, I18n, Public_Hook, Router
};
use Plugin_Name_Name_Space\Includes\Config\Initial_Value;
use Plugin_Name_Name_Space\Includes\Parts\Other\Remove_Post_Column;
use Plugin_Name_Name_Space\Includes\Uninstall\{
	Deactivator, Uninstall
};
use Plugin_Name_Name_Space\Includes\Admin\{
	Admin_Menu1, Admin_Sub_Menu1, Admin_Sub_Menu2, Meta_Box3, Meta_Box4, Simple_Setting_Page1,
	Simple_Setting_In_Reading_Page1, Option_Menu1, Option_Menu2, Setting_Page1,
	Notices\Admin_Notice1, Notices\Woocommerce_Deactive_Notice
};

use Plugin_Name_Name_Space\Includes\Functions\Init_Functions;
use Plugin_Name_Name_Space\Includes\Database\Table;
use Plugin_Name_Name_Space\Includes\Parts\Shortcodes\{
	Shortcode1, Content_For_Login_User_Shortcode, Complete_Shortcode
};
use Plugin_Name_Name_Space\Includes\Parts\Custom_Posts\Custom_Post1;
use Plugin_Name_Name_Space\Includes\Parts\Custom_Taxonomies\Custom_Taxonomy1;
use Plugin_Name_Name_Space\Includes\Hooks\Filters\Custom_Cron_Schedule;

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
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
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
			function () {
				$this->activate(
					new Activator( intval( get_option( 'last_plugin_name_dbs_version' ) ) )
				);
			}
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
			function () {
				$this->deactivate(
					new Deactivator()
				);
			}
		);
		/**
		 * Register uninstall hook.
		 * Register uninstall hook for this plugin by invoking uninstall
		 * in Plugin_Name_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is uninstalled.
		 */
		register_uninstall_hook(
			__FILE__,
			array( 'Plugin_Name_Plugin', 'uninstall' )
		);
	}

	/**
	 * Call activate method.
	 * This function calls activate method from Activator class.
	 * You can use from this method to run every thing you need when plugin is activated.
	 *
	 * @access public
	 * @since  1.0.2
	 * @see    Plugin_Name_Name_Space\Includes\Init\Activator Class
	 */
	public function activate( Activator $activator_object ) {
		global $wpdb;
		$activator_object->activate(
			true,
			[
				new Custom_Post1( $this->initial_values->sample_custom_post1() )
			],
			[
				new Custom_Taxonomy1( $this->initial_values->sample_custom_taxonomy1() )
			],
			new Table( $wpdb, PLUGIN_NAME_DB_VERSION, get_option( 'has_table_name' ) )
		);
	}

	/**
	 * Call deactivate method.
	 * This function calls deactivate method from Dectivator class.
	 * You can use from this method to run every thing you need when plugin is deactivated.
	 *
	 * @access public
	 * @since  1.0.2
	 */
	public function deactivate( Deactivator $deaactivator_object ) {
		$deaactivator_object->deactivate();
	}

	/**
	 * Create an instance from Plugin_Name_Plugin class.
	 *
	 * @access public
	 * @since  1.0.2
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
	 * @since  1.0.2
	 */
	public static function uninstall() {
		Uninstall::uninstall();
	}

	/**
	 * Load Core plugin class.
	 *
	 * @access public
	 * @since  1.0.2
	 */
	public function run_plugin_name_plugin() {
		$this->initial_values = new Initial_Value();
		$this->core_object    = new Core(
			$this->initial_values,
			new Init_Functions(),
			new I18n(),
			new Admin_Hook( PLUGIN_NAME_MAIN_NAME, PLUGIN_NAME_VERSION ),
			new Public_Hook( PLUGIN_NAME_MAIN_NAME, PLUGIN_NAME_VERSION ),
			new Router(),
			[
				new Admin_Menu1( $this->initial_values->sample_menu_page() )
			],
			[
				new Admin_Sub_Menu1( $this->initial_values->sample_sub_menu_page1() ),
				new Admin_Sub_Menu2( $this->initial_values->sample_sub_menu_page2() ),
			],
			[
				new Meta_Box3( $this->initial_values->sample_meta_box3() ),
				new Meta_Box4( $this->initial_values->sample_meta_box4() ),
			],
			[
				new Shortcode1( $this->initial_values->sample_shortcode1() ),
				new Complete_Shortcode( $this->initial_values->sample_complete_shortcode() ),
				new Content_For_Login_User_Shortcode( $this->initial_values->sample_content_for_login_user_shortcode() ),
			],
			[
				new Custom_Post1( $this->initial_values->sample_custom_post1() )
			],
			[
				new Custom_Taxonomy1( $this->initial_values->sample_custom_taxonomy1() )
			],
			[
				'admin_notice1' => new Admin_Notice1(),
				'woocommerce_deactivate_notice' => new Woocommerce_Deactive_Notice(),
			],
			[
				new Option_Menu1($this->initial_values->sample_option_page()),
			],
			[
				new Simple_Setting_Page1( $this->initial_values->sample_setting_page1()),
				new Simple_Setting_In_Reading_Page1( $this->initial_values->sample_setting_in_reading_page1()),
			],
			[
				new Setting_Page1(
					$this->initial_values->get_complete_setting_page_arguments(),
					new Option_Menu2($this->initial_values->get_option_menu2())
				)
			],
			new Custom_Cron_Schedule( $this->initial_values->sample_custom_cron_schedule() )
		);
		$this->core_object->init_core();
	}
}


$plugin_name_plugin_object = Plugin_Name_Plugin::instance();
$plugin_name_plugin_object->run_plugin_name_plugin();
