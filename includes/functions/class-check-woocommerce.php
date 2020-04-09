<?php
/**
 * Check_Woocommerce trait File
 *
 * This class contains methods that check is woocommerce activated or not
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Functions;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check_Woocommerce trait File
 *
 * This class contains methods that check is woocommerce activated or not
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */
trait Check_Woocommerce {

	/**
	 * Method to check is Woocommerce activated or not
	 *
	 *
	 * @access  public
	 *
	 * @return bool
	 */
	public function is_woocommerce_active( ) {
		if ( in_array('woocommerce/woocommerce.php', apply_filters('plugin_name_active_plugins',get_option('active_plugins')))) {
			return true;
		} else {
			return false;
		}
	}

}
