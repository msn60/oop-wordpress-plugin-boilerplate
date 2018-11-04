<?php


namespace Plugin_Name_Dir\Includes\Admin;


class Admin_Menu {

	protected $page_title;
	protected $menu_title;
	protected $capability;
	protected $menu_slug;
	protected $callable_function;
	protected $icon_url;
	protected $position;

	public function __construct( $initial_value ) {
		$this->page_title        = $initial_value['page_title'];
		$this->menu_title        = $initial_value['menu_title'];
		$this->capability        = $initial_value['capability'];
		$this->menu_slug         = $initial_value['menu_slug'];
		$this->callable_function = $initial_value['callable_function'];
		$this->icon_url          = $initial_value['icon_url'];
		$this->position          = $initial_value['position'];
	}

	public function add_admin_menu_page() {
		add_menu_page(
			$this->page_title,
			$this->menu_title,
			$this->capability,
			$this->menu_slug,
			array( $this, $this->callable_function ),
			$this->icon_url,
			$this->position
		);
	}

	public function management_panel_handler() {


	}
}