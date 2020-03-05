<?php
/**
 * Complete_Shortcode Class File
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
 * Complete_Shortcode Class File
 *
 * Simple self-closing tag shortcode sample class
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 */
class Complete_Shortcode extends Shortcode {

	/**
	 * define_shortcode  method in Shortcode Class
	 *
	 * For each each defined shortcode, you must define callable function
	 * for that. This method has this role as a shortcode callable function
	 * sample for define this shortcode:
	 * [msn_complete_shortcode] OR [/msn_complete_shortcode]
	 *
	 * @param array  $atts    attributes which can pass throw shortcode in front end
	 * @param string $content The content between starting and closing shortcode tag
	 * @param string $tag     The name of the shortcode tag
	 *
	 * @return string
	 */
	public function define_shortcode_handler( $atts = [], $content = null, $tag = '' ) {

		// normalize attribute keys, lowercase
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );

		// override default attributes with user attributes
		$shortcode_attributes = shortcode_atts( [
			'link' => $this->default_atts['link'],
			'name' => $this->default_atts['name'],
		], $atts, $tag );

		// start output
		$output = '';

		// enclosing tags
		if ( ! is_null( $content ) ) {
			// secure output by executing the_content filter hook on $content
			//$output .= apply_filters( 'the_content', $content );

			// run shortcode parser recursively
			//$output .= do_shortcode( $content );
			// use content
			$output .= '<h2>' . do_shortcode( $content ) . '</h2>';
		}

		// start box
		$output .= '<div class="msn-primary-box">';

		// generate a link
		$output .= '<a href="' . esc_url( $shortcode_attributes['link'] ) . '"' . '>Click here to access '
		           . esc_html__( $shortcode_attributes['name'], PLUGIN_NAME_TEXTDOMAIN ) . '</a>';

		// end box
		$output .= '</div>';

		// return output
		return $output;
	}


}
