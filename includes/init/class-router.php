<?php

namespace Plugin_Name_Dir\Includes\Init;

use Plugin_Name_Dir\Includes\PageHandlers\Second_Page_Handler;
use Plugin_Name_Dir\Includes\PageHandlers\First_Page_Handler;


class Router {
	private $routes;

	public function __construct() {
		$this->set_defualt_routes();
	}

	private function set_defualt_routes() {
		$this->routes = [
			'/url1/url2'        => Second_Page_Handler::class,
			'/first-sample-url' => First_Page_Handler::class,
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