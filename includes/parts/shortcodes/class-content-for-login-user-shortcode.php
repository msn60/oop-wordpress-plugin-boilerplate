<?php
/**
 * Content_For_Login_User_Shortcode Class File
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
 * Content_For_Login_User_Shortcode Class File
 *
 * Simple enclosing tag shortcode to show content only for login users
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 */
class Content_For_Login_User_Shortcode extends Shortcode {

	/**
	 * define_shortcode  method in Shortcode Class
	 *
	 * For each each defined shortcode, you must define callable function
	 * for that. This method has this role as a shortcode callable function
	 * sample for define this shortcode:
	 * [msn_content_for_login_user]$content[/msn_content_for_login_user]
	 *
	 * @param array  $atts    attributes which can pass throw shortcode in front end
	 * @param string $content The content between starting and closing shortcode tag
	 * @param string $tag     The name of the shortcode tag
	 *
	 * @return string
	 */
	public function define_shortcode_handler( $atts = [], $content = null, $tag = '' ) {

		if ( is_user_logged_in() ) {
			return $content;
		} else {
			return '<div class="member-only">'.__( 'This section only shows for login users', PLUGIN_NAME_TEXTDOMAIN ).'</div>';
		}
	}

}
