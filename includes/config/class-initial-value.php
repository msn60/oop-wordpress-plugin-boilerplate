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
 * @since      1.0.2
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
	 * Initial values to create option page.
	 *
	 * @access public
	 * @return array It returns all of arguments that add_menu_page function needs.
	 * @see    Includes/Abstract/Option_Menu
	 */
	public function sample_option_page() {
		$initial_value = [
			'page_title'        => esc_html__( 'Msn Options', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Msn Options', PLUGIN_NAME_TEXTDOMAIN ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-name-menu-page-option-url',
			'callable_function' => 'management_panel_handler',//it can be null
			'position'          => 8,
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
			'callback'      => 'render_content', //It always has this name for all of meta boxes
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

	/**
	 * Initial values to create a simple settings page in option page
	 *
	 * @return array It returns array of initial values to create a settings page.
	 */
	public function sample_setting_page1() {
		$register_setting_args = array(
			'type'              => 'string',
			'description'       => 'A description of setting page 1',
			'sanitize_callback' => 'sanitize_setting_fields', //It must always this name due to its contract in Setting_Page class
			'default'           => null,
			'show_in_rest'      => false,
		);

		/**
		 * An array of settings sections which can be used in add_settings_section method
		 * Initial values for adding  new section in a settings page.
		 *
		 * @var array $settings_sections Array of settings sections for add_settings_section method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_section/
		 */
		$settings_sections = array(
			array(
				'id'                => 'plugin-name-section1',
				//Slug-name to identify the section. Used in the 'id' attribute of tags.
				'title'             => __( 'Setting section 1', PLUGIN_NAME_TEXTDOMAIN ),
				// Formatted title of the section. Shown as the heading for the section.
				'callback_function' => 'section1',
				//Function that echos out any content at the top of the section (between heading and fields).
				'page'              => 'plugin-name-menu-page-option-url',
				//The slug-name of the settings page on which to show the section.
			),
			array(
				'id'                => 'plugin-name-section2',
				'title'             => __( 'Setting section 2', PLUGIN_NAME_TEXTDOMAIN ),
				'callback_function' => 'section2',
				'page'              => 'plugin-name-menu-page-option-url',
			),
		);

		/**
		 * An array of settings fields which can be used in add_settings_field method
		 * Initial values for adding  new fields to a section of a settings page.
		 *
		 * @var array $settings_fields Array of settings fields for add_settings_fields method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_field/
		 */
		$settings_fields = array(
			array(
				'id'                => 'plugin-name-field-1-1',
				//Slug-name to identify the field
				'title'             => __( 'Field One', PLUGIN_NAME_TEXTDOMAIN ),
				//Formatted title of the field. Shown as the label for the field during output
				'callback_function' => 'field_1_1',
				//Function that fills the field with the desired form inputs. The function should echo its output.
				'page'              => 'plugin-name-menu-page-option-url',
				//The slug-name of the settings page on which to show the section
				'section'           => 'plugin-name-section1',
				//The slug-name of the section of the settings page in which to show the box.
			),
			array(
				'id'                => 'plugin-name-field-1-2',
				'title'             => __( 'Field Two', PLUGIN_NAME_TEXTDOMAIN ),
				'callback_function' => 'field_1_2',
				'page'              => 'plugin-name-menu-page-option-url',
				'section'           => 'plugin-name-section1',
			),
		);

		/**
		 * An array of errors which can be used in add_settings_error method
		 * Initial values for adding errors to a settings page when it's submitted
		 *
		 * @var array $settings_errors Array of settings errors for add_settings_error method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_error/
		 */
		$settings_errors = array(
			'error1' => array(
				'setting' => 'plugin-name-field-1-1-error', //Slug title of the setting to which this error applies.
				'code'    => 'plugin-name-field-1-1-error', //Slug-name to identify the error. Used as part of 'id' attribute in HTML output.
				'message' => 'Incorrect value entered! Please only input letters and spaces.', //The formatted message text to display to the user
				'type'    => 'error' //Possible values include 'error', 'success', 'warning', 'info'
			),
		);

		$initial_value = array(
			'option_group'          => 'plugin_name_option_group1',
			'option_name'           => 'plugin_name_option_name1',
			'register_setting_args' => $register_setting_args,
			'settings_sections'     => $settings_sections,
			'settings_fields'       => $settings_fields,
			'settings_errors'       => $settings_errors
		);

		return $initial_value;
	}

	/**
	 * Initial values to create a simple setting option in reading page
	 *
	 * @return array It returns array of initial values to create a settings in reading page.
	 */
	public function sample_setting_in_reading_page1() {
		$register_setting_args = array(
			'type'              => 'string',
			'description'       => 'This is a settings to show in reading page',
			'sanitize_callback' => 'sanitize_setting_fields', //It must always this name due to its contract in Setting_Page class
			'default'           => null,
			'show_in_rest'      => false,
		);

		/**
		 * An array of settings sections which can be used in add_settings_section method
		 * Initial values for adding  new section in a settings page.
		 *
		 * @var array $settings_sections Array of settings sections for add_settings_section method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_section/
		 */
		$settings_sections = array(
			array(
				'id'                => 'plugin-name-section-in-reading1',
				//Slug-name to identify the section. Used in the 'id' attribute of tags.
				'title'             => __( 'Setting section 1', PLUGIN_NAME_TEXTDOMAIN ),
				// Formatted title of the section. Shown as the heading for the section.
				'callback_function' => 'section1',
				//Function that echos out any content at the top of the section (between heading and fields).
				'page'              => 'reading',
				//The slug-name of the settings page on which to show the section.
			)
		);

		/**
		 * An array of settings fields which can be used in add_settings_field method
		 * Initial values for adding  new fields to a section of a settings page.
		 *
		 * @var array $settings_fields Array of settings fields for add_settings_fields method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_field/
		 */
		$settings_fields = array(
			array(
				'id'                => 'plugin-name-field-1-in-reading',
				//Slug-name to identify the field
				'title'             => __( 'Field One', PLUGIN_NAME_TEXTDOMAIN ),
				//Formatted title of the field. Shown as the label for the field during output
				'callback_function' => 'field_1_1',
				//Function that fills the field with the desired form inputs. The function should echo its output.
				'page'              => 'reading',
				//The slug-name of the settings page on which to show the section
				'section'           => 'plugin-name-section-in-reading1',
				//The slug-name of the section of the settings page in which to show the box.
			),
		);

		/**
		 * An array of errors which can be used in add_settings_error method
		 * Initial values for adding errors to a settings page when it's submitted
		 *
		 * @var array $settings_errors Array of settings errors for add_settings_error method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_error/
		 */
		$settings_errors = array(
			'error1' => array(
				'setting' => 'plugin-name-field-1-1-in-reading-page-error',
				//Slug title of the setting to which this error applies.
				'code'    => 'plugin-name-field-1-1-in-reading-page-error',
				//Slug-name to identify the error. Used as part of 'id' attribute in HTML output.
				'message' => __( 'Incorrect value entered! Please only input letters and spaces.', PLUGIN_NAME_TEXTDOMAIN ),
				//The formatted message text to display to the user
				'type'    => 'error'
				//Possible values include 'error', 'success', 'warning', 'info'
			),
		);

		$initial_value = array(
			'option_group'          => 'reading',
			'option_name'           => 'plugin_name_option_name_in_reading',
			'register_setting_args' => $register_setting_args,
			'settings_sections'     => $settings_sections,
			'settings_fields'       => $settings_fields,
			'settings_errors'       => $settings_errors
		);

		return $initial_value;
	}

	public function sample_setting_page2() {


		/**
		 * An array of settings sections which can be used in add_settings_section method
		 * Initial values for adding  new section in a settings page.
		 *
		 * @var array $settings_sections Array of settings sections for add_settings_section method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_section/
		 */
		$settings_sections = array(
			array(
				'id'           => 'plugin_name_section1',
				//Slug-name to identify the section. Used in the 'id' attribute of tags.
				'title'        => __( 'Setting section 1', PLUGIN_NAME_TEXTDOMAIN ),
				// Formatted title of the section. Shown as the heading for the section.
				//'callback_function' => 'section1',
				//Function that echos out any content at the top of the section (between heading and fields).
				'header_title' => 'Title 1',
				//The slug-name of the settings page on which to show the section.
				'description'  => 'this is first description'
			),
			array(
				'id'           => 'plugin_name_section2',
				'title'        => __( 'Setting section 2', PLUGIN_NAME_TEXTDOMAIN ),
				//'callback_function' => 'section2',
				'header_title' => 'Title 2',
				'description'  => 'this is second description'
			),
		);

		/**
		 * An array of settings fields which can be used in add_settings_field method
		 * Initial values for adding  new fields to a section of a settings page.
		 *
		 * @var array $settings_fields Array of settings fields for add_settings_fields method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_field/
		 */
		$settings_fields = array(

			'plugin_name_section1' =>
				array(
					array(
						'id'                => 'text',
						'type'              => 'text',
						'name'              => __( 'Text Input 1', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'              => __( 'Text input description 1', PLUGIN_NAME_TEXTDOMAIN ),
						'default'           => 'Default Text',
						'sanitize_callback' => 'sample_sanitize_text_field',
						'page'              => 'plugin-name-option-page-2',
						'option_name'       => 'plugin_name_option_name2'
					),
					array(
						'id'                => 'text_no',
						'type'              => 'number',
						'name'              => __( 'Number Input 1', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'              => __( 'Number 1 field with validation callback `intval`', PLUGIN_NAME_TEXTDOMAIN ),
						'default'           => 1,
						'sanitize_callback' => 'sanitize_general_text_field',
						'page'              => 'plugin-name-option-page-2',
						'option_name'       => 'plugin_name_option_name2'
					)
				),
			'plugin_name_section2' =>
				array(
					array(
						'id'                => 'text',
						'type'              => 'text',
						'name'              => __( 'Text Input2', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'              => __( 'Text input description2', PLUGIN_NAME_TEXTDOMAIN ),
						'default'           => 'Default Text',
						'sanitize_callback' => 'sample_sanitize_text_field',
						'page'              => 'plugin-name-option-page-2',
						'option_name'       => 'plugin_name_option_name3'
					),
					array(
						'id'                => 'text_no',
						'type'              => 'number',
						'name'              => __( 'Number Input2', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'              => __( 'Number2 field with validation callback `intval`', PLUGIN_NAME_TEXTDOMAIN ),
						'default'           => 1,
						'sanitize_callback' => 'sanitize_general_text_field',
						'page'              => 'plugin-name-option-page-2',
						'option_name'       => 'plugin_name_option_name3'
					)
				)
		);

		/**
		 * An array of errors which can be used in add_settings_error method
		 * Initial values for adding errors to a settings page when it's submitted
		 *
		 * @var array $settings_errors Array of settings errors for add_settings_error method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_error/
		 */
		$settings_errors = array(
			'error1' => array(
				'setting' => 'plugin-name-field-1-1-error', //Slug title of the setting to which this error applies.
				'code'    => 'plugin-name-field-1-1-error', //Slug-name to identify the error. Used as part of 'id' attribute in HTML output.
				'message' => 'Incorrect value entered! Please only input letters and spaces.', //The formatted message text to display to the user
				'type'    => 'error' //Possible values include 'error', 'success', 'warning', 'info'
			),
		);


		$register_setting_args2 = array(
			'type'              => 'string',
			'description'       => 'A description of setting page 1',
			'sanitize_callback' => 'sanitize_setting_fields', //It must always this name due to its contract in Setting_Page class
			'default'           => null,
			'show_in_rest'      => false,
		);

		$register_setting_args3 = array(
			'type'              => 'string',
			'description'       => 'A description of setting page 2',
			'sanitize_callback' => 'sanitize_setting_fields', //It must always this name due to its contract in Setting_Page class
			'default'           => null,
			'show_in_rest'      => false,
		);

		$setting_groups = array(
			array(
				'option_group'          => 'plugin_name_option_group2',
				'option_name'           => 'plugin_name_option_name2',
				'register_setting_args' => $register_setting_args2,
				'id'                    => 'plugin-name-option-group2-id',
				'title'                 => 'Section 2',
			),
			array(
				'option_group'          => 'plugin_name_option_group3',
				'option_name'           => 'plugin_name_option_name3',
				'register_setting_args' => $register_setting_args3,
				'id'                    => 'plugin-name-option-group3-id',
				'title'                 => 'Section 3',
			),
		);

		$initial_value = array(
			'setting_groups'    => $setting_groups,
			'settings_sections' => $settings_sections,
			'settings_fields'   => $settings_fields,
			'settings_errors'   => $settings_errors,
		);

		return $initial_value;
	}

	/**
	 * Initial values to create a settings page in option menu
	 *
	 * @return array[] It returns array of initial values to create a settings page
	 */
	public function get_complete_setting_page_arguments() {
		/**
		 * An array of settings sections which can be used in add_settings_section method
		 * Initial values for adding  new section in a settings page.
		 *
		 * @var array $settings_sections Array of settings sections for add_settings_section method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_section/
		 */
		$settings_sections = array(
			array(
				'id'           => 'plugin_name_section1',
				//Slug-name to identify the section. Used in the 'id' attribute of tags.
				'title'        => __( 'Setting section 1', PLUGIN_NAME_TEXTDOMAIN ),
				// Formatted title of the section. Shown as the heading for the section.
				//'callback_function' => 'section1',
				//Function that echos out any content at the top of the section (between heading and fields).
				'header_title' => 'Title 1',
				//The slug-name of the settings page on which to show the section.
				'description'  => 'this is first description'
			),
			array(
				'id'           => 'plugin_name_section2',
				'title'        => __( 'Setting section 2', PLUGIN_NAME_TEXTDOMAIN ),
				//'callback_function' => 'section2',
				'header_title' => 'Title 2',
				'description'  => 'this is second description'
			),
		);

		/**
		 * An array of settings fields which can be used in add_settings_field method
		 * Initial values for adding  new fields to a section of a settings page.
		 *
		 * @var array $settings_fields Array of settings fields for add_settings_fields method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_field/
		 */
		$settings_fields = array(

			'plugin_name_section1' =>
				array(
					array(
						'id'                => 'text',
						'type'              => 'text',
						'name'              => __( 'Text Input', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'              => __( 'Text input description', PLUGIN_NAME_TEXTDOMAIN ),
						'default'           => 'Default Text',
						'sanitize_callback' => 'sample_sanitize_text_field',
						'has_unique_error'  => true,
						'error_args'        => array(
							'settings' => 'msn_error_for_text1',
							'code'     => 'msn_error_for_text1',
							'message'  => 'This is Especial error which is generated by ME!!!',
							'type'     => 'error',
						),
					),
					array(
						'id'                => 'text_no',
						'type'              => 'number',
						'name'              => __( 'Number Input', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'              => __( 'Number field with validation callback `intval`', PLUGIN_NAME_TEXTDOMAIN ),
						'default'           => 1,
						'sanitize_callback' => 'sanitize_general_text_field',
					),
					array(
						'id'                => 'password',
						'type'              => 'password',
						'name'              => __( 'Password Input', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'              => __( 'Password field description', PLUGIN_NAME_TEXTDOMAIN ),
						'sanitize_callback' => 'sanitize_general_text_field',
					),
					array(
						'id'                => 'textarea',
						'type'              => 'textarea',
						'name'              => __( 'Textarea Input', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'              => __( 'Textarea description', PLUGIN_NAME_TEXTDOMAIN ),
						'sanitize_callback' => 'sanitize_general_textarea_field',
					),
					array(
						'id'   => 'separator',
						'type' => 'separator',
					),
					array(
						'id'   => 'title',
						'type' => 'title',
						'name' => '<h2>New Title</h2>',
					),
					array(
						'id'   => 'checkbox',
						'type' => 'checkbox',
						'name' => __( 'Checkbox', PLUGIN_NAME_TEXTDOMAIN ),
						'desc' => __( 'Checkbox Label', PLUGIN_NAME_TEXTDOMAIN ),
					),
					array(
						'id'      => 'radio',
						'type'    => 'radio',
						'name'    => __( 'Radio', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'    => __( 'Simple Radio Button', PLUGIN_NAME_TEXTDOMAIN ),
						'options' => array(
							'yes'          => __( 'Yes', PLUGIN_NAME_TEXTDOMAIN ),
							'no'           => __( 'No', PLUGIN_NAME_TEXTDOMAIN ),
							'other-option' => __( 'Other options', PLUGIN_NAME_TEXTDOMAIN ),
						),
					),
					array(
						'id'      => 'multicheck',
						'type'    => 'multicheck',
						'name'    => __( 'Multile checkbox', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'    => __( 'Multile checkbox description', PLUGIN_NAME_TEXTDOMAIN ),
						'options' => array(
							'yes'          => __( 'Yes', PLUGIN_NAME_TEXTDOMAIN ),
							'no'           => __( 'No', PLUGIN_NAME_TEXTDOMAIN ),
							'other-option' => __( 'Other options', PLUGIN_NAME_TEXTDOMAIN ),
						),
					),
				),
			'plugin_name_section2' =>
				array(
					array(
						'id'      => 'image',
						'type'    => 'image',
						'name'    => __( 'Image', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'    => __( 'Image description', PLUGIN_NAME_TEXTDOMAIN ),
						'options' => array(
							'button_label' => __( 'Choose Image', PLUGIN_NAME_TEXTDOMAIN ),
						),
					),
					array(
						'id'      => 'file',
						'type'    => 'file',
						'name'    => __( 'File', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'    => __( 'File description', PLUGIN_NAME_TEXTDOMAIN ),
						'options' => array(
							'button_label' => __( 'Choose file', PLUGIN_NAME_TEXTDOMAIN ),
						),
					),
					array(
						'id'          => 'color',
						'type'        => 'color',
						'name'        => __( 'Color', PLUGIN_NAME_TEXTDOMAIN ),
						'desc'        => __( 'Color description', PLUGIN_NAME_TEXTDOMAIN ),
						'placeholder' => __( '#5F4B8B', PLUGIN_NAME_TEXTDOMAIN ),
					),
					array(
						'id'   => 'wysiwyg',
						'type' => 'wysiwyg',
						'name' => __( 'WP_Editor', PLUGIN_NAME_TEXTDOMAIN ),
						'desc' => __( 'WP_Editor description', PLUGIN_NAME_TEXTDOMAIN ),
					),
				)
		);

		/**
		 * An array of errors which can be used in add_settings_error method
		 * Initial values for adding errors to a settings page when it's submitted
		 *
		 * @var array $settings_errors Array of settings errors for add_settings_error method
		 * @see https://developer.wordpress.org/reference/functions/add_settings_error/
		 */
		$settings_errors = array(
			'error1' => array(
				'setting' => 'plugin-name-field-1-1-error', //Slug title of the setting to which this error applies.
				'code'    => 'plugin-name-field-1-1-error', //Slug-name to identify the error. Used as part of 'id' attribute in HTML output.
				'message' => 'Incorrect value entered! Please only input letters and spaces.', //The formatted message text to display to the user
				'type'    => 'error' //Possible values include 'error', 'success', 'warning', 'info'
			),
		);


		$register_setting_args2 = array(
			'type'              => 'string',
			'description'       => 'A description of setting page 1',
			'sanitize_callback' => 'sanitize_setting_fields', //It must always this name due to its contract in Setting_Page class
			'default'           => null,
			'show_in_rest'      => false,
		);

		$register_setting_args3 = array(
			'type'              => 'string',
			'description'       => 'A description of setting page 2',
			'sanitize_callback' => 'sanitize_setting_fields', //It must always this name due to its contract in Setting_Page class
			'default'           => null,
			'show_in_rest'      => false,
		);


		$initial_value = array(
			'settings_sections' => $settings_sections,
			'settings_fields'   => $settings_fields,
			'settings_errors'   => $settings_errors,
			//'admin_menu_args'   => $admin_menu_args,
		);

		return $initial_value;
	}

	/**
	 * Initial values to create option page.
	 *
	 * @access public
	 * @return array It returns all of arguments that add_options_page function needs.
	 */
	public function get_option_menu2() {
		$admin_menu_args = array(
			'page_title'        => esc_html__( 'Complete Settings Page', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Complete Settings Page', PLUGIN_NAME_TEXTDOMAIN ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-name-complete-setting-page',
			'callable_function' => 'set_plugin_setting_page',//it can be null
			'position'          => 11,
		);

		return $admin_menu_args;
	}

}
