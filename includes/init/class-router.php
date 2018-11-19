<?php

namespace Ayande_Roshan\Includes\Init;

use Ayande_Roshan\Includes\Functions\Utility;
use Ayande_Roshan\Includes\PageHandlers\Entrance_Handler;
use Ayande_Roshan\Includes\PageHandlers\Register_Handler;
use Ayande_Roshan\Includes\PageHandlers\Hamyinfo_Handler;
use Ayande_Roshan\Includes\PageHandlers\Assign_Location_Handler;
use Ayande_Roshan\Includes\PageHandlers\Change_Password_Handler;
use Ayande_Roshan\Includes\PageHandlers\Edit_Profile_Handler;
use Ayande_Roshan\Includes\PageHandlers\Hemayatha_List_Handler;
use Ayande_Roshan\Includes\PageHandlers\Hire_List_Handler;
use Ayande_Roshan\Includes\PageHandlers\Location_List_Handler;
use Ayande_Roshan\Includes\PageHandlers\Logout_Handler;
use Ayande_Roshan\Includes\PageHandlers\Request_To_Hire_Handler;
use Ayande_Roshan\Includes\PageHandlers\Request_To_Pay_Aid_Handler;
use Ayande_Roshan\Includes\PageHandlers\Activation_Handler;
use Ayande_Roshan\Includes\PageHandlers\Change_Password_Activator_Handler;
use Ayande_Roshan\Includes\PageHandlers\Msntest_Handler;

class Router {
	private $routes;

	public function __construct() {
		$this->set_defualt_routes();
	}

	private function set_defualt_routes() {
		$this->routes = [
			'/supporter/entrance'                  => Entrance_Handler::class,
			'/supporter/register'                  => Register_Handler::class,
			'/supporter/hamyinfo'                  => Hamyinfo_Handler::class,
			'/supporter/logout'                    => Logout_Handler::class,
			'/supporter/assign-location'           => Assign_Location_Handler::class,
			'/supporter/change-password'           => Change_Password_Handler::class,
			'/supporter/edit-profile'              => Edit_Profile_Handler::class,
			'/supporter/request-to-hire'           => Request_To_Hire_Handler::class,
			'/supporter/request-to-pay-aid'        => Request_To_Pay_Aid_Handler::class,
			'/supporter/activation'                => Activation_Handler::class,
			'/supporter/change-password-activator' => Change_Password_Activator_Handler::class,
			'/supporter/hemayatha-list'            => Hemayatha_List_Handler::class,
			'/supporter/hire-list'                 => Hire_List_Handler::class,
			'/supporter/msntest'                   => Msntest_Handler::class,
			'/supporter/location-list'             => Location_List_Handler::class
		];

	}

	public function boot() {
		$current_Route = $this->get_current_route();
		if ( in_array( $current_Route, $this->get_routes_keys() ) ) {
			$handler = $this->get_route_handler( $current_Route );
			global $wpdb, $wp_roles;
			$sendErrorMessage = [];
			$handler_Instance = new $handler;
			$handler_Instance->render();
		}


	}

	private function get_current_route() {
		$actual_link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" )
		               . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$site_url    = get_site_url();
		$tempstr     = str_replace( $site_url, '', $actual_link );

		return strtok( $tempstr, '?' );
	}

	private function get_routes_keys() {
		return array_keys( $this->routes );
	}

	private function get_route_handler( $route ) {
		return $this->routes[ $route ];

	}


}