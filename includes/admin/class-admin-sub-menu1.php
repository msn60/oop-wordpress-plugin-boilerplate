<?php
/**
 * Admin_Sub_Menu1 Class File
 *
 * This file contains Admin_Sub_Menu class. If you want create an sub menu page
 * under an admin page (inside Admin panel of WordPress), you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Admin;

use Plugin_Name_Name_Space\Includes\Abstracts\Admin_Sub_Menu;
use Plugin_Name_Name_Space\Includes\Functions\Template_Builder;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Admin_Sub_Menu1.
 * If you want create an sub menu page under an admin page
 * (inside Admin panel of WordPress), you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_submenu_page/
 * @see        https://codex.wordpress.org/Creating_Options_Pages
 * @see        https://codex.wordpress.org/Settings_API
 * @see        https://wisdmlabs.com/blog/create-settings-options-page-for-wordpress-plugin/
 * @see        https://www.smashingmagazine.com/2016/04/three-approaches-to-adding-configurable-fields-to-your-plugin/
 */
class Admin_Sub_Menu1 extends Admin_Sub_Menu {
	use Template_Builder;

	/**
	 * Admin_Sub_Menu constructor.
	 * This constructor gets initial values to send to add_submenu_page function to
	 * create admin submenu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_submenu_page function.
	 */
	public function __construct( array $initial_value ) {
		parent::__construct( $initial_value );
	}

	/**
	 * Method sub_menu1_panel_handler in Admin_Sub_Menu Class
	 *
	 * For each admin submenu page, we must have callable function that render and
	 * handle this menu page. For each menu page, you must have its own function.
	 *
	 * @access  public
	 * @see     https://codex.wordpress.org/index.php?title=Creating_Options_Pages&oldid=97268
	 * @see     https://wisdmlabs.com/blog/create-settings-options-page-for-wordpress-plugin/
	 */
	public function render_sub_menu_panel() {
		$this->load_template( 'plugin-page.primary-section', [] );
	}
}
