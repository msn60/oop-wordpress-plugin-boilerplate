<?php


namespace Plugin_Name_Dir\Includes\Admin;


class Admin_Sub_Menu {

	protected $parent_slug;
	protected $page_title;
	protected $menu_title;
	protected $capability;
	protected $menu_slug;
	protected $callable_function;

	public function __construct( $initial_value ) {

		$this->parent_slug       = $initial_value['parent-slug'];
		$this->page_title        = $initial_value['page_title'];
		$this->menu_title        = $initial_value['menu_title'];
		$this->capability        = $initial_value['capability'];
		$this->menu_slug         = $initial_value['menu_slug'];
		$this->callable_function = $initial_value['callable_function'];

	}

	public function add_admin_sub_menu_page() {
		add_submenu_page(
			$this->parent_slug,
			$this->page_title,
			$this->menu_title,
			$this->capability,
			$this->menu_slug,
			array( $this, $this->callable_function )
		);

	}

	public function sub_menu1_panel_handler() {
		echo 'this  is test for admin Sub menu 1';
	}

	public function sub_menu2_panel_handler() {
		echo 'this  is test for admin Sub menu 2';
	}
}