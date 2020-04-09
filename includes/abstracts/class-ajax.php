<?php
/**
 * Ajax Abstract Class File
 *
 * This file contains an abstract class that specify how you must handle ajax requests in your theme
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Abstracts;

use Plugin_Name_Name_Space\Includes\Interfaces\Action_Hook_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * abstract Class Ajax.
 * This file contains an abstract class that specify how you must handle ajax requests in your theme
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
abstract class Ajax implements Action_Hook_Interface {
	/**
	 * Data that need for wp_ajax_sample_ajax_call_1
	 *
	 * @since    1.0.2
	 * @access   protected
	 * @var      array $ajax_data1 array of ata that need for wp_ajax_sample_ajax_call.
	 */
	/**
	 * @var string $ajax_url Use to identify admin-ajax.php.
	 */
	protected $ajax_url;
	/**
	 * @var string Action name for wp_create_nonce.
	 */
	protected $ajax_nonce;
	/**
	 * @var string action name for ajax call
	 */
	protected $action;

	/**
	 * Main constructor.
	 * This is constructor of Ajax abstract class
	 *
	 * @access public
	 * @since  1.0.2
	 *
	 * @param string $action Action name for ajax call
	 */
	public function __construct( $action ) {
		$this->ajax_url   = admin_url( 'admin-ajax.php' );
		$this->ajax_nonce = wp_create_nonce( 'sample_ajax_nonce' );
		$this->action     = $action;

	}

	/**
	 * Method to define add_action for using in theme or plugin
	 *
	 * @access public
	 * @since  1.0.2
	 *
	 */
	public function register_add_action() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_script' ), 10 );
		//hook to add your ajax request
		add_action( 'wp_ajax_' . $this->action, [ $this, 'handle' ] );
		add_action( 'wp_ajax_nopriv_' . $this->action, [ $this, 'handle' ] );
	}


	/**
	 * Method to register script and localize it
	 *
	 * @access public
	 * @since  1.0.2
	 *
	 */
	public function register_script() {
		//only use when you u
		/*wp_enqueue_script(
			MSN_THEME_NAME . '-script',
			THEME_NAME_JS . 'theme-name-ver-' . THEME_NAME_JS_VERSION . '.js',
			array( 'jquery' ),
			null,
			true
		);*/
		/*
		 * localize script to handle ajax call
		 * */
		wp_localize_script( MSN_THEME_NAME . '-script', 'data', $this->sending_ajax_data() );
		// TODO: customize it for ajax in plugin not theme
	}


	/**
	 * Method to prepare primary values to send from PHP to Javascript file
	 *
	 * This method prepares data for wp_localize_script
	 *
	 * @access public
	 * @since  1.0.2
	 *
	 */
	public function sending_ajax_data() {
		$initial_value = [
			'ajax_url'         => $this->ajax_url,
			'ajax_nonce'       => $this->ajax_nonce,
			'msn_ajax_sample'  => 'Ajax sample for OOP theme starter',
			'msn_ajax_sample2' => 'Ajax sample for OOP theme starter',
		];

		return $initial_value;
	}

	/*
	 * Handle method for ajax request in back-end
	 * */
	abstract public function handle();

	/**
	 * Sends a JSON response with the details of the given error.
	 *
	 * @param \WP_Error $error
	 */
	private function send_error( \WP_Error $error ) {
		wp_send_json( array(
			'code'    => $error->get_error_code(),
			'message' => $error->get_error_message()
		) );
	}


}
