<?php
/**
 * Admin_Menu abstract Class File
 *
 * This file contains contract for Admin_Menu class. If you want create an admin page
 * inside admin panel of WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Abstracts;

use Plugin_Name_Name_Space\Includes\Interfaces\Action_Hook_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Admin_Menu.
 * If you want create an admin page inside admin panel of WordPress,
 * you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_menu_page/
 */
abstract class Admin_Menu implements Action_Hook_Interface {

	/**
	 * Define page_title property in Admin_Menu class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $page_title The text to be displayed in the title tags of the page when the menu is selected.
	 * @since      1.0.2
	 */
	protected $page_title;
	/**
	 * Define menu_title property in Admin_Menu class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $menu_title The text to be used for the menu.
	 * @since      1.0.2
	 */
	protected $menu_title;
	/**
	 * Define capability property in Admin_Menu class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $capability The capability required for this menu to be displayed to the user.
	 * @since      1.0.2
	 */
	protected $capability;
	/**
	 * Define menu_slug property in Admin_Menu class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $menu_slug The slug name to refer to this menu by.
	 * @since      1.0.2
	 */
	protected $menu_slug;
	/**
	 * Define callable_function property in Admin_Menu class.
	 * This property use to define callable function name in add_menu_page.
	 *
	 * @access     protected
	 * @var callable $callable_function The function to be called to output the content for this page.
	 * @since      1.0.2
	 */
	protected $callable_function;
	/**
	 * Define icon_url property in Admin_Menu class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $icon_url The URL to the icon to be used for this menu.
	 * @since      1.0.2
	 */
	protected $icon_url;
	/**
	 * Define position property in Admin_Menu class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var int $position The position in the menu order this one should appear
	 * @since      1.0.2
	 */
	protected $position;
	/**
	 * Define unique name for admin menu.
	 * I will use it for logging in future implementation
	 *
	 * @access     protected
	 * @var string $identifier Define a unique name for admin menu
	 * @since      1.0.2
	 */
	protected $identifier;

	/**
	 * Admin_Menu constructor.
	 * This constructor gets initial values to send to add_menu_page function to
	 * create admin menu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_menu_page function.
	 */
	public function __construct( array $initial_values ) {
		$this->page_title        = $initial_values['page_title'];
		$this->menu_title        = $initial_values['menu_title'];
		$this->capability        = $initial_values['capability'];
		$this->menu_slug         = $initial_values['menu_slug'];
		$this->callable_function = $initial_values['callable_function'];
		$this->icon_url          = $initial_values['icon_url'];
		$this->position          = $initial_values['position'];
		$this->identifier        = $initial_values['identifier'];
	}

	/**
	 * Method add_admin_menu_page in Admin_Menu Class
	 *
	 * Inside this method, we call add_menu_page function to create admin menu
	 * page in WordPress Admin Panel.
	 *
	 * @access  public
	 */
	public function add_admin_menu_page() {
		add_menu_page(
			$this->page_title,
			$this->menu_title,
			$this->capability,
			$this->menu_slug,
			array( $this, 'management_panel_handler' ),
			$this->icon_url,
			$this->position
		);
	}

	/**
	 * call 'admin_menu' add_action to create Admin menu page
	 *
	 * @access public
	 */
	public function register_add_action() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu_page' ) );
	}


	/**
	 * Abstract Method management_panel_handler in Admin_Menu Class
	 *
	 * For each admin menu page, we must have callable function that render and
	 * handle this menu page. For each menu page, you must implement it.
	 *
	 * @access  public
	 */
	abstract public function management_panel_handler();

}
