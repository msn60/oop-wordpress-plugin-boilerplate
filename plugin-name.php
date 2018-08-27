<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also includes all of the dependencies used by
 * the plugin, registers the activation and deactivation functions, and defines
 * a function that starts the plugin.
 *
 * @link              https://github.com/msn60/oop-wordpress-boilerplate
 * @since             1.0.0
 * @package           plugin_name
 *
 * @wordpress-plugin
 * Plugin Name:       OOP Wordpress Plugin Boilerplate
 * Plugin URI:        https://github.com/msn60/oop-wordpress-boilerplate
 * Description:       This is a boilerplate for plugin development in WordPress with OOP structure
 * Version:           1.0.1
 * Author:            Mehdi Soltani
 * Author URI:        https://wpwebmaster.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*Define your namespaces here by use keyword*/
use Plugin_Name_Dir\Includes;
use Plugin_Name_Dir\Includes\Init;
use Plugin_Name_Dir\Includes\Uninstall;
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

/**
 * Currently plugin version.
 * Rename this for your plugin and update it as you release new versions.
 */
define('PLUGIN_NAME_VERSION', '1.0.1');

/*Define Autoloader class for plugin*/
require_once trailingslashit(plugin_dir_path(__FILE__)) . 'includes/class-autoloader.php';
/*Define required constant for plugin*/
Includes\Init\Constant::define_constant();

/*Activation and Deactivation hooks*/
function activate_plugin_name()
{
    Includes\Init\Activator::activate();
}

function deactivate_plugin_name()
{
    Includes\Uninstall\Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_plugin_name');
register_deactivation_hook(__FILE__, 'deactivate_plugin_name');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name()
{
    $plugin = new Includes\Init\Core();
    $plugin->run();
}

run_plugin_name();


/*function uninstall_plugin_name() {
   	MsnsprUninstall::uninstall();
}
register_uninstall_hook(__FILE__, 'uninstall_plugin_name');*/





