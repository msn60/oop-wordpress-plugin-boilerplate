<?php

namespace Plugin_Name_Dir\Includes\Functions;
class Utility {

	public static function load_template( $template, $params = array(), $type = 'admin' ) {
		$template       = str_replace( '.', '/', $template );
		$base_path      = $type === 'admin' ? MSNSP_TPL_ADMIN : MSNSP_TPL_FRONT;
		$view_File_Path = $base_path . $template . '.php';
		if ( file_exists( $view_File_Path ) && is_readable( $view_File_Path ) ) {
			! empty( $params ) ? extract( $params ) : null;
			include $view_File_Path;
		} else {
			echo '<h1>Your file does not exsist. </h1>';
			exit;
		}

	}

	/*Check if user is an admin*/
	public static function is_admin() {
		return is_user_logged_in() && current_user_can( 'manage_options' );
	}

	/*Redirect to another page*/

	public static function check_menu_link( $menu_currentUrl, $page ) {
		if ( strpos( $menu_currentUrl, $page ) !== false ) {
			return '#';
		} else {
			return self::create_url( '/supporter' . $page );
		}
	}

	//create menu links

	public static function create_url( $url = '/' ) {
		return get_site_url() . $url;

	}

	//echo active for menu when menu item is selected
	public static function echo_active_class( $menu_currentUrl, $page ) {

		if ( strpos( $menu_currentUrl, $page ) !== false ) {
			return ' active ';
		} else {
			return '';
		}
	}

	public static function detect_page( $menu_currentUrl, $page ) {
		if ( strpos( $menu_currentUrl, $page ) !== false ) {
			return true;
		} else {
			return false;
		}
	}

	/*create function to generate random unique token*/
	public static function generate_random_code( $length = 16 ) {
		return bin2hex( random_bytes( $length ) );
	}

	/*change english numbers to persian*/

	public static function format_amount_by_3_digits( $amount ) {
		$amount = number_format( $amount );

		return self::convert_to_persian_number( $amount );
	}

	/*Separate numbers, 3 digits of 3 digits */

	public static function convert_to_persian_number( $number ) {
		$persian_numbers = [ '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰' ];
		$english_numbers = [ '1', '2', '3', '4', '5', '6', '7', '8', '9', '0' ];

		return str_replace( $english_numbers, $persian_numbers, $number );
	}

	/*convert ip of visitor to long integer*/

	public static function convert_ip_to_long() {
		$remote_Address = $_SERVER['REMOTE_ADDR'];
		if ( $remote_Address = '::1' ) {
			$remote_Address = '127.0.0.1';
		}

		return ip2long( $remote_Address );
	}

	public static function real_ip_address() {
		$remote_Address = $_SERVER['REMOTE_ADDR'];
		if ( $remote_Address == '::1' ) {
			return '127.0.0.1';
		} else {
			return $remote_Address;
		}

	}

	/*get only ip address*/
	public static function get_visitor_ip_address() {
		$remote_Address = $_SERVER['REMOTE_ADDR'];
		if ( $remote_Address = '::1' ) {
			$remote_Address = '127.0.0.1';
		}

		//return str_replace('.','-',$remote_Address);
		return $remote_Address;
	}


}