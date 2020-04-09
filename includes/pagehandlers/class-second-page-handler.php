<?php
/**
 * Sample Page Handler Class File
 *
 * This file contains Second_Page_Handler class which is used to render a page in your project
 * with a specific route or url.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\PageHandlers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Plugin_Name_Name_Space\Includes\Functions\Template_Builder;
use Plugin_Name_Name_Space\Includes\PageHandlers\Contracts\Page_Handler;
use Plugin_Name_Name_Space\Includes\Functions\Utility;

/**
 * Class Second_Page_Handler.
 * This class  is used to render a page in your project with a specific route or url.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @see        \Plugin_Name_Name_Space\Includes\Functions\Utility
 * @see        \Plugin_Name_Name_Space\Includes\PageHandlers\Contracts\Page_Handler
 */
class Second_Page_Handler implements Page_Handler {
	use Template_Builder;

	/**
	 * Method render in First_Page_Handler Class
	 *
	 * It calls when you need to render a view in your website.
	 *
	 * @access  public
	 */
	public function render() {

		$sample_variable = 'Mehdi Soltani';
		$this->load_template( 'second-page-sample', compact( 'sample_variable' ), 'front' );
		exit;
	}
}
