<?php
/**
 * Shortcode abstract Class File
 *
 * This file contains contract for Shortcode class.
 * If you want to create a shortcode, you must use from this contract.
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
 * Shortcode abstract Class File
 *
 * This file contains contract for Shortcode class.
 * If you want to create a shortcode, you must use from this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 * @see        https://developer.wordpress.org/plugins/shortcodes/shortcodes-with-parameters/
 * @see        https://code.tutsplus.com/articles/create-wordpress-plugins-with-oop-techniques--net-20153
 * @see        https://www.smashingmagazine.com/2012/05/wordpress-shortcodes-complete-guide/
 * @see        https://speckyboy.com/getting-started-with-wordpress-shortcodes-examples/
 * @see        https://wpshout.com/how-to-create-wordpress-shortcodes/
 * @see        https://codex.wordpress.org/Shortcode_API
 * @see        https://en.support.wordpress.com/shortcodes/
 * @see        https://kinsta.com/blog/wordpress-shortcodes/
 */
abstract class Shortcode implements Action_Hook_Interface {

	/**
	 * The name of the [$tag]
	 *
	 * @access     protected
	 * @var string $tag The name of the [$tag] (i.e. the name of the shortcode)
	 */
	protected $tag;
	/**
	 * [$tag] attributes
	 *
	 * @access     protected
	 * @var array $atts [$tag] attributes
	 */
	protected $atts;
	/**
	 * [$tag] default attributes value
	 *
	 * @access     protected
	 * @var array $default_atts [$tag] default attributes value
	 */
	protected $default_atts;
	/**
	 * Content inside of [$tag]
	 *
	 * @access     protected
	 * @var string $content Content inside of [$tag]
	 */
	protected $content;

	/**
	 * Admin_Menu constructor.
	 * This constructor gets initial values to send to add_menu_page function to
	 * create admin menu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_menu_page function.
	 */
	public function __construct( array $initial_values ) {
		$this->tag          = $initial_values['tag'];
		$this->default_atts = $initial_values['default_atts'];
		$this->atts         = [];
		$this->content      = null;
	}

	/**
	 * call 'init' add_action to register add_shortcut in correct place
	 *
	 * @access public
	 */
	public function register_add_action() {
		add_action( 'init', array( $this, 'register_shortcode' ) );
	}

	/**
	 * Method register_shortcode to call add_shortcode function
	 *
	 * @access  public
	 */
	public function register_shortcode() {
		add_shortcode( $this->tag, array( $this, 'define_shortcode_handler' ) );
	}


	/**
	 * Abstract Method define_shortcode in Shortcode Class
	 *
	 * For each each defined shortcode, you must define callable function
	 * for that. This method has this role as a shortcode callable function
	 *
	 * @access  public
	 *
	 * @param array  $atts    attributes which can pass throw shortcode in front end
	 * @param string $content The content between starting and closing shortcode tag
	 * @param string $tag     The name of the shortcode tag
	 */
	abstract public function define_shortcode_handler( $atts = [], $content = null, $tag = '' );

}
