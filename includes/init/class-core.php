<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.0
 */

namespace Plugin_Name_Name_Space\Includes\Init;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Plugin_Name_Name_Space\Includes\Abstracts\{
	Admin_Menu, Admin_Sub_Menu, Ajax, Meta_box
};

use Plugin_Name_Name_Space\Includes\Interfaces\{
	Action_Hook_Interface, Filter_Hook_Interface
};
use Plugin_Name_Name_Space\Includes\Admin\{
	Admin_Menu1, Admin_Sub_Menu1, Admin_Sub_Menu2
};
use Plugin_Name_Name_Space\Includes\Config\{
	Register_Post_Type, Sample_Post_Type, Initial_Value
};
use Plugin_Name_Name_Space\Includes\Functions\{
	Init_Functions, Utility, Check_Type
};

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
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Core implements Action_Hook_Interface {
	use Utility;
	use Check_Type;
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
	protected $plugin_version;

	/**
	 * @var Public_Hook $public_hooks Object  to keep all of hooks in your plugin
	 */
	protected $public_hooks;

	/**
	 * @var Admin_Hook $admin_hooks Object  to keep all of hooks in your plugin
	 */
	protected $admin_hooks;

	/**
	 * @var Admin_Menu[] $admin_menus
	 */
	protected $admin_menus;

	/**
	 * @var Admin_Sub_Menu[] $admin_sub_menus
	 */
	protected $admin_sub_menus;

	/**
	 * @var Ajax[] $ajax_calls
	 */
	protected $ajax_calls;

	/**
	 * @var Initial_Value $initial_values An object  to keep all of initial values for plugin
	 */
	protected $initial_values;

	/**
	 * @var Meta_box[] $meta_boxes
	 */
	protected $meta_boxes;

	/**
	 * @var Init_Functions $init_functions Object  to keep all initial function in plugin
	 */
	protected $init_functions;
	/**
	 * @var I18n $plugin_i18n Object  to add text domain for plugin
	 */
	protected $plugin_i18n;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct(
		Initial_Value $initial_values,
		Init_Functions $init_functions = null,
		I18n $plugin_i18n = null,
		Admin_Hook $admin_hooks = null,
		Public_Hook $public_hooks = null,
		array $admin_menus = null,
		array $admin_sub_menus = null,
		array $meta_boxes = null,
		array $ajax_calls = null
	) {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->plugin_version = PLUGIN_NAME_VERSION;
		} else {
			$this->plugin_version = '1.0.0';
		}
		if ( defined( 'PLUGIN_NAME_MAIN_NAME' ) ) {
			$this->plugin_name = PLUGIN_NAME_MAIN_NAME;
		} else {
			$this->plugin_name = 'plugin-name';
		}

		$this->initial_values = $initial_values;

		if ( ! is_null( $init_functions ) ) {
			$this->init_functions = $init_functions;
		}

		if ( ! is_null( $plugin_i18n) ) {
			$this->plugin_i18n = $plugin_i18n;
		}

		if ( ! is_null( $admin_hooks ) ) {
			$this->admin_hooks = $admin_hooks;
		}

		if ( ! is_null( $public_hooks ) ) {
			$this->public_hooks = $public_hooks;
		}
		/*
		 * Checking for valid types
		 * */
		if ( ! is_null( $admin_menus ) ) {
			$this->admin_menus = $this->check_array_by_parent_type( $admin_menus, Admin_Menu::class )['valid'];
		}

		if ( ! is_null( $admin_sub_menus ) ) {
			$this->admin_sub_menus = $this->check_array_by_parent_type( $admin_sub_menus, Admin_Sub_Menu::class )['valid'];
		}

		if ( ! is_null( $meta_boxes ) ) {
			$this->meta_boxes = $this->check_array_by_parent_type( $meta_boxes, Meta_box::class )['valid'];;
		}

		if ( ! is_null( $ajax_calls ) ) {
			$this->ajax_calls = $this->check_array_by_parent_type( $ajax_calls, Ajax::class )['valid'];;
		}

	}


	/**
	 * Run the Needed methods for plugin
	 *
	 * In run method, you can run every methods that you need to run every time that your plugin is loaded.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function init_core() {
		$this->register_add_action();
	}

	/**
	 * Register all needed add_actions for this plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 *
	 */
	public function register_add_action() {
		if (! is_null($this->init_functions)) {
			$this->init_functions->register_add_action();
		}
		if (! is_null($this->plugin_i18n)) {
			$this->plugin_i18n->register_add_action();
		}

		if ( is_admin() ) {
			$this->set_admin_menus();
			if (! is_null($this->admin_hooks)) {
				$this->admin_hooks->register_add_action();
			}

			//$this->set_meta_boxes();
			/*add_action( 'load-post.php', array( $this, 'set_meta_boxes' ) );
			add_action( 'load-post-new.php', array( $this, 'set_meta_boxes' ) );*/
		} else {
			if (! is_null($this->public_hooks)) {
				$this->public_hooks->register_add_action();
			}
/*			if (! is_null()) {

			}*/
			$this->check_url();
		}
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
		return $this->plugin_version;
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
	 * @see      \Plugin_Name_Name_Space\Includes\Init\Router
	 */
	private function check_url() {
		$check_url_object = new Router();
		add_action( 'init', array( $check_url_object, 'boot' ) );
	}


	/**
	 * Method to set all of needed admin menus and sub menus
	 *
	 * @access private
	 * @since  1.0.1
	 */
	private function set_admin_menus() {
		if ( ! is_null( $this->admin_menus ) ) {
			foreach ( $this->admin_menus as $admin_menu ) {
				$admin_menu->register_add_action();
			}
		}

		if ( ! is_null( $this->admin_sub_menus ) ) {
			foreach ( $this->admin_sub_menus as $admin_sub_menu ) {
				$admin_sub_menu->register_add_action();
			}
		}

	}

}

