<?php
/**
 * Setting_Page2  Class File
 *
 * This file contains Setting_Page2 class. If you want create a completed settings page
 * inside admin panel of WordPress, you can use this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Admin;

use Plugin_Name_Name_Space\Includes\Abstracts\Setting_Page;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Setting_Page2.
 * This file contains contract for Setting_Page2 class. If you want create an settings page
 * inside admin panel of WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 */
class Setting_Page1 extends Setting_Page{


	/**
	 * Setting_Page constructor.
	 * This constructor gets initial values to create a full settings page in admin panel
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_menu_page function.
	 */
	public function __construct( array $initial_values, $admin_menu) {
		parent::__construct($initial_values, $admin_menu);
	}


	/**
	 * Sample method to sanitize text fields
	 * @param string $field_value A field value which is needed to sanitize
	 *
	 * @return string
	 */
	public function sample_sanitize_text_field( $field_value ) {
		$result        = array();
		$result = preg_replace(
			'/[^a-zA-Z\s]/',
			'',
			$field_value );

		return $result;
	}

	/**
	 * Method to create admin menu to show sections and related fields in setting page
	 */
	public function add_admin_menu() {
		$this->admin_menu->register_add_action_with_arguments( $this->settings_sections);
	}


}
