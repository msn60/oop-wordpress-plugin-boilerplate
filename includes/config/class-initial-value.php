<?php
/**
 * Initial_Value Class File
 *
 * Role of this class is like RC configuration files in application. If you need
 * to initial value to start your plugin or need them for each time that WordPress
 * run your plugin, you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.0
 */

namespace Plugin_Name_Name_Space\Includes\Config;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Initial_Value.
 * If you need to initial value to start your plugin or need them for
 * each time that WordPress run your plugin, you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Initial_Value {

	/**
	 * Initial values to create new custom post type
	 *
	 * @access public
	 * @static
	 * @return array It returns all of arguments that needs for register a post type.
	 */
	public static function args_for_sample_post_type() {
		$labels = [
			'name'               => _x( 'Name', 'post type general name', 'plugin-name-textdomain' ),
			'singular_name'      => _x( 'Name', 'post type singular name', 'plugin-name-textdomain' ),
			'menu_name'          => _x( 'Names', 'admin menu', 'plugin-name-textdomain' ),
			'name_admin_bar'     => _x( 'Name', 'add new on admin bar', 'plugin-name-textdomain' ),
			'add_new'            => _x( 'Add New', 'name', 'plugin-name-textdomain' ),
			'add_new_item'       => __( 'Add New Name', 'plugin-name-textdomain' ),
			'new_item'           => __( 'New Name', 'plugin-name-textdomain' ),
			'edit_item'          => __( 'Edit Name', 'plugin-name-textdomain' ),
			'view_item'          => __( 'View Name', 'plugin-name-textdomain' ),
			'all_items'          => __( 'All Names', 'plugin-name-textdomain' ),
			'search_items'       => __( 'Search Names', 'plugin-name-textdomain' ),
			'parent_item_colon'  => __( 'Parent Names:', 'plugin-name-textdomain' ),
			'not_found'          => __( 'No names found.', 'plugin-name-textdomain' ),
			'not_found_in_trash' => __( 'No names found in Trash', 'plugin-name-textdomain' ),
		];

		$args = [
			'labels'             => $labels,
			'description'        => __( 'Description.', 'plugin-name-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'msn-new-post-type' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 8,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		];

		$post_type_name = 'msn-new-post-type';

		return [
			'args'           => $args,
			'post_type_name' => $post_type_name,
		];
	}

	/**
	 * Initial values to create admin menu page.
	 *
	 * @access public
	 * @return array It returns all of arguments that add_menu_page function needs.
	 * @see    Includes/Abstract/Admin_Menu
	 */
	public function sample_menu_page() {
		$initial_value = [
			'page_title'        => esc_html__( 'Msn Plugin', 'plugin-name-textdomain' ),
			'menu_title'        => esc_html__( 'Msn Plugin', 'plugin-name-textdomain' ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-name-option-page-url',
			'callable_function' => 'management_panel_handler',//it can be null
			'icon_url'          => 'dashicons-welcome-widgets-menus',
			'position'          => 2,
			'identifier'        => 'plugin_menu_page1'
		];

		return $initial_value;
	}

	/**
	 * Initial values to create admin submenu page (submenu1).
	 *
	 * @access public
	 * @return array It returns all of arguments that add_submenu_page function needs.
	 * @see    Includes/Abstract/Admin_Sub_Menu
	 */
	public function sample_sub_menu_page1() {
		$initial_value = [
			'parent-slug'       => 'plugin-name-option-page-url',
			'page_title'        => esc_html__( 'Plugin Submenu 1', 'plugin-name-textdomain' ),
			'menu_title'        => esc_html__( 'Plugin Submenu 1', 'plugin-name-textdomain' ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-name-option-page-url',
			'callable_function' => 'sub_menu1_panel_handler',
		];

		return $initial_value;
	}

	/**
	 * Initial values to create admin submenu page (submenu1).
	 *
	 * @access public
	 * @return array It returns all of arguments that add_submenu_page function needs.
	 * @see    Includes/Abstract/Admin_Sub_Menu
	 */
	public function sample_sub_menu_page2() {
		$initial_value = [
			'parent-slug'       => 'plugin-name-option-page-url',
			'page_title'        => esc_html__( 'Plugin Submenu 2', 'plugin-name-textdomain' ),
			'menu_title'        => esc_html__( 'Plugin Submenu 2', 'plugin-name-textdomain' ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-name-option-page-url-2',
			'callable_function' => 'sub_menu2_panel_handler',
		];

		return $initial_value;
	}

	/**
	 * Initial values to create meta box 1.
	 *
	 * @access public
	 * @see    https://developer.wordpress.org/reference/functions/get_post_meta/
	 * @see    https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @return array It returns all of arguments that add_meta_box function needs.
	 */
	public function sample_meta_box3() {
		$initial_value = [

			'id'            => 'meta_box_3_id',
			'title'         => esc_html__( 'Meta box3 Headline', 'plugin-name-textdomain' ),
			'callback'      => 'render_content',
			'screens'       => array( 'post', 'page' ),//null - optional
			'context'       => 'advanced', //optional
			'priority'      => 'high', //optional
			'callback_args' => null, //optional
			'meta_key'      => '_msn_plugin_boilerplate_meta_box_key_3',
			'single'        => true, //the result of get_post_meta Will be an array if $single is false
			'action'        => 'msn_oop_boilerplate_meta_box3',
			'nonce_name'    => 'msn_oop_boilerplate_meta_box3_nonce'

		];

		return $initial_value;
	}

	/**
	 * Initial values to create meta box 1.
	 *
	 * @access public
	 * @see    https://developer.wordpress.org/reference/functions/get_post_meta/
	 * @see    https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @return array It returns all of arguments that add_meta_box function needs.
	 */
	public function sample_meta_box4() {
		$initial_value = [

			'id'            => 'meta_box_4_id',
			'title'         => esc_html__( 'Meta box4 Headline', 'plugin-name-textdomain' ),
			'callback'      => 'render_content',
			'screens'       => array( 'post', 'page' ),//null - optional
			'context'       => 'advanced', //optional
			'priority'      => 'high', //optional
			'callback_args' => null, //optional
			'meta_key'      => '_msn_plugin_boilerplate_meta_box_key_4',
			'single'        => true, //the result of get_post_meta Will be an array if $single is false
			'action'        => 'msn_oop_boilerplate_meta_box1',
			'nonce_name'    => 'msn_oop_boilerplate_meta_box1_nonce'

		];

		return $initial_value;
	}
}
