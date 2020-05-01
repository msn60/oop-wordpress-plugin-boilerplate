<?php
/**
 * Activation_Issue trait File
 *
 * This class contains functions to log activation issues when plugin is activated
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
 * Activation_Issue trait File
 *
 * This class contains functions to log activation issues when plugin is activated
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @since      1.0.2
 */
trait Activation_Issue {

	/**
	 * Register 'activated_plugin' add_action to call related method to log error
	 */
	public function register_error_activation_add_action() {
		add_action( 'activated_plugin', [ $this, 'save_plugin_activation_error' ] );
	}

	/**
	 * Save activation errors or warnings or notices in option table
	 */
	public function save_plugin_activation_error() {
		update_option( 'msn_plugin_activation_error', ob_get_contents() );
	}

	/**
	 * Show plugin activation errors or warnings or notices by echoing it
	 */
	public function show_plugin_activation_error() {
		echo get_option( 'msn_plugin_activation_error' );
	}

}