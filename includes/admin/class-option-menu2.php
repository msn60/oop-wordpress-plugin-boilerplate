<?php
/**
 * Option_Menu1 Class File
 *
 * This file contains contract for Option_Menu class. If you want create an option page
 * inside settings section of WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Admin;

use Plugin_Name_Name_Space\Includes\Abstracts\Option_Menu;
use Plugin_Name_Name_Space\Includes\Functions\Template_Builder;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Option_Menu1.
 * If you want create an admin page inside admin panel of WordPress,
 * you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 *
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_menu_page/
 */
class Option_Menu2 extends Option_Menu {

	/**
	 * Option_Menu1 constructor.
	 * This constructor gets initial values to send to add_menu_page function to
	 * create admin menu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_option_page function.
	 */
	public function __construct( array $initial_values ) {
		parent::__construct( $initial_values );
	}

	/**
	 * Method handle_option_panel in Option_Menu Class
	 *
	 * For each option menu page, we must have callable function that render and
	 * handle this option menu page. For each option menu page, you must implement it.
	 *
	 * @access  public
	 */
	public function handle_option_panel( $extra_args = null ) {
		$this->load_template( 'options-page.option-page1', $extra_args );
	}


}
