<?php
/**
 * Manage_Post_Columns interface File
 *
 * This file contains contract for adding columns that are specific to
 * your content type, removing columns that are obsolete, and reordering columns
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Interfaces\Custom_Admin_Columns;

use Plugin_Name_Name_Space\Includes\Interfaces\Filter_Hook_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Interface Manage_Post_Columns.
 * This file contains contract for adding columns that are specific to
 * your content type, removing columns that are obsolete, and reordering columns
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 * @see        https://www.smashingmagazine.com/2017/12/customizing-admin-columns-wordpress/
 * @see        https://developer.wordpress.org/reference/hooks/manage_post_type_posts_columns/
 * @see        https://joebuckle.me/wordpress-patterns-elegant-way-create-custom-post-type/
 * @see        https://gist.github.com/igorbenic/a93fc46d03aa90411523
 */
interface Manage_Post_Columns extends Filter_Hook_Interface {

	/**
	 * call related filter to Manage columns of your post
	 *
	 * Sample is something like in following inside this method:
	 * add_filter( 'manage_product_posts_columns', array($this, 'manage_column_list'));
	 * You can use Hooks like:
	 * manage_[post_type]_posts_columns : manage_page_posts_columns
	 * manage_[post_type]_posts_custom_column : manage_page_posts_custom_column
	 *
	 * @access public
	 * @see    https://developer.wordpress.org/reference/hooks/manage_posts_columns/
	 * @see    https://developer.wordpress.org/reference/hooks/manage_post_type_posts_columns/
	 */
	public function register_add_filter();

	/**
	 * A method for ADDING, REMOVING AND REORDERING COLUMNS
	 *
	 * @see https://www.smashingmagazine.com/2017/12/customizing-admin-columns-wordpress/
	 * @see https://wordpress.stackexchange.com/questions/116122/how-to-use-manage-post-type-posts-columns-with-underscore-in-post-type
	 */
	public function manage_columns_list( $columns );


}
