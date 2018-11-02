<?php

namespace Plugin_Name_Dir\Includes\Database;
class Table {
	public $charset_collate;
	public $db_version;
	public $have_name_of_your_table;
	private $wpdb;


	public function __construct() {
		global $wpdb;
		$this->wpdb                    = $wpdb;
		$this->charset_collate         = $this->wpdb->get_charset_collate();
		$this->db_version              = PLUGIN_NAME_DB_VERSION;
		$this->have_name_of_your_table = get_option( 'have_name_of_your_table' );
	}

	public function create_your_table_name() {
		$table_name = $this->wpdb->prefix . 'your_table_name_in_mysql';
		if ( $this->wpdb->get_var( "show tables like '$table_name'" ) != $table_name ) {
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

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
			update_option( 'have_name_of_your_table', 1 );
		}


	}


}