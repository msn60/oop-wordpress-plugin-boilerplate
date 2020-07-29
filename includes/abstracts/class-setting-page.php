<?php
/**
 * Setting_Page abstract Class File
 *
 * This file contains contract for Setting_Page class. If you want create an settings page
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
 * Class Setting_Page.
 * This file contains contract for Setting_Page class. If you want create an settings page
 * inside admin panel of WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_menu_page/
 */
abstract class Setting_Page implements Action_Hook_Interface {

	/**
	 *  A settings group name.
	 * Should correspond to a whitelisted option key name.
	 *
	 * @var string $option_group A settings group name
	 * @since      1.0.2
	 */
	protected $option_group;
	/**
	 * The name of an option to sanitize and save.
	 *
	 * @var string $option_name The name of an option to sanitize and save
	 * @since      1.0.2
	 */
	protected $option_name;
	/**
	 * Data used to describe the setting when registered.
	 *
	 * @var string $type The type of data associated with this setting.
	 * @since      1.0.2
	 * @see        https://developer.wordpress.org/reference/functions/register_setting/
	 */
	protected $register_setting_args;
	/**
	 * Array of settings sections arguments.
	 * It's an array of arguments that 'add_setting_section' method needs.
	 *
	 * @var array $settings_sections Array of settings sections arguments.
	 * @see https://developer.wordpress.org/reference/functions/add_settings_section/
	 */
	protected $settings_sections;
	/**
	 * Array of settings fields arguments.
	 * It's an array of argument that 'add_setting_field' method needs.
	 *
	 * @var array $settings_fields Array of settings fields arguments.
	 * @see https://developer.wordpress.org/reference/functions/add_settings_field/
	 */
	protected $settings_fields;


	/**
	 * Setting_Page constructor.
	 * This constructor gets initial values to send to add_menu_page function to
	 * create admin menu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_menu_page function.
	 */
	public function __construct( array $initial_values ) {
		$this->option_group          = $initial_values['option_group'];
		$this->option_name           = $initial_values['option_name'];
		$this->register_setting_args = $initial_values['register_setting_args'];
		$this->settings_sections     = $initial_values['settings_sections'];
		$this->settings_fields       = $initial_values['settings_fields'];
	}

	/**
	 * call 'admin_init' add_action to create settings page
	 *
	 * @access public
	 */
	public function register_add_action() {
		add_action( 'admin_init', array( $this, 'add_settings_page' ) );
	}


	/**
	 * Method add_admin_menu_page in Setting_Page Class
	 *
	 * Inside this method, we call add_menu_page function to create admin menu
	 * page in WordPress Admin Panel.
	 *
	 * @access  public
	 */
	public function add_settings_page() {
		$this->init_register_setting();
		$this->add_all_settings_sections();
		$this->add_all_settings_fields();

	}

	/**
	 * A method to register settings
	 */
	public function init_register_setting(  ) {
		register_setting($this->option_group, $this->option_name,$this->register_setting_args);
	}

	/**
	 * A method to add all of settings section
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_settings_section/
	 */
	public function add_all_settings_sections() {
		if ( ! is_null($this->settings_sections)) {
			foreach ( $this->settings_sections as $settings_section ){
				add_settings_section(
					$settings_section['id'],
					$settings_section['title'],
					$settings_section['callback_function'],
					$settings_section['page']
				);
			}
		}

	}

	/**
	 * A method to add all of settings fields
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_settings_field/
	 */
	public function add_all_settings_fields() {
		if ( ! is_null($this->settings_fields)) {
			foreach ($this->settings_fields as $settings_field ) {
				add_settings_field(
					$settings_field['id'],
					$settings_field['title'],
					$settings_field['callback_function'],
					$settings_field['page'],
					$settings_field['section'] = 'default',
					$args = array()
				);
			}
		}
	}

	/**
	 * sanitize_setting_fields method.
	 * A callback function that sanitizes the option's value.
	 *
	 * @access public
	 *
	 */
	abstract public function sanitize_setting_fields();

}
