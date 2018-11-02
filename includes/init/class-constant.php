<?php
/**
 * Constant Class File
 *
 * This file contains Constant class which defines needed constants to ease
 * your plugin development processes.
 *
 * @package    Plugin_Name_Dir\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Dir\Includes\Init;

/**
 * Class Constant
 *
 * This class defines needed constants that you will use in plugin development.
 *
 * @package    Plugin_Name_Dir\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 */
class Constant {

	/**
	 * Define define_constant method in Constant class
	 *
	 * It defines all of constants that you need
	 *
	 * @access  public
	 * @static
	 */
	public static function define_constant() {

		/**
		 * PLUGIN_NAME_PATH constant.
		 * It is used to specify plugin path
		 */
		if ( ! defined( 'PLUGIN_NAME_PATH' ) ) {
			define( 'PLUGIN_NAME_PATH', trailingslashit( plugin_dir_path( dirname( dirname( __FILE__ ) ) ) ) );
		}

		/**
		 * PLUGIN_NAME_URL constant.
		 * It is used to specify plugin urls
		 */
		if ( ! defined( 'PLUGIN_NAME_URL' ) ) {
			define( 'PLUGIN_NAME_URL', trailingslashit( plugin_dir_url( dirname( dirname( __FILE__ ) ) ) ) );
		}

		/**
		 * PLUGIN_NAME_CSS constant.
		 * It is used to specify css urls inside assets directory. It's used in front end and
		 * using to  load related CSS files for front end user.
		 */
		if ( ! defined( 'PLUGIN_NAME_CSS' ) ) {
			define( 'PLUGIN_NAME_CSS', trailingslashit( PLUGIN_NAME_URL ) . 'assets/css/' );
		}

		/**
		 * PLUGIN_NAME_JS constant.
		 * It is used to specify JavaScript urls inside assets directory. It's used in front end and
		 * using to load related JS files for front end user.
		 */
		if ( ! defined( 'PLUGIN_NAME_JS' ) ) {
			define( 'PLUGIN_NAME_JS', trailingslashit( PLUGIN_NAME_URL ) . 'assets/js/' );
		}

		/**
		 * PLUGIN_NAME_IMG constant.
		 * It is used to specify image urls inside assets directory. It's used in front end and
		 * using to load related image files for front end user.
		 */
		if ( ! defined( 'PLUGIN_NAME_IMG' ) ) {
			define( 'PLUGIN_NAME_IMG', trailingslashit( PLUGIN_NAME_URL ) . 'assets/images/' );
		}

		/**
		 * PLUGIN_NAME_ADMIN_CSS constant.
		 * It is used to specify css urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related CSS files for admin user.
		 */
		if ( ! defined( 'PLUGIN_NAME_ADMIN_CSS' ) ) {
			define( 'PLUGIN_NAME_ADMIN_CSS', trailingslashit( PLUGIN_NAME_URL ) . 'assets/admin/css/' );
		}

		/**
		 * PLUGIN_NAME_ADMIN_JS constant.
		 * It is used to specify JS urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related JS files for admin user.
		 */
		if ( ! defined( 'PLUGIN_NAME_ADMIN_JS' ) ) {
			define( 'PLUGIN_NAME_ADMIN_JS', trailingslashit( PLUGIN_NAME_URL ) . 'assets/admin/js/' );
		}

		/**
		 * PLUGIN_NAME_ADMIN_IMG constant.
		 * It is used to specify image urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related JS files for admin user.
		 */
		if ( ! defined( 'PLUGIN_NAME_ADMIN_IMG' ) ) {
			define( 'PLUGIN_NAME_ADMIN_IMG', trailingslashit( PLUGIN_NAME_URL ) . 'assets/admin/images/' );
		}

		/**
		 * PLUGIN_NAME_TPL constant.
		 * It is used to specify template urls inside templates directory.
		 */
		if ( ! defined( 'PLUGIN_NAME_TPL' ) ) {
			define( 'PLUGIN_NAME_TPL', trailingslashit( PLUGIN_NAME_PATH . 'templates' ) );
		}

		/**
		 * PLUGIN_NAME_INC constant.
		 * It is used to specify include path inside includes directory.
		 */
		if ( ! defined( 'PLUGIN_NAME_INC' ) ) {
			define( 'PLUGIN_NAME_INC', trailingslashit( PLUGIN_NAME_PATH . 'includes' ) );
		}

		/**
		 * PLUGIN_NAME_LANG constant.
		 * It is used to specify language path inside languages directory.
		 */
		if ( ! defined( 'PLUGIN_NAME_LANG' ) ) {
			define( 'PLUGIN_NAME_LANG', trailingslashit( PLUGIN_NAME_PATH . 'languages' ) );
		}

		/**
		 * PLUGIN_NAME_TPL_ADMIN constant.
		 * It is used to specify template urls inside templates/admin directory. If you want to
		 * create a template for admin panel or administration purpose, you will use from it.
		 */
		if ( ! defined( 'PLUGIN_NAME_TPL_ADMIN' ) ) {
			define( 'PLUGIN_NAME_TPL_ADMIN', trailingslashit( PLUGIN_NAME_TPL . 'admin' ) );
		}

		/**
		 * PLUGIN_NAME_TPL_FRONT constant.
		 * It is used to specify template urls inside templates/front directory. If you want to
		 * create a template for front end or end user purposes, you will use from it.
		 */
		if ( ! defined( 'PLUGIN_NAME_TPL_FRONT' ) ) {
			define( 'PLUGIN_NAME_TPL_FRONT', trailingslashit( PLUGIN_NAME_TPL . 'front' ) );
		}
		/*In future maybe I want to add constants for separated upload directory inside plugin directory*/
	}
}
