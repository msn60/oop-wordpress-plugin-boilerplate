<?php
/**
 * Filter_Hook_Interface interface File
 *
 * This file contains Filter_Hook_Interface. If you to use add_filter and remove_filter in your class,
 * you must use from this contract to implement it.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Interfaces;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter_Hook_Interface interface File
 *
 * This file contains Filter_Hook_Interface. If you to use add_action in your class,
 * you must use from this contract to implement it.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
interface Filter_Hook_Interface {

	/**
	 * Register filters that the object needs to be subscribed to.
	 *
	 */
	public function register_add_filter();
}