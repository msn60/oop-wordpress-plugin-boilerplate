<?php
/**
 * Table Class File
 *
 * This file contains Table class. If you want to add new tables to your project
 * (except of WordPress table), you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Database;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Table to add new tables to your project
 *
 * If you want to add new tables to your project
 * (except of WordPress table), you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Table {
	// TODO: This class needs to refactor based on SOLID principles
	/**
	 * Define charset_collate property in Table class
	 *
	 * @access     public
	 * @var string $charset_collate Define charset collection for database.
	 * @since      1.0.2
	 */
	public $charset_collate;
	/**
	 * Define db_version property in Table class
	 *
	 * @access     public
	 * @var int $db_version Set database version for creating table.
	 * @since      1.0.2
	 */
	public $db_version;
	/**
	 * Define has_table_name property in Table class
	 *
	 * @access     public
	 * @var int $has_table_name To check that "Is a table exist with this name or not?".
	 * @since      1.0.2
	 */
	public $has_table_name;
	/**
	 * Define wpdb property in Table class
	 *
	 * @access     private
	 * @var object $wpdb It keeps global $wpdb object inside a Table instance.
	 * @since      1.0.2
	 */
	private $wpdb;

	/**
	 * Table constructor
	 *
	 * This constructor initial all of property for an object which is created
	 * from Table class.
	 *
	 * @access public
	 */
	public function __construct(
		$wpdb_object, $db_version, $has_table_name
	) {
		/**
		 * Use from global $wpdb object.
		 *
		 * @global object $wpdb This is an instantiation of the wpdb class.
		 * @see /wp-includes/wp-db.php
		 */
		$this->wpdb                 = $wpdb_object;
		$this->charset_collate      = $this->wpdb->get_charset_collate();
		$this->db_version           = $db_version;
		$this->has_table_name = $has_table_name;
	}

	/**
	 * Define create_your_table_name method in Table class
	 *
	 * If you want to create a table, you can use from this method. If you
	 * need to create more than one table, you must user from several methods
	 * like this (separated form each other).
	 *
	 * @since   1.0.2
	 * @access  public
	 */
	public function create_your_table_name() {
		$table_name = $this->wpdb->prefix . 'your_table_name_in_mysql';
		if ( $this->wpdb->get_var( "show tables like '$table_name'" ) !== $table_name ) {
			$sql
				= "CREATE TABLE IF NOT EXISTS $table_name (
                   		id INT(9) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                   		sample_col1 INT(9) UNSIGNED NOT NULL,
                   		sample_col2 VARCHAR(20),
                   		sample_col3 INT(9) UNSIGNED NOT NULL,
                   		sample_col4 TEXT,
                   		sample_col5 DATETIME NOT NULL,
                   		sample_col6 BOOLEAN DEFAULT FALSE,
                   		sample_col7 TINYINT UNSIGNED,
                   		sample_col8 CHAR,
                   		sample_col9 VARCHAR(30)
                   	) $this->charset_collate;";

			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
			update_option( 'has_table_name', true );
		}
	}
}
