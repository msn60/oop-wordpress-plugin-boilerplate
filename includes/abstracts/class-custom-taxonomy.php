<?php
/**
 * Custom_Taxonomy abstract Class File
 *
 * This file contains contract for Custom_Taxonomy class. If you want create a
 * custom Taxonomy in WordPress, you must to use this contract.
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
 * Class Custom_Taxonomy.
 * This file contains contract for Custom_Taxonomy class. If you want create a
 * custom post type in WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 * @see        https://carlalexander.ca/saving-wordpress-custom-post-types-using-interface/
 * @see        https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @see        https://www.smashingmagazine.com/2012/01/create-custom-taxonomies-wordpress/
 */
class Custom_Taxonomy implements Action_Hook_Interface {

	/**
	 * Post Taxonomy key.
	 * Taxonomy key, must not exceed 32 characters.
	 *
	 * @access     protected
	 * @var string $taxonomy The key of custom taxonomy
	 * @since      1.0.2
	 */
	protected $taxonomy;
	/**
	 * Object type.
	 *  Object type or array of object types with which the taxonomy should be associated.
	 *
	 * @access     protected
	 * @var array|string $object_type Array of associated object with the taxonomy
	 * @since      1.0.2
	 */
	protected $object_type;
	/**
	 *  Array or string of arguments for registering a taxonomy.
	 *
	 * @access     protected
	 * @var array | string $args Array or string of arguments for registering a Taxonomy.
	 * @since      1.0.2
	 */
	protected $args;

	/**
	 * Custom_Taxonomy constructor.
	 * This constructor gets initial values to send to add_menu_page function to
	 * create admin menu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_menu_page function.
	 */
	public function __construct( array $initial_values ) {
		$this->taxonomy    = $initial_values['taxonomy'];
		$this->object_type = $initial_values['object_type'];
		$this->args        = $initial_values['args'];
	}

	/**
	 * Method to register custom taxonomy
	 *
	 * Inside this method, we call register_post_type to create custom post type
	 *
	 * @access  public
	 * @see     https://developer.wordpress.org/reference/functions/register_post_type/
	 */
	public function add_custom_taxonomy() {
		register_taxonomy( $this->taxonomy, $this->object_type, $this->args );
	}

	/**
	 * call 'init' add_action to create custom taxonomy
	 *
	 * @access public
	 */
	public function register_add_action() {
		add_action( 'init', array( $this, 'add_custom_taxonomy' ) );
	}

}
