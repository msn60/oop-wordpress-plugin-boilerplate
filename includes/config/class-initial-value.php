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
			'name'               => _x( 'Name', 'post type general name', PLUGIN_NAME_TEXTDOMAIN ),
			'singular_name'      => _x( 'Name', 'post type singular name', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_name'          => _x( 'Names', 'admin menu', PLUGIN_NAME_TEXTDOMAIN ),
			'name_admin_bar'     => _x( 'Name', 'add new on admin bar', PLUGIN_NAME_TEXTDOMAIN ),
			'add_new'            => _x( 'Add New', 'name', PLUGIN_NAME_TEXTDOMAIN ),
			'add_new_item'       => __( 'Add New Name', PLUGIN_NAME_TEXTDOMAIN ),
			'new_item'           => __( 'New Name', PLUGIN_NAME_TEXTDOMAIN ),
			'edit_item'          => __( 'Edit Name', PLUGIN_NAME_TEXTDOMAIN ),
			'view_item'          => __( 'View Name', PLUGIN_NAME_TEXTDOMAIN ),
			'all_items'          => __( 'All Names', PLUGIN_NAME_TEXTDOMAIN ),
			'search_items'       => __( 'Search Names', PLUGIN_NAME_TEXTDOMAIN ),
			'parent_item_colon'  => __( 'Parent Names:', PLUGIN_NAME_TEXTDOMAIN ),
			'not_found'          => __( 'No names found.', PLUGIN_NAME_TEXTDOMAIN ),
			'not_found_in_trash' => __( 'No names found in Trash', PLUGIN_NAME_TEXTDOMAIN ),
		];

		$args = [
			'labels'             => $labels,
			'description'        => __( 'Description.', PLUGIN_NAME_TEXTDOMAIN ),
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
			'page_title'        => esc_html__( 'Msn Plugin', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Msn Plugin', PLUGIN_NAME_TEXTDOMAIN ),
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
			'page_title'        => esc_html__( 'Plugin Submenu 1', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Plugin Submenu 1', PLUGIN_NAME_TEXTDOMAIN ),
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
			'page_title'        => esc_html__( 'Plugin Submenu 2', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Plugin Submenu 2', PLUGIN_NAME_TEXTDOMAIN ),
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
			'title'         => esc_html__( 'Meta box3 Headline', PLUGIN_NAME_TEXTDOMAIN ),
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
			'title'         => esc_html__( 'Meta box4 Headline', PLUGIN_NAME_TEXTDOMAIN ),
			'callback'      => 'render_content',
			'screens'       => array( 'post', 'page' ),//null - optional
			'context'       => 'side', //optional
			'priority'      => 'high', //optional
			'callback_args' => null, //optional
			'meta_key'      => '_msn_plugin_boilerplate_meta_box_key_4',
			'single'        => false, //the result of get_post_meta Will be an array if $single is false
			'action'        => 'msn_oop_boilerplate_meta_box4',
			'nonce_name'    => 'msn_oop_boilerplate_meta_box4_nonce'

		];

		return $initial_value;
	}

	/**
	 * Initial values for sample shortcode  1
	 *
	 * @access public
	 * @return array It returns all of arguments that shortcode class needs.
	 */
	public function sample_shortcode1() {
		$initial_value = [
			'tag'          => 'msnshortcode1',
			'default_atts' => [
				'name' => 'Agha Gholam'
			],
		];

		return $initial_value;
	}

	/**
	 * Initial values for show content only for login user shortcode
	 *
	 * @access public
	 * @return array It returns all of arguments that shortcode class needs.
	 */
	public function sample_content_for_login_user_shortcode() {
		$initial_value = [
			'tag'          => 'msn_content_for_login_user',
			'default_atts' => [],
		];

		return $initial_value;
	}

	/**
	 * Initial values for complete shortcode class
	 *
	 * @access public
	 * @return array It returns all of arguments that shortcode class needs.
	 */
	public function sample_complete_shortcode() {
		$initial_value = [
			'tag'          => 'msn_complete_shortcode',
			'default_atts' => [
				'link' => 'https://wpwebmaster.ir',
				'name' => 'Webmaster WordPress'
			],
		];

		return $initial_value;
	}

	/**
	 * Initial values for Custom_Post1 class
	 *
	 * @access public
	 * @return array It returns all of arguments that Custom_Post1 class needs.
	 */
	public function sample_custom_post1() {

		$labels = array(
			'name'               => _x( 'General Name 1', 'post type general name', PLUGIN_NAME_TEXTDOMAIN ),
			'singular_name'      => _x( 'Name 1', 'post type singular name', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_name'          => _x( 'Names 1', 'admin menu', PLUGIN_NAME_TEXTDOMAIN ),
			'name_admin_bar'     => _x( 'Name !', 'add new on admin bar', PLUGIN_NAME_TEXTDOMAIN ),
			'add_new'            => _x( 'Add New ', 'Name 1', PLUGIN_NAME_TEXTDOMAIN ),
			'add_new_item'       => __( 'Add New Name 1', PLUGIN_NAME_TEXTDOMAIN ),
			'new_item'           => __( 'New Name 1', PLUGIN_NAME_TEXTDOMAIN ),
			'edit_item'          => __( 'Edit Name 1', PLUGIN_NAME_TEXTDOMAIN ),
			'view_item'          => __( 'View Name 1', PLUGIN_NAME_TEXTDOMAIN ),
			'all_items'          => __( 'All Names 1', PLUGIN_NAME_TEXTDOMAIN ),
			'search_items'       => __( 'Search Names 1', PLUGIN_NAME_TEXTDOMAIN ),
			'parent_item_colon'  => __( 'Parent Names 1:', PLUGIN_NAME_TEXTDOMAIN ),
			'not_found'          => __( 'No names 1 found', PLUGIN_NAME_TEXTDOMAIN ),
			'not_found_in_trash' => __( 'No names 1 found in Trash', PLUGIN_NAME_TEXTDOMAIN )
		);

		$args          = array(
			'labels'             => $labels,
			'description'        => __( 'Description 1', PLUGIN_NAME_TEXTDOMAIN ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'name1' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 8,
			'menu_icon'          => 'dashicons-calendar-alt',
			'show_in_rest'       => true,
			/*'rest_base'             => 'events',
			'rest_controller_class' => 'WP_REST_Posts_Controller',*/
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);
		$initial_value = [
			'post_type' => 'msn-name1',
			'args'      => $args,
		];

		return $initial_value;
	}

	/**
	 * Initial values for Custom_Taxonomy1 class
	 *
	 * Sample of args:
	 * $args = array(
	 *    'labels' => array(),
	 *    'description' => '',
	 *    'public' => null,
	 *    'publicly_queryable' => null,
	 *    'hierarchical' => false,
	 *    'show_ui' => true,
	 *    'show_in_menu' => true,
	 *    'show_in_nav_menus' => true,
	 *    'show_in_rest' => null,
	 *    'rest_base' => is $taxonomy,
	 *    'rest_controller_class' => 'WP_REST_Terms_Controller',
	 *    'show_tagcloud' => true,
	 *    'show_in_quick_edit' => true,
	 *    'show_admin_column' => false,
	 *    'capabilities' => array(
	 *        'manage_terms' => 'manage_categories',
	 *        'edit_terms' => 'manage_categories',
	 *        'delete_terms' => 'manage_categories',
	 *        'assign_terms' => 'edit_posts'
	 *    ),
	 *    'rewrite' => array(
	 *        'slug' => '$taxonomy key',
	 *        'with_front' => true,
	 *        'hierarchical' => false,
	 *        'ep_mask' => 'EP_NONE'
	 *    ),
	 *    'meta_box_cb' => null
	 * );
	 *
	 *
	 * @access public
	 * @return array It returns all of arguments that Custom_Taxonomy1 class needs.
	 *
	 * @see    http://hookr.io/functions/register_taxonomy/
	 * @see    https://developer.wordpress.org/reference/functions/register_taxonomy/
	 */
	public function sample_custom_taxonomy1() {
		// Add new taxonomy, with hierarchical structure (like Category)
		$labels = array(
			'name'                       => _x( 'Taxonomies 1', 'taxonomy general name', PLUGIN_NAME_TEXTDOMAIN ),
			'singular_name'              => _x( 'Taxonomy 1', 'taxonomy singular name', PLUGIN_NAME_TEXTDOMAIN ),
			'search_items'               => __( 'Search Taxonomies 1', PLUGIN_NAME_TEXTDOMAIN ),
			'popular_items'              => __( 'Popular Taxonomies 1', PLUGIN_NAME_TEXTDOMAIN ),
			'all_items'                  => __( 'Taxonomies 1', PLUGIN_NAME_TEXTDOMAIN ),
			'parent_item'                => __( 'Parent Taxonomy 1', PLUGIN_NAME_TEXTDOMAIN ), //if not hierarchical it will be null
			'parent_item_colon'          => __( 'Parent Taxonomy 1:', PLUGIN_NAME_TEXTDOMAIN ), //if not hierarchical it will be null
			'edit_item'                  => __( 'Edit Taxonomy 1', PLUGIN_NAME_TEXTDOMAIN ),
			'update_item'                => __( 'Update Taxonomy 1', PLUGIN_NAME_TEXTDOMAIN ),
			'add_new_item'               => __( 'Add New Taxonomy 1', PLUGIN_NAME_TEXTDOMAIN ),
			'new_item_name'              => __( 'New  Taxonomy 1 Name', PLUGIN_NAME_TEXTDOMAIN ),
			'separate_items_with_commas' => __( 'Separate Taxonomy 1 with commas', PLUGIN_NAME_TEXTDOMAIN ),
			'add_or_remove_items'        => __( 'Add or remove  Taxonomies 1', PLUGIN_NAME_TEXTDOMAIN ),
			'choose_from_most_used'      => __( 'Choose from the most used Taxonomies 1', PLUGIN_NAME_TEXTDOMAIN ),
			'not_found'                  => __( 'No Taxonomies 1 found.', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_name'                  => __( 'Taxonomies 1', PLUGIN_NAME_TEXTDOMAIN ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_menu'      => true,
			'show_in_rest'      => true,
			//'update_count_callback' => '_update_post_term_count',
			//The statement: If you want to ensure that your custom taxonomy behaves like a tag, you must add the option
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'sample-taxonomy1' ),
		);

		$initial_value = [
			'taxonomy'    => 'msn-sample-taxonomy1',
			'object_type' => [
				'msn-name1',
				'post',
				'msn-events',
			],
			'args'        => $args,
		];

		return $initial_value;
	}

	/**
	 * Return custom values to have custom cron schedule for wp_schedule_event
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_get_schedules/
	 * @return array
	 */
	public function sample_custom_cron_schedule() {
		$initial_value = [
			'weekly'      => [
				'interval' => 604800,
				'display'  => __( 'Once Weekly' )
			],
			'twiceweekly' => [
				'interval' => 1209600,
				'display'  => __( 'Twice Weekly' )
			]
		];

		return $initial_value;
	}
}
