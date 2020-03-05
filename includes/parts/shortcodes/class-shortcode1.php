<?php
/**
 * Shortcode1 Class File
 *
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Parts\Shortcodes;

use Plugin_Name_Name_Space\Includes\Abstracts\Shortcode;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode1 Class File
 *
 * Simple self-closing tag shortcode sample class
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 */
class Shortcode1 extends Shortcode {

	/**
	 * define_shortcode  method in Shortcode Class
	 *
	 * For each each defined shortcode, you must define callable function
	 * for that. This method has this role as a shortcode callable function
	 * sample for define this shortcode:
	 * [msnshortcode1] OR [msnshortcode1 name="Mehdi Soltani"]
	 *
	 * @param array  $atts    attributes which can pass throw shortcode in front end
	 * @param string $content The content between starting and closing shortcode tag
	 * @param string $tag     The name of the shortcode tag
	 *
	 * @return string
	 */
	public function define_shortcode_handler( $atts = [], $content = null, $tag = '' ) {

		$args = shortcode_atts( [
				"name" => $this->default_atts['name'],
			]
			, $atts );

		return '<div>Hi ' . $args["name"] . '</div>';
	}


}
