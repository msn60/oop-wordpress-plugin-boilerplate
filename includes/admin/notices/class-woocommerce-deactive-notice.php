<?php
/**
 * Woocommerce_Deactive_Notice Class File
 *
 * This file contains admin notices to show that Woocommerce is deactivated in admin panel
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Admin\Notices;


use Plugin_Name_Name_Space\Includes\Abstracts\Admin_Notice;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Woocommerce_Deactive_Notice Class File
 *
 * This file contains admin notices to show that Woocommerce is deactivated in admin panel
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 * @see        https://code.tutsplus.com/series/persisted-wordpress-admin-notices--cms-1252
 * @see        https://code.tutsplus.com/tutorials/persisted-wordpress-admin-notices-part-1--cms-30134
 */
class Woocommerce_Deactive_Notice extends Admin_Notice {


	/**
	 * Method to show admin notice which is Woocommerce is not activated.
	 *
	 * @param array $args Arguments which are needed to show on notice
	 */
	public function show_admin_notice() {
		?>
        <div class="notice notice-error">
            <p>
				<?php _e(
					'Unfortunately Woocommerce is not activate. So you can not use feature of this plugin ',
                    PLUGIN_NAME_TEXTDOMAIN
				) ?>
            </p>
        </div>

		<?php
	}

}
