<?php
/**
 * Router Class File
 *
 * This file contains Router class which can handle desire routes in your WordPress site.
 * It's applicable when you want to render some pages without using WordPress posts or pages.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Init;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Plugin_Name_Name_Space\Includes\Interfaces\Action_Hook_Interface;
use Plugin_Name_Name_Space\Includes\PageHandlers\{
	Contracts\Page_Handler, Second_Page_Handler, First_Page_Handler
};

/**
 * Class Router.
 * This class use to handle different routes in your project
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @see        \Plugin_Name_Name_Space\Includes\PageHandlers\First_Page_Handler
 * @see        \Plugin_Name_Name_Space\Includes\PageHandlers\Second_Page_Handler
 */
class Router implements Action_Hook_Interface {

	/**
	 * To keep routes for your plugin
	 *
	 * @access     private
	 * @var array $routes you can save all of routes in your project in this array.
	 * @since      1.0.2
	 */
	private $routes;

	/**
	 * Router constructor.
	 * This constructor set default routes for your plugin.
	 *
	 * @access public
	 */
	public function __construct() {
		$this->set_default_routes();
	}

	/**
	 * Method set_default_routes in Router Class
	 *
	 * Inside this method, you can set your routes and initialize $routes variable for your object.
	 *
	 * @access  private
	 */
	private function set_default_routes() {
		$this->routes = [
			'/url1/url2/'        => Second_Page_Handler::class,
			'/first-sample-url/' => First_Page_Handler::class,
		];

	}

	/**
	 * Method check_routes in Router Class
	 *
	 * This is primary method in Router class that is called by Core class. First, this method get actual
	 * url that client requests for it. Second, check that is in routes array or not. Third, if it's in
	 * routes, it creates an instance from its handler class and then invoke render method to create
	 * desire page for user.
	 *
	 * @since   1.0.2
	 * @access  public
	 *
	 * @global object $wpdb     It contains a set of functions used to interact with a database.
	 * @global object $wp_roles An object of WP_Roles class that is used to implement a user roles API.
	 */
	public function check_routes() {
		$current_route = $this->get_current_route();
		if ( in_array( $current_route, $this->get_routes_keys(), true ) ) {
			$handler = $this->get_route_handler( $current_route );
			global $wpdb, $wp_roles;
			$send_error_message = array();
			/**
			 * @var Page_Handler $handler_instance
			 */
			$handler_instance   = new $handler();
			$handler_instance->render();
		}
	}

	/**
	 * Method get_current_route in Router Class
	 *
	 * This method return actual url that is requested by user (without query string in the end of url
	 * and also site url in the beginning)
	 *
	 * @access  private
	 * @return string Actual url that user requests it.
	 */
	private function get_current_route() {
		$actual_link = ( 'on' === isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] ? 'https' : 'http' )
		                . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$site_url    = get_site_url();
		$temp_url    = str_replace( $site_url, '', $actual_link );

		return strtok( $temp_url, '?' );
	}

	/**
	 * Method get_routes_keys in Router Class
	 *
	 * This method returns an array of defined routes.
	 *
	 * @since   1.0.2
	 * @access  private
	 *
	 * @return array Return routes as an array from key values of $routes property.
	 */
	private function get_routes_keys() {
		return array_keys( $this->routes );
	}

	/**
	 * Method get_route_handler in Router Class
	 *
	 * This method gets the name of class handler that is related to its route value.
	 *
	 * @since  1.0.2
	 * @access private
	 *
	 * @param  string $route Name of route that you need related class handler for it.
	 *
	 * @return string It returns class handler for route which is passed to this method.
	 */
	private function get_route_handler( $route ) {
		return $this->routes[ $route ];
	}

	/**
	 * Register actions that the object needs to be subscribed to.
	 *
	 */
	public function register_add_action() {
		add_action( 'init', array( $this, 'check_routes' ) );
	}
}
