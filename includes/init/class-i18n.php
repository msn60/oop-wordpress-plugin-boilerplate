<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    Plugin_Name_Dir\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Dir\Includes\Init;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Plugin_Name_Dir\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 */
class I18n {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'plugin_name',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}
