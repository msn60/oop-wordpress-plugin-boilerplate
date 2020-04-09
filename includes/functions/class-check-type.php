<?php
/**
 * Check_Type trait File
 *
 * This class contains methods that check type of inside arrays, sanitize and return it.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Functions;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check_Type trait File
 *
 * This class contains methods that check type of inside arrays.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @since      1.0.2
 */
trait Check_Type {

	/**
	 * Method to check type of each item in an array and return them
	 *
	 *
	 * @access  public
	 *
	 * @param array  $items Passed array to check type of each items inside it
	 * @param string $type  type to check
	 */
	public function check_array_by_parent_type( array $items, $type ): array {
		$result['valid']   = [];
		$result['invalid'] = [];
		foreach ( $items as $item ) {
			if ( get_parent_class( $item ) == $type ) {
				$result['valid'][] = $item;
			} else {
				$result['invalid'][] = $item;
			}

		}

		return $result;

	}

	/**
	 * Method to check type of each item in an array and return them for associative arrays
	 *
	 *
	 * @access  public
	 *
	 * @param array  $items Passed array to check type of each items inside it
	 * @param string $type  type to check
	 */
	public function check_array_by_parent_type_assoc( array $items, $type ): array {
		$result['valid']   = [];
		$result['invalid'] = [];
		foreach ( $items as $key => $item ) {
			if ( get_parent_class( $item ) == $type ) {
				$result['valid'][ $key ] = $item;
			} else {
				$result['invalid'][ $key ] = $item;
			}

		}

		return $result;

	}

}
