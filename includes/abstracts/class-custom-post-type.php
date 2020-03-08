<?php
/**
 * Custom_Post_Type abstract Class File
 *
 * This file contains contract for Custom_Post_Type class. If you want create a
 * custom post type in WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Abstracts;

use Plugin_Name_Name_Space\Includes\Interfaces\Action_Hook_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Custom_Post_Type.
 * This file contains contract for Custom_Post_Type class. If you want create a
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
abstract class Custom_Post_Type implements Action_Hook_Interface {

	/**
	 * Post type key.
	 * Must not exceed 20 characters and may only contain lowercase alphanumeric characters, dashes, and underscores. See sanitize_key().
	 *
	 * @access     protected
	 * @var string $post_type The key of post type
	 * @since      1.0.2
	 */
	protected $post_type;
	/**
	 *  Array or string of arguments for registering a post type.
	 *
	 * @access     protected
	 * @var array | string $args Array or string of arguments for registering a post type.
	 * @since      1.0.2
	 */
	protected $args;

	/**
	 * Custom_Post_Type constructor.
	 * This constructor gets initial values to send to add_menu_page function to
	 * create admin menu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_menu_page function.
	 */
	public function __construct( array $initial_values ) {
		$this->post_type = $initial_values['post_type'];
		$this->args      = $initial_values['args'];
	}

	/**
	 * Method to register custom post type
	 *
	 * Inside this method, we call register_post_type to create custom post type
	 *
	 * @access  public
	 * @see     https://developer.wordpress.org/reference/functions/register_post_type/
	 */
	public function add_custom_post_type() {
		register_post_type( $this->post_type, $this->args );
	}

	/**
	 * call 'init' add_action to create custom post type
	 *
	 * @access public
	 */
	public function register_add_action() {
		add_action( 'init', array( $this, 'add_custom_post_type' ) );
		//add_filter( 'manage_edit-'.$this->post_type.'_columns',        array($this, 'set_columns'), 10, 1) ;
	}

	/**
	 * Insert or update a custom post type.
	 *
	 * @param bool $wp_error
	 *
	 * @return int| \WP_Error
	 */
	public function insert_custom_post( $wp_error = false ) {
		$post_id = wp_insert_post( $this->get_post_data(), $wp_error );

		if ( 0 === $post_id || $post_id instanceof \WP_Error ) {
			return $post_id;
		}

		foreach ( $this->get_post_meta() as $key => $value ) {
			update_post_meta( $post_id, $key, $value );
		}

		return $post_id;
	}


	/**
	 * Get the post data as a wp_insert_post compatible array.
	 *
	 * @access  public
	 * @return  array
	 */
	abstract public function get_post_data();

	/**
	 * Get all the post meta as a key-value associative array.
	 *
	 * @access  public
	 * @return array
	 */
	abstract public function get_post_meta();

}
