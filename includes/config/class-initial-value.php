<?php

namespace Plugin_Name_Dir\Includes\Config;
class Initial_Value {

	public static function sample_menu_page() {
		$initial_value = [
			'page_title'        => 'Sample Title',
			'menu_title'        => 'Sample menu',
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-prefix-sample-url',
			'callable_function' => 'management_panel_handler',
			'icon_url'          => 'dashicons-welcome-widgets-menus',
			'position'          => 2,
		];

		return $initial_value;
	}

	public static function sample_sub_menu_page1() {
		$initial_value = [
			'parent-slug'       => 'plugin-prefix-sample-url',
			'page_title'        => 'Sample Submenu 1',
			'menu_title'        => 'Submenu 1',
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-prefix-sample-url',
			'callable_function' => 'sub_menu1_panel_handler',
		];

		return $initial_value;
	}

	public static function sample_sub_menu_page2() {
		$initial_value = [
			'parent-slug'       => 'plugin-prefix-sample-url',
			'page_title'        => 'Sample Submenu 2',
			'menu_title'        => 'Submenu 2',
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-prefix-sample-url-2',
			'callable_function' => 'sub_menu2_panel_handler',
		];

		return $initial_value;
	}

}