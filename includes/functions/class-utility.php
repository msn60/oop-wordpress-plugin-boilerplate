<?php
/**
 * Utility Class File
 *
 * This class contains functions that help you in general tasks like rendering
 * template, convert to persian numbers and words and so on. These functions
 * have been used in many of my projects and I decide to add it in this boilerplate.
 * If you want to use some written functions which are used many times in your codes,
 * you can put it in this file (or files something like that)
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
 * Class Utility.
 * This class contains functions that help you in general tasks like rendering
 * template, convert to numbers and words and so on.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
trait Utility {

	/**
	 * Method load_template in Utility Class
	 *
	 * This method calls to render Admin or Front HTML templates from templates/admin
	 * or templates/front directories. You can use from dot (.) to separate nested
	 * directories and this method will include your desire file for your plugin.
	 *
	 * @access  public
	 * @static
	 *
	 * @param string $template Path of template file which  is separated by dot.
	 * @param array  $params   Related parameters that must be extracted to use inside your template.
	 * @param string $type     To detect admin or front directory to use related constant path.
	 */
	public static function load_template( $template, $params = array(), $type = 'admin' ) {
		$template       = str_replace( '.', '/', $template );
		$base_path      = 'admin' === $type ? PLUGIN_NAME_TPL_ADMIN : PLUGIN_NAME_TPL_FRONT;
		$view_file_path = $base_path . $template . '.php';
		if ( file_exists( $view_file_path ) && is_readable( $view_file_path ) ) {
			! empty( $params ) ? extract( $params ) : null;
			/**
			 * Include template file path which will be rendered by your plugin.
			 */
			include $view_file_path;
		} else {
			echo '<h1>Your file does not exist. </h1>';
			exit;
		}

	}

	/**
	 * Method is_admin in Utility Class
	 *
	 * You can check with this method that user is admin and logged in.
	 *
	 * @access  public
	 * @static
	 */
	public static function is_admin() {
		return is_user_logged_in() && current_user_can( 'manage_options' );
	}

	/**
	 * Method check_menu_link in Utility Class
	 *
	 * This method can help you to generate link for menu (and other parts)
	 * in special dashboard. Also you can skip to generate url for page which
	 * is inside it (at the moment).
	 *
	 * @access  public
	 * @static
	 *
	 * @param string $menu_current_url Current menu URL.
	 * @param string $page             Page URL that client is inside it at the moment.
	 *
	 * @return string
	 */
	public static function check_menu_link( $menu_current_url, $page ) {
		if ( strpos( $menu_current_url, $page ) !== false ) {
			return '#';
		} else {
			return self::create_url( '/your-desire-url-start' . $page );
		}
	}

	/**
	 * Method create_url in Utility Class
	 *
	 * This method generate absolute URL from relative address.
	 *
	 * @access  public
	 * @static
	 *
	 * @param string $url Relative address that is passed to this method.
	 *
	 * @return string It returns absolute path.
	 */
	public static function create_url( $url = '/' ) {
		return get_site_url() . $url;

	}

	/**
	 * Method echo_active_class in Utility Class
	 *
	 * This method can echo active class (string) for item in menu that client
	 * is inside it (at the moment).
	 *
	 * @access  public
	 * @static
	 *
	 * @param string $menu_current_url Current menu URL.
	 * @param string $page             Page URL that client is inside it at the moment.
	 *
	 * @return string
	 */
	public static function echo_active_class( $menu_current_url, $page ) {

		if ( strpos( $menu_current_url, $page ) !== false ) {
			return ' active ';
		} else {
			return '';
		}
	}

	/**
	 * Method detect_page in Utility Class
	 *
	 * This method can detect that url is the same with page (which client is inside it).
	 *
	 * @access  public
	 * @static
	 *
	 * @param string $menu_current_url Current menu URL.
	 * @param string $page             Page URL that client is inside it at the moment.
	 *
	 * @return string
	 */
	public static function detect_page( $menu_current_url, $page ) {
		if ( strpos( $menu_current_url, $page ) !== false ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Method generate_random_code in Utility Class
	 *
	 * This method uses to generate cryptographically secure pseudo-random bytes (to use in e.g. unique token).
	 *
	 * @access  public
	 * @static
	 * @see     http://php.net/manual/en/function.random-bytes.php
	 *
	 * @param int $length The length of the random string that should be returned in bytes.
	 *
	 * @return string Returns a string containing the requested number of cryptographically secure random bytes.
	 */
	public static function generate_random_code( $length = 16 ) {
		return bin2hex( random_bytes( $length ) );
	}

	/**
	 * Method format_amount_by_3_digits in Utility Class
	 *
	 * This method uses to separate numbers, 3 digits of 3 digits in persian numbers format.
	 *
	 * @access  public
	 * @static
	 * @see     http://php.net/manual/en/function.number-format.php
	 *
	 * @param number $amount The number being formatted.
	 *
	 * @return string A formatted version of number.
	 */
	public static function format_amount_by_3_digits( $amount ) {
		$amount = number_format( $amount );

		return self::convert_to_persian_number( $amount );
	}

	/**
	 * Method convert_to_persian_number in Utility Class
	 *
	 * This method converts English number to Persian number in a string
	 *
	 * @access  public
	 * @static
	 * @see     http://php.net/manual/en/function.number-format.php
	 *
	 * @param string $number The number which is passed to method.
	 *
	 * @return string A formatted version of number.
	 */
	public static function convert_to_persian_number( $number ) {
		$persian_numbers = [ '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰' ];
		$english_numbers = [ '1', '2', '3', '4', '5', '6', '7', '8', '9', '0' ];

		return str_replace( $english_numbers, $persian_numbers, $number );
	}

	/**
	 * Method convert_ip_to_long in Utility Class
	 *
	 * This method converts ip of visitor to long integer.
	 *
	 * @access  public
	 * @static
	 * @see     http://php.net/manual/en/function.ip2long.php
	 *
	 * @return  int/FALSE Returns the long integer or FALSE if ip_address is invalid.
	 */
	public static function convert_ip_to_long() {
		$remote_address = filter_var( wp_unslash( $_SERVER['REMOTE_ADDR'] ), FILTER_SANITIZE_STRING );
		if ( '::1' === $remote_address ) {
			$remote_address = '127.0.0.1';
		}

		return ip2long( $remote_address );
	}

	/**
	 * Method get_visitor_ip_address in Utility Class
	 *
	 * This method returns visitor IP address.
	 *
	 * @access  public
	 * @static
	 *
	 * @return  string Returns IP address of visitor.
	 */
	public static function get_visitor_ip_address() {
		$remote_address = filter_var( wp_unslash( $_SERVER['REMOTE_ADDR'] ), FILTER_SANITIZE_STRING );
		if ( '::1' === $remote_address ) {
			$remote_address = '127.0.0.1';
		}

		return $remote_address;
	}

	/**
	 * Method get_current_url in Utility Class
	 *
	 * This method return actual url that in your page
	 *
	 * @access  public
	 * @return string Actual url that user requests it.
	 */
	public function get_current_url() {
		$actual_link = ( 'on' === isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] ? 'https' : 'http' )
		               . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		return $actual_link;
	}

}
