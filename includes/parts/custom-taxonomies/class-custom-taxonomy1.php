<?php
/**
 * Custom_Taxonomy1 abstract Class File
 *
 * This file contains contract for Custom_Taxonomy1 class. If you want create a
 * custom post type in WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Parts\Custom_Taxonomies;

use Plugin_Name_Name_Space\Includes\Abstracts\Custom_Taxonomy;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Custom_Taxonomy1.
 * This file contains contract for Custom_Taxonomy1 class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 *
 */
class Custom_Taxonomy1 extends Custom_Taxonomy {

	/**
	 * The singular name of Taxonomy1
	 *
	 * @var string $singular_name
	 */
	private $singular_name;

	/**
	 * Custom_Taxonomy1 constructor.
	 *
	 * @param array $initial_values
	 */
	public function __construct( array $initial_values ) {
		parent::__construct( $initial_values );
		$this->singular_name = $initial_values['args']['labels']['singular_name'];
	}


}
