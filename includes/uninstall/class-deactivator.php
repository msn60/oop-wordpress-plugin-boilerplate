<?php
/**
 * De-activator Class File
 *
 * This class defines tasks that must be run when plugin is deactivated.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.0
 */

namespace Plugin_Name_Name_Space\Includes\Uninstall;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Deactivator.
 * You can run desire tasks with this class when your plugin is de-activated.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Deactivator {

	/**
	 * Run related tasks when plugin is deactivated
	 *
	 * @access public
	 * @since  1.0.0
	 * @static
	 */
	public static function deactivate() {

		if ( get_option( 'plugin_name_prefix_plugin_setting_option2' ) ) {
			update_option(
				'plugin_name_prefix_plugin_setting_option2',
				'After de-activation'
			);
		}

		if ( get_option( 'plugin_name_prefix_plugin_setting_option3' ) ) {
			delete_option( 'plugin_name_prefix_plugin_setting_option3' );
		}


		if ( get_option( 'has_rewrite_for_plugin_name_new_post_types' ) ) {
			update_option(
				'has_rewrite_for_plugin_name_new_post_types',
				false
			);
		}

		if ( get_option( 'has_rewrite_for_plugin_name_new_taxonomies' ) ) {
			update_option(
				'has_rewrite_for_plugin_name_new_taxonomies',
				false
			);
		}
	}

}


