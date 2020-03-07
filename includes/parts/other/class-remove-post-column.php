<?php
/**
 * Remove_Post_Column abstract Class File
 *
 * This file contains contract for Remove_Post_Column class. If you want create a
 * custom post type in WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Parts\Other;

use Plugin_Name_Name_Space\Includes\Interfaces\Custom_Admin_Columns\Manage_Post_Columns;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Remove_Post_Column.
 * This file contains contract for Remove_Post_Column class. If you want create a
 * custom post type in WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 * @see        https://carlalexander.ca/saving-wordpress-custom-post-types-using-interface/
 * @see        https://developer.wordpress.org/reference/functions/register_post_type/
 * @see        https://carlalexander.ca/designing-entities-wordpress-custom-post-types/
 * @see        https://www.hostinger.com/tutorials/wordpress-custom-post-types
 */
class Remove_Post_Column implements Manage_Post_Columns {


	public function register_add_filter() {
		add_filter( 'manage_posts_columns', array( $this, 'manage_columns_list' ) );
	}

	/**
	 * Unset some columns in posts
	 *
	 *
	 * ' cb' => string '<input type="checkbox" />' (length=25)
	 *  'title' => string 'عنوان' (length=10)
	 *  'author' => string 'نویسنده' (length=14)
	 *  'categories' => string 'دسته‌ها' (length=15)
	 *  'tags' => string 'برچسب‌ها' (length=17)
	 *  'comments' => string '<span class="vers comment-grey-bubble" title="دیدگاه‌ها"><span class="screen-reader-text">دیدگاه‌ها</span></span>' (length=133)
	 *  'date' => string 'تاریخ' (length=10)
	 *
	 * @param array $columns
	 *
	 * @return array
	 */
	public function manage_columns_list( $columns ) {
		/*var_dump( $columns );
		if you want to see list of columns you must use from title
		unset ($columns['title']);*/
		unset( $columns['comments'] );
		unset( $columns['author'] );
		unset( $columns['tags'] );

		return $columns;
	}
}
