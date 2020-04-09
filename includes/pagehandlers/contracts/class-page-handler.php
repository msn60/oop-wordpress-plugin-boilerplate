<?php
/**
 * Page Handler Interface File
 *
 * This file contains interface which you must implement whenever you want
 * to load a page.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\PageHandlers\Contracts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Interface Page_Handler
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
interface Page_Handler {

	/**
	 * Render method to render a page with router
	 *
	 * This method must be implement by children who implement this interface.
	 *
	 * @since   1.0.2
	 * @access  public
	 */
	public function render();
}
