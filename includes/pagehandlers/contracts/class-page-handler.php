<?php
/**
 * Page Handler Interface File
 *
 * This file contains interface which you must implement whenever you want
 * to load a page.
 *
 * @package    Plugin_Name_Dir\Includes\PageHandlers\Contracts
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Dir\Includes\PageHandlers\Contracts;

/**
 * Interface Page_Handler
 *
 * @package Plugin_Name_Dir\Includes\PageHandlers\Contracts
 */
interface Page_Handler {

	/**
	 * Render method to render a page with router
	 *
	 * This method must be implement by children who implement this interface.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function render();
}
