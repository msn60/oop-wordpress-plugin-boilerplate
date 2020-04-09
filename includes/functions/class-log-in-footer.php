<?php
/**
 * Log_In_Footer Class File
 *
 * This class contains functions to log when wp_footer hook initiates.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Functions;

use Plugin_Name_Name_Space\Includes\Interfaces\Action_Hook_With_Args_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Log_In_Footer Class File
 *
 * This class contains functions to log when wp_footer hook initiates.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Log_In_Footer implements Action_Hook_With_Args_Interface {
	use Logger;

	/**
	 * Register actions that the object needs to be subscribed to.
	 *
	 * @see https://stackoverflow.com/questions/2843356/can-i-pass-arguments-to-my-function-through-add-action
	 */
	public function register_add_action_with_arguments( $args ) {
		if ( is_admin() ) {
			add_action( 'admin_footer',
				function () use ( $args ) {
					$this->append_log_in_text_file( $args['log_message'], $args['file_name'], $args['type'] );
				}
			);
		} else {
			add_action( 'wp_footer',
				function () use ( $args ) {
					$this->append_log_in_text_file( $args['log_message'], $args['file_name'], $args['type'] );
				}
			);
		}

	}
}
