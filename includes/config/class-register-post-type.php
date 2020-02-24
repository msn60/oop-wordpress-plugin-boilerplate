<?php
/**
 * Register_Post_Type Class File
 *
 * This file contains Register_Post_Type  class. If you want to register new post type
 * you can use from this class.
 *
 * @package    Plugin_Name_Name_Space\Includes\Config
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Name_Space\Includes\Config;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Register_Post_Type
 * If you want to add new custom post type for your theme or plugin
 * you can inherit from this class
 *
 * @package    Plugin_Name_Name_Space\Includes\Config
 * @author     Your_Name <youremail@nomail.com>
 */
class Register_Post_Type {

	/**
	 * Instance property of Register_Post_Type Class.
	 * This is a property in your Register_Post_Type class that is used to create
	 * one object from this class in whole of program execution.
	 *
	 * @access protected
	 * @var    Register_Post_Type $instance create only one instance from this class
	 * @static
	 */
	protected static $instance;
	/**
	 * Argument Property to register a post type.
	 *
	 * @access protected
	 * @var    array $args args to register your custom post type
	 * @static
	 */
	protected $args;
	/**
	 * Post type name to register a post type.
	 *
	 * @access protected
	 * @var    string $post_type_name post type name to register your custom post type
	 * @static
	 */
	protected $post_type_name;

	/**
	 * Register_Post_Types constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_post_types' ) );
	}

	/**
	 * Create an instance from Register_Post_Type class.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return Register_Post_Type
	 */
	public static function instance() {
		if ( is_null( ( self::$instance ) ) ) {
			self::$instance = new static();
		}
		return self::$instance;
	}

	/**
	 * Register your custom post type.
	 * - Call initial value method
	 * - Register your post type with them
	 * - Flush rewrite rules (If it is first time that your post is registered)
	 *
	 * @access public
	 */
	public function register_post_types() {
		$this->initial_value();
		register_post_type( $this->post_type_name, $this->args );
		if ( ! get_option( 'has_rewrite_for_msn_new_post_type' ) ) {
			$this->rewrite_rules();
			update_option(
				'has_rewrite_for_msn_new_post_type',
				'1'
			);
		}
	}

	/**
	 * Initial value for your post type.
	 * You must implement this method in your child object.
	 *
	 * @access public
	 */
	public function initial_value() {

	}

	/**
	 * Flush rewrite rules for your post type.
	 *
	 * @access public
	 */
	public function rewrite_rules() {
		flush_rewrite_rules();
	}
}


