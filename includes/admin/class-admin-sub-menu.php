<?php
/**
 * Admin_Sub_Menu Class File
 *
 * This file contains Admin_Sub_Menu class. If you want create an sub menu page
 * under an admin page (inside Admin panel of WordPress), you can use from this class.
 *
 * @package    Plugin_Name_Dir\Includes\Admin
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Dir\Includes\Admin;

/**
 * Class Admin_Sub_Menu.
 * If you want create an sub menu page under an admin page
 * (inside Admin panel of WordPress), you can use from this class.
 *
 * @package    Plugin_Name_Dir\Includes\Admin
 * @author     Your_Name <youremail@nomail.com>
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_submenu_page/
 */
class Admin_Sub_Menu {

	/**
	 * Define parent_slug property in Admin_Sub_Menu class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     private
	 * @var string $parent_slug The slug name for the parent menu.
	 * @since      1.0.0
	 */
	private $parent_slug;
	/**
	 * Define page_title property in Admin_Sub_Menu class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     private
	 * @var string $page_title The text to be displayed in the title tags of the page when the menu is selected.
	 * @since      1.0.0
	 */
	private $page_title;
	/**
	 * Define menu_title property in Admin_Sub_Menu class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     private
	 * @var string $menu_title The text to be used for the menu.
	 * @since      1.0.0
	 */
	private $menu_title;
	/**
	 * Define capability property in Admin_Sub_Menu class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     private
	 * @var string $capability he capability required for this menu to be displayed to the user.
	 * @since      1.0.0
	 */
	private $capability;
	/**
	 * Define menu_slug property in Admin_Sub_Menu class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     private
	 * @var string $menu_slug The slug name to refer to this menu by.
	 * @since      1.0.0
	 */
	private $menu_slug;
	/**
	 * Define callable_function property in Admin_Sub_Menu class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     private
	 * @var callable $callable_function The function to be called to output the content for this page.
	 * @since      1.0.0
	 */
	private $callable_function;

	/**
	 * Admin_Sub_Menu constructor.
	 * This constructor gets initial values to send to add_submenu_page function to
	 * create admin submenu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_submenu_page function.
	 */
	public function __construct( $initial_value ) {

		$this->parent_slug       = $initial_value['parent-slug'];
		$this->page_title        = $initial_value['page_title'];
		$this->menu_title        = $initial_value['menu_title'];
		$this->capability        = $initial_value['capability'];
		$this->menu_slug         = $initial_value['menu_slug'];
		$this->callable_function = $initial_value['callable_function'];

	}

	/**
	 * Method add_admin_sub_menu_page in Admin_Menu Class
	 *
	 * Inside this method, we call add_submenu_page function to create admin menu
	 * page in WordPress Admin Panel.
	 *
	 * @access  public
	 */
	public function add_admin_sub_menu_page() {
		add_submenu_page(
			$this->parent_slug,
			$this->page_title,
			$this->menu_title,
			$this->capability,
			$this->menu_slug,
			array( $this, $this->callable_function )
		);

	}

	/**
	 * Method sub_menu1_panel_handler in Admin_Sub_Menu Class
	 *
	 * For each admin submenu page, we must have callable function that render and
	 * handle this menu page. For each menu page, you must have its own function.
	 *
	 * @access  public
	 */
	public function sub_menu1_panel_handler() {
		echo 'this  is test for admin Sub menu 1';
	}

	/**
	 * Method sub_menu2_panel_handler in Admin_Sub_Menu Class
	 *
	 * For each admin submenu page, we must have callable function that render and
	 * handle this menu page. For each menu page, you must have its own function.
	 *
	 * @access  public
	 */
	public function sub_menu2_panel_handler() {
		echo 'this  is test for admin Sub menu 2';
	}
}
