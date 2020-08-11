<?php
/**
 * Uninstall Class
 *
 * This class defines tasks that must be run when plugin uninstalling.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Uninstall;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Uninstall
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Uninstall {
	/**
	 * Destroy Config
	 * Drop Database
	 * Delete options
	 * Removing Settings
	 */
	public static function uninstall() {

		// TODO: delete_option for option values that need them again
		// TODO: delete_option for post types ('has_rewrite_for_plugin_name_new_post_types')
		// TODO: unregister_setting + delete_option for  Clean de-registration of registered setting in settings page

	}
}



