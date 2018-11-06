<?php
/**
 * Initial_Value Class File
 *
 * Role of this class is like RC configuration files in application. If you need
 * to initial value to start your plugin or need them for each time that WordPress
 * run your plugin, you can use from this class.
 *
 * @package    Plugin_Name_Dir\Includes\Config
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Dir\Includes\Config;

/**
 * Class Initial_Value.
 * If you need to initial value to start your plugin or need them for
 * each time that WordPress run your plugin, you can use from this class.
 *
 * @package    Plugin_Name_Dir\Includes\Config
 * @author     Your_Name <youremail@nomail.com>
 */
class Initial_Value {

	/**
	 * Initial values to create admin menu page.
	 *
	 * @access public
	 * @static
	 * @see    Includes/Admin/Admin_Menu
	 * @return array It returns all of arguments that add_menu_page function needs.
	 */
	public static function sample_menu_page() {
		$initial_value = [
			'page_title'        => 'Sample Title',
			'menu_title'        => 'Sample menu',
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-prefix-sample-url',
			'callable_function' => 'management_panel_handler',
			'icon_url'          => 'dashicons-welcome-widgets-menus',
			'position'          => 2,
		];

		return $initial_value;
	}

	/**
	 * Initial values to create admin submenu page (submenu1).
	 *
	 * @access public
	 * @static
	 * @see    Includes/Admin/Admin_Sub_Menu
	 * @return array It returns all of arguments that add_submenu_page function needs.
	 */
	public static function sample_sub_menu_page1() {
		$initial_value = [
			'parent-slug'       => 'plugin-prefix-sample-url',
			'page_title'        => 'Sample Submenu 1',
			'menu_title'        => 'Submenu 1',
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-prefix-sample-url',
			'callable_function' => 'sub_menu1_panel_handler',
		];

		return $initial_value;
	}

	/**
	 * Initial values to create admin submenu page (submenu2).
	 *
	 * @access public
	 * @static
	 * @see    Includes/Admin/Admin_Sub_Menu
	 * @return array It returns all of arguments that add_submenu_page function needs.
	 */
	public static function sample_sub_menu_page2() {
		$initial_value = [
			'parent-slug'       => 'plugin-prefix-sample-url',
			'page_title'        => 'Sample Submenu 2',
			'menu_title'        => 'Submenu 2',
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-prefix-sample-url-2',
			'callable_function' => 'sub_menu2_panel_handler',
		];

		return $initial_value;
	}
}
