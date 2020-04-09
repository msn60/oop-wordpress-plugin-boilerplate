<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Init;

use Plugin_Name_Name_Space\Includes\Interfaces\Action_Hook_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.2
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class I18n implements Action_Hook_Interface {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.2
	 * @access   public
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			PLUGIN_NAME_TEXTDOMAIN,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

	/**
	 * Register actions that the object needs to be subscribed to.
	 *
	 */
	public function register_add_action() {
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
	}
}
