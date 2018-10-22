<?php

namespace Plugin_Name_Dir\Includes\Init;

use Plugin_Name_Dir\Includes\Database\Table;
use Plugin_Name_Dir\Includes\Config\Info;

class Activator {

	//Install Database
	//Initialize Config
	//update_option('my_first_plugin',1);
	public static function activate() {
		//Create table in plugin activation
		//Create needed tables in plugin activation
		$new_Modified_Tables = new Table();
		if ( intval( $new_Modified_Tables->db_Version ) > intval( get_option( 'last_your_plugin_name_dbs_version' ) )
		) {

			/*Check is your table exist in database or not
				you can use from it for all of your table in first time
				that your plugin is created.
			*/
			if ( $new_Modified_Tables->have_Name_Of_Your_Table != 1 ) {
				$new_Modified_Tables->create_your_table_name();
			}

			update_option( 'last_your_plugin_name_dbs_version',
				$new_Modified_Tables->db_Version );
		}

		//Initialize plugin settings and info in option table
		Info::add_info_in_plugin_activation();


	}


}