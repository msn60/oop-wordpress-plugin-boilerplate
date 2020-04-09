<?php
/**
 * Meta_box Class File
 *
 * This file contains Meta_box  class. If you want create a meta box
 * inside admin panel of WordPress, you can use from this class.
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
 * Class Admin_Menu.
 * This file contains Meta_box  class. If you want create a meta box
 * inside admin panel of WordPress, you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @see        https://developer.wordpress.org/reference/functions/add_meta_box/
 * @see        https://developer.wordpress.org/reference/functions/get_post_meta/
 * @see        https://developer.wordpress.org/reference/functions/wp_nonce_field/
 */
abstract class Meta_box implements Action_Hook_Interface {

	/**
	 * Meta box ID (used in the 'id' attribute for the meta box)
	 *
	 * @access     private
	 * @var string $id The Meta box ID.
	 * @since      1.0.2
	 */
	protected $id;
	/**
	 * Title of the meta box.
	 *
	 * @access     private
	 * @var string $title Title of the meta box.
	 * @since      1.0.2
	 */
	protected $title;
	/**
	 * Function that fills the box with the desired content. The function should echo its output.
	 *
	 * @access     private
	 * @var callable $callback Function that fills the box with the desired content.
	 * @since      1.0.2
	 */
	protected $callback;
	/**
	 * The screen or screens on which to show the box (such as a post type, 'link', or 'comment').
	 *
	 * Accepts a single screen ID, WP_Screen object, or array of screen IDs.
	 * Default is the current screen. If you have used add_menu_page() or add_submenu_page()
	 * to create a new screen (and hence screen_id), make sure your menu slug conforms to the limits of sanitize_key()
	 * otherwise the 'screen' menu may not correctly render on your page.Default value: null
	 *
	 * @access     private
	 * @var string | array | \WP_Screen $screen The screen or screens on which to show the box.
	 * @since      1.0.2
	 */
	protected $screens;
	/**
	 *  The context within the screen where the boxes should display.
	 *
	 *  Available contexts vary from screen to screen. Post edit screen contexts include 'normal', 'side', and 'advanced'.
	 *  Comments screen contexts include 'normal' and 'side'. Menus meta boxes (accordion sections) all use the 'side' context.
	 *  GlobalDefault value: 'advanced'.
	 *
	 * @access     private
	 * @var string $context The context within the screen where the boxes should display.
	 * @since      1.0.2
	 */
	protected $context;
	/**
	 * The priority within the context where the boxes should show ('high', 'low').
	 *
	 * Default value: 'default'.
	 *
	 * @access     private
	 * @var string $priority The priority within the context where the boxes should show .
	 * @since      1.0.2
	 */
	protected $priority;
	/**
	 * Data that should be set as the $args property of the box array.
	 *
	 * Data that should be set as the $args property of the box array
	 * which is the second parameter passed to your callback).
	 *
	 * @access     private
	 * @var array $callback_args Data that should be set as the $args property of the box array.
	 * @since      1.0.2
	 */
	protected $callback_args;
	/**
	 * Name of post meta key: it's used as meta_key
	 *
	 * @access     private
	 * @var string $meta_key Name of post meta key.
	 * @since      1.0.2
	 */
	protected $meta_key;
	/**
	 * If true, returns only the first value for the specified meta key.
	 *
	 * @access     private
	 * @var bool $single If true, returns only the first value for the specified meta key.
	 * @since      1.0.2
	 */
	protected $single;
	/**
	 * Name of your action for wp_nonce_field method
	 *
	 * @access     private
	 * @var string $action Name of your action to set nonce.
	 * @since      1.0.2
	 */
	protected $action;
	/**
	 * Name of your nonce for wp_nonce_field method
	 *
	 * @access     private
	 * @var string $nonce_name Name of your nonce.
	 * @since      1.0.2
	 */
	protected $nonce_name;


	/**
	 * Meta_Box constructor.
	 * This constructor gets initial values to send to add_meta_box & get_post_meta
	 * & update_post_meta function to create specific meta box.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_meta_box  get_post_meta & update_post_meta function.
	 */
	public function __construct( array $initial_values ) {
		$this->id            = $initial_values['id'];
		$this->title         = $initial_values['title'];
		$this->callback      = $initial_values['callback'];
		$this->screens       = $initial_values['screens'];
		$this->context       = $initial_values['context'];
		$this->priority      = $initial_values['priority'];
		$this->callback_args = $initial_values['callback_args'];
		$this->meta_key      = $initial_values['meta_key'];
		$this->single        = $initial_values['single'];
		$this->action        = $initial_values['action'];
		$this->nonce_name    = $initial_values['nonce_name'];

	}

	/**
	 * Register actions for Meta box class
	 */
	public function register_add_action() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}


	/**
	 * Adds the meta box container.
	 *
	 * @access  protected
	 *
	 * @param string $post_type Pass the current post type inside WordPress admin panel(global $post_type).
	 */
	public function add_meta_box( $post_type ) {
		// Limit meta box to certain post types which is define in $sreen
		if ( $this->screens === null or in_array( $post_type, $this->screens ) ) {
			add_meta_box(
				$this->id,
				$this->title,
				array( $this, $this->callback ),
				$post_type,
				$this->context,
				$this->priority
			);
		}
	}

	/**
	 * Abstract Method to render meta box content
	 *
	 * @access  public
	 *
	 * @param object $post Pass current global post.
	 */
	abstract public function render_content( $post );

	/**
	 * Save the meta when the post is saved.
	 *
	 * @access protected
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save( $post_id ) {

		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */
		if ( $this->verify_before_save( $post_id ) == 'verified' ) {
			/* OK, it's safe for us to save the data now. */
			$this->save_meta_box( $post_id );
		}


	}

	protected function verify_before_save( $post_id ) {

		// Check if our nonce is set.
		if ( ! isset( $_POST[ $this->nonce_name ] ) ) {
			return $post_id;
		}

		$nonce = $_POST[ $this->nonce_name ];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, $this->action ) ) {
			return $post_id;
		}

		/*
		 * If this is an autosave, our form has not been submitted,
		 * so we don't want to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		return 'verified';
	}

	/**
	 * Abstract method to save content of meta box
	 *
	 * @param $post_id
	 * @param $_POST
	 *
	 * @return mixed
	 */
	abstract protected function save_meta_box( $post_id );
}
