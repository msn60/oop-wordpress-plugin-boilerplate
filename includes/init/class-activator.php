<?php
/**
 * Activator Class File
 *
 * This file contains Activator class. If you want to perform some actions
 * in activating of your plugin, you can add your desire methods to it.
 * Actions likes installing separated tables (except WordPress tables),
 * initializing configs for plugin and using update_option, can do with this class.
 *
 * @package    Plugin_Name_Name_Space\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Name_Space\Includes\Init;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Plugin_Name_Name_Space\Includes\Database\Table;
use Plugin_Name_Name_Space\Includes\Config\Info;

/**
 * Class Activator.
 * If you want to perform some actions in activating of your plugin, you can add your desire methods to it.
 * Actions likes installing separated tables (except WordPress tables),
 * initializing configs for plugin and using update_option, can do with this class.
 *
 * @package    Plugin_Name_Name_Space\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 * @see        \Plugin_Name_Name_Space\Includes\Config\Info
 * @see        \Plugin_Name_Name_Space\Includes\Database\Table
 */
class Activator {

	/**
	 * Method activate in Activator Class
	 *
	 * It calls when plugin is activated.
	 *
	 * @access  public
	 * @static
	 */
	public static function activate() {

		// Create needed tables in plugin activation.
		$new_modified_tables = new Table();
		if ( intval( $new_modified_tables->db_version ) > intval( get_option( 'last_your_plugin_name_dbs_version' ) )
		) {
			/*
			 * Check is your table exist in database or not you can use from it
			 * for all of your table in first time that your plugin is created.
			*/
			if ( 1 !== $new_modified_tables->have_your_table_name ) {
				$new_modified_tables->create_your_table_name();
			}

			update_option(
				'last_your_plugin_name_dbs_version',
				$new_modified_tables->db_version
			);
			// Initialize plugin settings and info in option table.
			Info::add_info_in_plugin_activation();
		}

	}
}

