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
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Init;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Plugin_Name_Name_Space\Includes\Abstracts\{
	Admin_Menu,
	Admin_Notice,
	Admin_Sub_Menu,
	Ajax,
	Custom_Taxonomy,
	Meta_box,
	Option_Menu,
	Simple_Setting_Page,
	Setting_Page,
	Shortcode,
	Custom_Post_Type,
	Setting_Page2
};

use Plugin_Name_Name_Space\Includes\Hooks\Filters\Custom_Cron_Schedule;
use Plugin_Name_Name_Space\Includes\Interfaces\{
	Action_Hook_Interface, Filter_Hook_Interface
};
use Plugin_Name_Name_Space\Includes\Admin\{
	Admin_Menu1, Admin_Sub_Menu1, Admin_Sub_Menu2, Option_Menu1,
	Setting_Page1
};
use Plugin_Name_Name_Space\Includes\Config\Initial_Value;
use Plugin_Name_Name_Space\Includes\Functions\{
	Init_Functions, Utility, Check_Type, Log_In_Footer, Activation_Issue
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
 * @since      1.0.2
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Core implements Action_Hook_Interface, Filter_Hook_Interface {
	use Utility;
	use Check_Type;
	use Activation_Issue;
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.2
	 * @access   protected
	 * @var      string $plugin_name The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.2
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
	 * @var Option_Menu[] $admin_option_menus
	 */
	protected $admin_option_menus;

	/**
	 * @var Simple_Setting_Page[] $simple_settings_pages
	 */
	protected $simple_settings_pages;

	/**
	 * @var Setting_Page[] $simple_settings_pages
	 */
	protected $settings_pages;
	/**
	 * @var Ajax[] $ajax_calls
	 */
	protected $ajax_calls;

	/**
	 * @var Shortcode[] $shortcodes
	 */
	protected $shortcodes;

	/**
	 * @var Initial_Value $initial_values An object  to keep all of initial values for plugin
	 */
	protected $initial_values;

	/**
	 * @var Meta_box[] $meta_boxes
	 */
	protected $meta_boxes;

	/**
	 * @var Custom_Post_Type[] $custom_posts
	 */
	protected $custom_posts;

	/**
	 * @var Custom_Taxonomy[] $custom_taxonomies
	 */
	protected $custom_taxonomies;

	/**
	 * @var Admin_Notice[] $admin_notices
	 */
	protected $admin_notices;

	/**
	 * @var Custom_Cron_Schedule $custom_cron_schedule
	 */
	protected $custom_cron_schedule;

	/**
	 * @var Init_Functions $init_functions Object  to keep all initial function in plugin
	 */
	protected $init_functions;
	/**
	 * @var I18n $plugin_i18n Object  to add text domain for plugin
	 */
	protected $plugin_i18n;

	/**
	 * @var Router $router Object  to check url and related routes
	 */
	protected $router;

	/**
	 * @var Log_In_Footer $log_in_footer Object  to write log message
	 */
	protected $log_in_footer;

	/**
	 * @var bool $is_need_run_init_test To check if need to run test in init method
	 */
	protected $is_need_run_init_test = false;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.2
	 */
	public function __construct(
		Initial_Value $initial_values,
		Init_Functions $init_functions = null,
		I18n $plugin_i18n = null,
		Admin_Hook $admin_hooks = null,
		Public_Hook $public_hooks = null,
		Router $router = null,
		array $admin_menus = null,
		array $admin_sub_menus = null,
		array $meta_boxes = null,
		array $shortcodes = null,
		array $custom_posts = null,
		array $custom_taxonomies = null,
		array $admin_notices = null,
		array $admin_option_menus = null,
		array $simple_settings_pages = null,
		array $settings_pages = null,
		Custom_Cron_Schedule $custom_cron_schedule = null,
		array $ajax_calls = null

	) {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->plugin_version = PLUGIN_NAME_VERSION;
		} else {
			$this->plugin_version = '1.0.2';
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

		if ( ! is_null( $plugin_i18n ) ) {
			$this->plugin_i18n = $plugin_i18n;
		}

		if ( ! is_null( $admin_hooks ) ) {
			$this->admin_hooks = $admin_hooks;
		}

		if ( ! is_null( $public_hooks ) ) {
			$this->public_hooks = $public_hooks;
		}

		if ( ! is_null( $router ) ) {
			$this->router = $router;
		}

		if ( ! is_null( $custom_cron_schedule ) ) {
			$this->custom_cron_schedule = $custom_cron_schedule;
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

		if ( ! is_null( $admin_option_menus ) ) {
			$this->admin_option_menus = $this->check_array_by_parent_type( $admin_option_menus, Option_Menu::class )['valid'];
		}

		if ( ! is_null( $simple_settings_pages ) ) {
			$this->simple_settings_pages = $this->check_array_by_parent_type( $simple_settings_pages, Simple_Setting_Page::class )['valid'];
		}

		if ( ! is_null( $settings_pages ) ) {
			$this->settings_pages = $this->check_array_by_parent_type( $settings_pages, Setting_Page::class )['valid'];
		}

		if ( ! is_null( $meta_boxes ) ) {
			$this->meta_boxes = $this->check_array_by_parent_type( $meta_boxes, Meta_box::class )['valid'];;
		}

		if ( ! is_null( $ajax_calls ) ) {
			$this->ajax_calls = $this->check_array_by_parent_type( $ajax_calls, Ajax::class )['valid'];;
		}
		if ( ! is_null( $shortcodes ) ) {
			$this->shortcodes = $this->check_array_by_parent_type( $shortcodes, Shortcode::class )['valid'];;
		}
		if ( ! is_null( $custom_posts ) ) {
			$this->custom_posts = $this->check_array_by_parent_type( $custom_posts, Custom_Post_Type::class )['valid'];;
		}
		if ( ! is_null( $custom_taxonomies ) ) {
			$this->custom_taxonomies = $this->check_array_by_parent_type( $custom_taxonomies, Custom_Taxonomy::class )['valid'];;
		}
		if ( ! is_null( $admin_notices ) ) {
			$this->admin_notices = $this->check_array_by_parent_type_assoc( $admin_notices, Admin_Notice::class )['valid'];;
		}

	}


	/**
	 * Run the Needed methods for plugin
	 *
	 * In run method, you can run every methods that you need to run every time that your plugin is loaded.
	 *
	 * @since    1.0.2
	 * @access   private
	 */
	public function init_core() {
		/*
				 * You can use something like in the following if you need to check enabling
				 * Woocommerce in your plugin:
				 *
				 if ( $this->is_woocommerce_active() ) {
				 			$this->register_add_action();
				 			$this->register_add_filter();
				 			$this->set_shortcodes();
				 			$this->for_testing();
				 		} else {
				 			$this->admin_notices['woocommerce_deactivate_notice']->register_add_action();
				    }
				 * */
		$this->register_add_action();
		$this->register_add_filter();
		$this->set_shortcodes();
		$this->set_custom_posts();
		$this->set_custom_taxonomies();
		$this->show_admin_notice();
		/**
		 * To show log of errors during plugin activation
		 */
		//$this->show_plugin_activation_error();

		//TODO: remove this section due to having header already send in plugin activation
		if ( $this->is_need_run_init_test ) {
			/**
			 * if you need to log something during execution, you can use from this method
			 */
			$this->log_in_footer = new Log_In_Footer();
			$this->write_log_during_execution(
				$this->log_in_footer,
				'Sample to test log class during plugin execution',
				PLUGIN_NAME_LOGS . 'execution-log.txt',
				'Test sample 1 '
			);

			$this->write_log_during_execution(
				$this->log_in_footer,
				'Sample to test log class during plugin execution',
				PLUGIN_NAME_LOGS . 'execution-log.txt',
				'Test sample 2 '
			);
		}

	}

	/**
	 * Register all needed add_actions for this plugin
	 *
	 * @since    1.0.2
	 * @access   private
	 *
	 */
	public function register_add_action() {
		/**
		 * If you need to log activation errors, you must use it
		 */
		//$this->register_error_activation_add_action();
		if ( ! is_null( $this->init_functions ) ) {
			$this->init_functions->register_add_action();
		}
		if ( ! is_null( $this->plugin_i18n ) ) {
			$this->plugin_i18n->register_add_action();
		}

		if ( is_admin() ) {
			$this->set_admin_menus();
			if ( ! is_null( $this->admin_hooks ) ) {
				$this->admin_hooks->register_add_action();
			}

			$this->set_meta_boxes();
			/*add_action( 'load-post.php', array( $this, 'set_meta_boxes' ) );
			add_action( 'load-post-new.php', array( $this, 'set_meta_boxes' ) );*/
		} else {
			if ( ! is_null( $this->public_hooks ) ) {
				$this->public_hooks->register_add_action();
			}
			/*			if (! is_null()) {

						}*/
			$this->router->register_add_action();
		}
		
	}

	/**
	 * Method to set all of needed admin menus and sub menus
	 *
	 * @access private
	 * @since  1.0.2
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

		if ( ! is_null( $this->admin_option_menus ) ) {
			foreach ( $this->admin_option_menus as $admin_option_menu ) {
				$admin_option_menu->register_add_action();
			}
		}

		if ( ! is_null( $this->simple_settings_pages ) ) {
			foreach ( $this->simple_settings_pages as $admin_settings_page ) {
				$admin_settings_page->register_add_action();
			}
		}

		if ( ! is_null( $this->settings_pages ) ) {
			foreach ( $this->settings_pages as $settings_page ) {
				$settings_page->register_add_action();
			}
		}

	}

	/**
	 * Method to set all of needed meta_boxes
	 *
	 * @access public
	 * @since  1.0.2
	 */
	public function set_meta_boxes() {
		foreach ( $this->meta_boxes as $meta_box ) {
			$meta_box->register_add_action();
		}
	}

	/**
	 * Register filters that the object needs to be subscribed to.
	 *
	 */
	public function register_add_filter() {
		$this->custom_cron_schedule->register_add_filter();
	}

	/**
	 * Method to set all of needed shortcodes for your plugin
	 *
	 * @access private
	 * @since  1.0.2
	 */
	private function set_shortcodes() {
		if ( ! is_null( $this->shortcodes ) ) {
			foreach ( $this->shortcodes as $shortcode ) {
				$shortcode->register_add_action();
			}
		}
	}

	/**
	 * Method to set all of needed custom post type for your plugin
	 *
	 * @access private
	 * @since  1.0.2
	 */
	private function set_custom_posts() {
		if ( ! is_null( $this->custom_posts ) ) {
			foreach ( $this->custom_posts as $custom_post ) {
				$custom_post->register_add_action();
			}
		}
	}

	/**
	 * Method to set all of needed custom taxonomies for your plugin
	 *
	 * @access private
	 * @since  1.0.2
	 */
	private function set_custom_taxonomies() {
		if ( ! is_null( $this->custom_taxonomies ) ) {
			foreach ( $this->custom_taxonomies as $custom_taxonomy ) {
				$custom_taxonomy->register_add_action();
			}
		}
	}

	/**
	 * Method to show all of needed admin notice in admin panel
	 *
	 * @access private
	 * @since  1.0.2
	 */
	private function show_admin_notice() {
		if ( ! is_null( $this->admin_notices ) ) {
			foreach ( $this->admin_notices as $key => $value ) {
				/*
				 * You do not need to this condition if you are using Woocommerce
				 * and have several admin notice to run.
				 * This condition is disable due to not having Woocommerce in default case of plugin boilerplate
				 * */
				if ( $key !== 'woocommerce_deactivate_notice' ) {
					$this->admin_notices[ $key ]->register_add_action();
				}
			}
		}
	}

	/**
	 * Method to log during plugin execution
	 *
	 * @param Log_In_Footer $log_in_footer_object Object of Log_In_Footer class
	 * @param string        $log_message          Log message that you need to write in log file
	 * @param string        $file_name            The path of log file that you need to write on
	 * @param string        $type                 Type of log file which is use in Logger trait method
	 */
	public function write_log_during_execution( Log_In_Footer $log_in_footer_object, string $log_message, string $file_name, string $type ) {
		$args                = [];
		$args['log_message'] = $log_message;
		$args['file_name']   = $file_name;
		$args['type']        = $type;
		$log_in_footer_object->register_add_action_with_arguments( $args );

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.2
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.2
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->plugin_version;
	}
}

