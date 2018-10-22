<?php

namespace Plugin_Name_Dir\Includes\Config;

class Info {

	public $plugin_setting_option1;
	public $plugin_setting_option2;
	public $plugin_setting_option3;
	public $plugin_setting_option4;

	public function __construct() {
		$this->plugin_setting_option1
			= get_option( 'plugin_name_prefix_plugin_setting_option1' );
		$this->plugin_setting_option2
			= get_option( 'plugin_name_prefix_plugin_setting_option2' );
		$this->plugin_setting_option3
			= get_option( 'plugin_name_prefix_plugin_setting_option3' );
		$this->plugin_setting_option4
			= get_option( 'plugin_name_prefix_plugin_setting_option4' );
	}

	public static function add_info_in_plugin_activation() {
		if ( ! get_option( 'plugin_name_prefix_plugin_setting_option1' ) ) {
			update_option(
				'plugin_name_prefix_plugin_setting_option1',
				'Initial value for option 1'
			);
		}

		if ( ! get_option( 'plugin_name_prefix_plugin_setting_option2' ) ) {
			update_option(
				'plugin_name_prefix_plugin_setting_option2',
				'Initial value for option 2'
			);
		}

		if ( ! get_option( 'plugin_name_prefix_plugin_setting_option3' ) ) {
			update_option(
				'plugin_name_prefix_plugin_setting_option3',
				'Initial value for option 3'
			);
		}
		if ( ! get_option( 'plugin_name_prefix_plugin_setting_option4' ) ) {
			update_option(
				'plugin_name_prefix_plugin_setting_option4',
				'Initial value for option 4'
			);
		}
	}

	public function update_some_info() {
		update_option(
			'plugin_name_prefix_plugin_setting_option1',
			$this->plugin_setting_option1
		);
		update_option(
			'plugin_name_prefix_plugin_setting_option2',
			$this->plugin_setting_option2
		);
		update_option(
			'plugin_name_prefix_plugin_setting_option3',
			$this->plugin_setting_option3
		);
		update_option(
			'plugin_name_prefix_plugin_setting_option4',
			$this->plugin_setting_option4
		);
	}


}

