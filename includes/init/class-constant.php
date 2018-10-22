<?php

namespace Plugin_Name_Dir\Includes\Init;

class Constant {
	public static function define_constant() {

		//Define path for plugin
		if ( ! defined( 'PLUGIN_NAME_PATH' ) ) {
			define( 'PLUGIN_NAME_PATH', trailingslashit( plugin_dir_path( dirname( dirname( __FILE__ ) ) ) ) );
		}

		//Define url for plugin
		if ( ! defined( 'PLUGIN_NAME_URL' ) ) {
			define( 'PLUGIN_NAME_URL', trailingslashit( plugin_dir_url( dirname( dirname( __FILE__ ) ) ) ) );
		}

		//Define url for plugin
		if ( ! defined( 'PLUGIN_NAME_gh' ) ) {
			define( 'PLUGIN_NAME_gh', trailingslashit( plugin_dir_url( __DIR__ ) ) );
		}

		//Define css url for front end
		if ( ! defined( 'PLUGIN_NAME_CSS' ) ) {
			define( 'PLUGIN_NAME_CSS', trailingslashit( PLUGIN_NAME_URL ) . 'assets/css/' );
		}

		//Define js url for front end
		if ( ! defined( 'PLUGIN_NAME_JS' ) ) {
			define( 'PLUGIN_NAME_JS', trailingslashit( PLUGIN_NAME_URL ) . 'assets/js/' );
		}

		//define images url for front end
		if ( ! defined( 'PLUGIN_NAME_IMG' ) ) {
			define( 'PLUGIN_NAME_IMG', trailingslashit( PLUGIN_NAME_URL ) . 'assets/images/' );
		}

		//Define css url for admin panel
		if ( ! defined( 'PLUGIN_NAME_ADMIN_CSS' ) ) {
			define( 'PLUGIN_NAME_ADMIN_CSS', trailingslashit( PLUGIN_NAME_URL ) . 'assets/admin/css/' );
		}

		//Define js url for admin panel
		if ( ! defined( 'PLUGIN_NAME_ADMIN_JS' ) ) {
			define( 'PLUGIN_NAME_ADMIN_JS', trailingslashit( PLUGIN_NAME_URL ) . 'assets/admin/js/' );
		}

		//define images url for admin panel
		if ( ! defined( 'PLUGIN_NAME_ADMIN_IMG' ) ) {
			define( 'PLUGIN_NAME_ADMIN_IMG', trailingslashit( PLUGIN_NAME_URL ) . 'assets/admin/images/' );
		}

		//Define template path for plugin
		if ( ! defined( 'PLUGIN_NAME_TPL' ) ) {
			define( 'PLUGIN_NAME_TPL', trailingslashit( PLUGIN_NAME_PATH . 'templates' ) );
		}

		//Define includes path for plugin
		if ( ! defined( 'PLUGIN_NAME_INC' ) ) {
			define( 'PLUGIN_NAME_INC', trailingslashit( PLUGIN_NAME_PATH . 'includes' ) );
		}

		//Define language path for plugin
		if ( ! defined( 'PLUGIN_NAME_LANG' ) ) {
			define( 'PLUGIN_NAME_LANG', trailingslashit( PLUGIN_NAME_PATH . 'languages' ) );
		}

		//Define admin path for templates
		if ( ! defined( 'PLUGIN_NAME_TPL_ADMIN' ) ) {
			define( 'PLUGIN_NAME_TPL_ADMIN', trailingslashit( PLUGIN_NAME_TPL . 'admin' ) );
		}

		//Define front path for templates
		if ( ! defined( 'PLUGIN_NAME_TPL_FRONT' ) ) {
			define( 'PLUGIN_NAME_TPL_FRONT', trailingslashit( PLUGIN_NAME_TPL . 'front' ) );
		}


	}
}

