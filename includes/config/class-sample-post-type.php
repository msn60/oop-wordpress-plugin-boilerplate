<?php
/**
 * Sample_Post_Type Class File
 *
 * This file contains Sample_Post_Type  class. It implements methods that you
 * need for your sample post type
 *
 * @package    Plugin_Name_Name_Space\Includes\Config
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Name_Space\Includes\Config;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Sample_Post_Type
 * This class contains all things that you need to customize your custom post type
 *
 * @package    Plugin_Name_Name_Space\Includes\Config
 * @author     Your_Name <youremail@nomail.com>
 */
class Sample_Post_Type extends Register_Post_Type {

	/**
	 * Initialize values to register sample post type
	 *
	 * @access public
	 */
	public function initial_value() {
		$initial_value        = Initial_Value::args_for_sample_post_type();
		$this->post_type_name = $initial_value['post_type_name'];
		$this->args           = $initial_value['args'];

	}
}



