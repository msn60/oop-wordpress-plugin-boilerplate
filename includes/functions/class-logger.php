<?php
/**
 * Logger Class File
 *
 * This class contains functions to log needed parts
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
 * Logger Class File
 *
 * This class contains functions to log needed parts
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
trait Logger {

	/**
	 * Write log file in
	 *
	 * @access  public
	 *
	 * @param string $log_message Message which needs to log in text file
	 * @param string $file_name   File name of log file
	 */
	public function append_log_in_text_file(  $log_message, $file_name, $type = 'not type' ) {
		date_default_timezone_set('Asia/Tehran');
		$type = 'not type' !== $type ? 'Log message of : ' . $type: 'This log is generated';
		$data = $type . ' [on ' . date( 'Y-m-d  H:i:s' ) . ']'. PHP_EOL;
		$data .= $log_message . PHP_EOL . PHP_EOL;
		if ( file_exists( $file_name ) ) {
			$file_content = file_get_contents( $file_name );
			file_put_contents( $file_name, $data, FILE_APPEND | LOCK_EX );

		} else {
			file_put_contents( $file_name, $data );
		}

	}

}
