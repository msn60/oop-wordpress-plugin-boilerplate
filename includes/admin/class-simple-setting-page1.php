<?php
/**
 * Setting_Page1 Class File
 *
 * This file contains contract for Setting_Page class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Admin;

use Plugin_Name_Name_Space\Includes\Abstracts\Simple_Setting_Page;
use Plugin_Name_Name_Space\Includes\Functions\Template_Builder;



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Setting_Page1.
 * If you want create an admin page inside admin panel of WordPress,
 * you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 *
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_menu_page/
 */
class Simple_Setting_Page1 extends Simple_Setting_Page{
	use Template_Builder;

	/**
	 * Setting_Page1 constructor.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_option_page function.
	 */
	public function __construct( array $initial_values ) {
		parent::__construct($initial_values);
	}


	public function sanitize_setting_fields( $input ) {
		$valid         = array();
		$valid['text_field_1_1'] = preg_replace(
			'/[^a-zA-Z\s]/',
			'',
			$input['text_field_1_1'] );

		$valid['text_field_1_2'] = sanitize_text_field($input['text_field_1_2']);

		//generate error
		if ( $valid['text_field_1_1'] !== $input['text_field_1_1'] ) {
			$this->create_settings_error('error1');
		}
		return $valid;
	}

	public function create_section1() {
		//echo '<p>Enter your settings here.</p>';
		_e( 'Some help text regarding Section One goes here.', PLUGIN_NAME_TEXTDOMAIN );
	}

	public function create_section2() {
		//echo '<p>Enter your settings here.</p>';
		_e( 'Some help text regarding Section Two goes here.', PLUGIN_NAME_TEXTDOMAIN );
	}

	public function create_field_1_1() {
		$settings = (array) get_option( $this->option_name );
		//TODO: It can be put in initial values
		$field = "text_field_1_1";
		$value = esc_attr( $settings[$field] );

		echo "<input id='{$field}' type='text' name='{$this->option_name}[{$field}]' value='$value' />";
	}

	public function create_field_1_2() {
		$settings = (array) get_option( $this->option_name );
		//TODO: It can be put in initial values
		$field = "text_field_1_2";
		$value = esc_attr( $settings[$field] );

		echo "<input id='{$field}' type='text' name='{$this->option_name}[{$field}]' value='$value' />";
	}

}
