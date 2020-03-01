<?php
/**
 * Activator Class File
 *
 * This file contains Activator class. If you want to perform some actions
 * in activating of your plugin, you can add your desire methods to it.
 * Actions likes installing separated tables (except WordPress tables),
 * initializing configs for plugin and using update_option, can do with this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.0
 */

namespace Plugin_Name_Name_Space\Includes\Init;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Plugin_Name_Name_Space\Includes\Database\Table;
use Plugin_Name_Name_Space\Includes\Config\Info;
use Plugin_Name_Name_Space\Includes\Functions\Logger;

/**
 * Class Activator.
 * If you want to perform some actions in activating of your plugin, you can add your desire methods to it.
 * Actions likes installing separated tables (except WordPress tables),
 * initializing configs for plugin and using update_option, can do with this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @see        \Plugin_Name_Name_Space\Includes\Config\Info
 * @see        \Plugin_Name_Name_Space\Includes\Database\Table
 */
class Activator {
	use Logger;
	/**
	 * @var int $last_db_version The last version of your plugin database
	 */
	private $last_db_version;

	/**
	 * @var Table $table_object Table object to create or modify tables
	 */
	private $table_object;

	/**
	 * Activator constructor.
	 */
	public function __construct( $last_db_version = null ) {
		$this->last_db_version = $last_db_version;
	}

	/**
	 * Method activate in Activator Class
	 *
	 * It calls when plugin is activated.
	 *
	 * @access  public
	 * @static
	 */
	public function activate(
		$is_need_table_modification = false,
		Table $table_object = null
	) {

		// Create needed tables in plugin activation.
		$this->table_object = $table_object;
		if ( true === $is_need_table_modification ) {
			if ( intval( $this->table_object->db_version ) > $this->last_db_version
			) {
				$this->create_needed_tables();
			}
		}
		// Initialize plugin settings and info in option table.
		// TODO: separate this part to another method and then call it
		Info::add_info_in_plugin_activation();
		$this->append_log_in_text_file( 'Sample to test logger class when plugin is activated', PLUGIN_NAME_LOGS . 'activator-logs.txt',
			'Activator Last Log' );

		//TODO: Show customized messages when plugin is activated


	}

	/**
	 * Create needed tables when plugin is activated
	 *
	 * Check is your table exist in database or not you can use from it
	 * for all of your table in first time that your plugin is created.
	 */
	private function create_needed_tables() {
		if ( true !== $this->table_object->has_table_name ) {
			$this->table_object->create_your_table_name();
		}

		update_option(
			'last_your_plugin_name_dbs_version',
			$this->table_object->db_version
		);
	}
}

