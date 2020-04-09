<?php
/**
 * First Page Sample File
 *
 * This file contains HTML codes to render your desire page
 *
 * @package    Plugin_Name_Name_Space\templates\front
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.2
 */

use Plugin_Name_Name_Space\Includes\Functions\Utility;

/*get header*/
Utility::load_template( 'header.first-page-head', array(), 'front' );
Utility::load_template( 'header.menu', array(), 'front' );

$current_user = wp_get_current_user();
?>


<!--Primary  Section-->
<main>
    <div class="container">
        <h1 class="pluginprefix-red pluginprefix-text-center">This is sample for first page</h1>
        <div class="pluginprefix-vardump-style">
            <h2>Now we want to get current user information in the following:</h2>
			<?php var_dump( $current_user ); ?>
        </div>
    </div>
</main>

<?php

/*get footer*/
Utility::load_template( 'footer.first-page-footer', array(), 'front' );

?>

