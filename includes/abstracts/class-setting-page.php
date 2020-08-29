<?php
/**
 * Setting_Page abstract Class File
 *
 * This file contains contract for Setting_Page class. If you want create an settings page
 * inside admin panel of WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Abstracts;

use Plugin_Name_Name_Space\Includes\Functions\Template_Builder;
use Plugin_Name_Name_Space\Includes\Interfaces\Action_Hook_Interface;
use Plugin_Name_Name_Space\Includes\Abstracts\Option_Menu;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Abstract Class Setting_Page.
 * This file contains contract for Setting_Page class. If you want create an settings page
 * inside admin panel of WordPress, you must to use this contract.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_menu_page/
 * @see        https://github.com/ahmadawais/WP-OOP-Settings-API
 * @see        https://github.com/harishdasari/WP-Settings-API-Wrapper-Class
 * @see        https://github.com/jamesckemp/WordPress-Settings-Framework
 * @see        https://github.com/pinoceniccola/WordPress-Plugin-Settings-API-Template
 * @see        https://github.com/tareq1988/wordpress-settings-api-class
 *
 */
abstract class Setting_Page implements Action_Hook_Interface {
	use Template_Builder;

	/**
	 * Array of settings sections arguments.
	 * It's an array of arguments that 'add_setting_section' method needs.
	 *
	 * @var array $settings_sections Array of settings sections arguments.
	 * @see https://developer.wordpress.org/reference/functions/add_settings_section/
	 */
	protected $settings_sections;
	/**
	 * Array of settings fields arguments.
	 * It's an array of argument that 'add_setting_field' method needs.
	 *
	 * @var array $settings_fields Array of settings fields arguments.
	 * @see https://developer.wordpress.org/reference/functions/add_settings_field/
	 */
	protected $settings_fields;
	/**
	 * Array of settings errors arguments.
	 * It's an array of argument that 'add_setting_error' method needs.
	 *
	 * @var array $settings_errors Array of settings errors arguments.
	 * @see https://developer.wordpress.org/reference/functions/add_settings_error/
	 */
	protected $settings_errors;
	/**
	 * An admin menu which is passed to set settings page inside it
	 *
	 * @var Option_Menu | Admin_Menu | Admin_Sub_Menu $admin_menu An admin menu which is passed to set settings page inside it
	 */
	protected $admin_menu;

	/**
	 * Setting_Page constructor.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to create settings page and its admin menu which needs to show.
	 */
	public function __construct( array $initial_values, $admin_menu ) {
		$this->settings_sections = $initial_values['settings_sections'];
		$this->settings_fields   = $initial_values['settings_fields'];
		$this->settings_errors   = $initial_values['settings_errors'];
		$this->admin_menu        = $admin_menu;
	}

	/**
	 * call all needed add_actions to create settings page
	 *
	 * @access public
	 */
	public function register_add_action() {
		add_action( 'admin_enqueue_scripts', array( $this, 'set_admin_scripts' ) );
		add_action( 'admin_init', array( $this, 'add_settings_page' ) );
		// You can also add option page inside this class but due to my structure in plugin, I avoided this solution.
		//add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		$this->add_admin_menu();
	}

	/**
	 * Enqueue admin scripts that this class needs them
	 *
	 */
	public function set_admin_scripts() {
		// jQuery is needed.
		wp_enqueue_script( 'jquery' );
		// Color Picker.
		wp_enqueue_script(
			'iris',
			admin_url( 'js/iris.min.js' ),
			array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
			false,
			1
		);
		// Media Uploader.
		wp_enqueue_media();
	}

	/**
	 * All of methods which is needed to create sections and fields and option page
	 *
	 * @access  public
	 */
	public function add_settings_page() {
		$this->add_all_settings_sections();
		$this->add_all_settings_fields();
		$this->init_register_setting();

	}

	/**
	 * A method to add all of settings section
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_settings_section/
	 */
	public function add_all_settings_sections() {
		if ( ! is_null($this->settings_sections)) {
			foreach ( $this->settings_sections as $settings_section ) {
				add_settings_section(
					$settings_section['id'],
					$settings_section['title'],
					function() use ( $settings_section ) {
						$this->create_section($settings_section);
					},
					$settings_section['id']
				);
			}
		}
	}


	/**
	 * Method to create section description
	 *
	 * @param array $section Method to create section description
	 */
	public function create_section( $section ) {
		echo '<div class="msn-inside-section">' . $section['description'] . '</div>';
	}

	/**
	 * A method to register settings
	 */
	public function init_register_setting() {
		foreach ( $this->settings_sections as $settings_section ){
			/*$register_setting_arg = array(
				'type'              => $setting_group['register_setting_args']['type'],
				'description'       => $setting_group['register_setting_args']['description'],
				'sanitize_callback' => array( $this, 'sanitize_setting_fields' ),
				'show_in_rest'      => $setting_group['register_setting_args']['show_in_rest'],
				'default'           => $setting_group['register_setting_args']['default'],

			);*/
			register_setting($settings_section['id'], $settings_section['id'], array( $this , 'sanitize_setting_fields'));
		}
	}



	/**
	 * A method to add all of settings fields
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_settings_field/
	 */
	public function add_all_settings_fields() {
		if ( ! is_null( $this->settings_fields ) ) {
			foreach ( $this->settings_fields as $section => $field_array) {
				foreach ( $field_array as $field) {
					//var_dump($field);
					// ID.
					$id = isset( $field['id'] ) ? $field['id'] : false;

					// Type.
					$type = isset( $field['type'] ) ? $field['type'] : 'text';

					// Name.
					$name = isset( $field['name'] ) ? $field['name'] : '';

					// Label for.
					$label_for = "{$section}[{$field['id']}]";

					// Description.
					$description = isset( $field['desc'] ) ? $field['desc'] : '';

					// Size.
					$size = isset( $field['size'] ) ? $field['size'] : null;

					// Options.
					$options = isset( $field['options'] ) ? $field['options'] : '';

					// Standard default value.
					$default = isset( $field['default'] ) ? $field['default'] : '';

					// Standard default placeholder.
					$placeholder = isset( $field['placeholder'] ) ? $field['placeholder'] : '';

					// Sanitize Callback.
					$sanitize_callback = isset( $field['sanitize_callback'] ) ? $field['sanitize_callback'] : '';

					$args = array(
						'id'                => $id,
						'type'              => $type,
						'name'              => $name,
						'label_for'         => $label_for,
						'desc'              => $description,
						'section'           => $section,
						'size'              => $size,
						'options'           => $options,
						'std'               => $default,
						'placeholder'       => $placeholder,
						'sanitize_callback' => $sanitize_callback,

					);

					/**
					 * Add a new field to a section of a settings page.
					 *
					 * @param string   $id
					 * @param string   $title
					 * @param callable $callback
					 * @param string   $page
					 * @param string   $section = 'default'
					 * @param array    $args = array()
					 * @since 1.0.0
					 */

					// @param string 	$id
					$field_id = $section . '[' . $field['id'] . ']';
					add_settings_field(
						$field_id,
						$name,
						array( $this, 'create_' . $type ),
						$section,
						$section,
						$args
					);

				}

			}
		}
	}

	/**
	 * Displays a title field for a settings field
	 *
	 * @param array $args settings field args
	 */
	function create_title( $args ) {
		$value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
		if ( '' !== $args['name'] ) {
			$name = $args['name'];
		} else {
		};
		$type = isset( $args['type'] ) ? $args['type'] : 'title';

		$html = '';
		echo $html;
	}


	/**
	 * Displays a text field for a settings field
	 *
	 * @param array $args settings field args
	 */
	function create_text( $args ) {

		$value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
		$size = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
		$type = isset( $args['type'] ) ? $args['type'] : 'text';
		$html = <<< MSNTEXT
				<input type="{$type}" class="{$size}-text" 
				id="{$args['section']}[{$args['id']}]"  
				name="{$args['section']}[{$args['id']}]" value="{$value}" 
				placeholder="{$args['placeholder']}" />
		MSNTEXT;

		//$html  = sprintf( '<input type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[%4$s]" value="%5$s" placeholder="%6$s"/>', $type, $size, $args['section'], $args['id'], $value, $args['placeholder'] );
		$html .= $this->get_field_description( $args );

		echo $html;
	}

	/**
	 * Displays a number field for a settings field
	 *
	 * @param array $args settings field args
	 */
	function create_number( $args ) {
		$this->create_text( $args );
	}

	/**
	 * Displays a password field for a settings field
	 *
	 * @param array $args settings field args
	 */
	function create_password( $args ) {

		$value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
		$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

		$html = <<< MSNPASS
					<input type="password" class="{$size}-text" 
					id="{$args['section']}[{$args['id']}]" 
					name="{$args['section']}[{$args['id']}]" value="{$value}"/>
		MSNPASS;
		//$html  = sprintf( '<input type="password" class="%1$s-text" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s"/>', $size, $args['section'], $args['id'], $value );
		$html .= $this->get_field_description( $args );

		echo $html;
	}

	/**
	 * Displays a textarea for a settings field
	 *
	 * @param array $args settings field args
	 */
	function create_textarea( $args ) {

		$value = esc_textarea( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
		$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

		$html = <<< MSNTEXTAREA
					<textarea rows="5" cols="55" class="{$size}-text" id="{$args['section']}[{$args['id']}]" name="{$args['section']}[{$args['id']}]">$value</textarea>		
		MSNTEXTAREA;
		//$html  = sprintf( '<textarea rows="5" cols="55" class="%1$s-text" id="%2$s[%3$s]" name="%2$s[%3$s]">%4$s</textarea>', $size, $args['section'], $args['id'], $value );
		$html .= $this->get_field_description( $args );

		echo $html;
	}

	/**
	 * Displays a separator field for a settings field
	 *
	 * @param array $args settings field args
	 */
	function create_separator( $args ) {
		$type = isset( $args['type'] ) ? $args['type'] : 'separator';

		$html  = '';
		$html .= '<div class="msn-settings-separator"></div>';
		echo $html;
	}

	/**
	 * Displays a checkbox for a settings field
	 *
	 * @param array $args settings field args
	 */
	function create_checkbox( $args ) {

		$value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
		//TODO: change prefix for id and for in input and label tag (now it is wposa, it must be the same with name)
/*		$html  = '<fieldset>';
		$html .= sprintf( '<label for="wposa-%1$s[%2$s]">', $args['section'], $args['id'] );
		$html .= sprintf( '<input type="hidden" name="%1$s[%2$s]" value="off" />', $args['section'], $args['id'] );
		$html .= sprintf( '<input type="checkbox" class="checkbox" id="wposa-%1$s[%2$s]" name="%1$s[%2$s]" value="on" %3$s />', $args['section'], $args['id'], checked( $value, 'on', false ) );
		$html .= sprintf( '%1$s</label>', $args['desc'] );
		$html .= '</fieldset>';*/
		$checked_variable = checked( $value, 'on', false );
		$html = <<< MSNCHECKBOX
				<fieldset>
					<label for="msnsmp-{$args['section']}[{$args['id']}]">
						<input type="hidden" name="{$args['section']}[{$args['id']}]" value="off" />
						<input type="checkbox" class="checkbox" id="msnsmp-{$args['section']}[{$args['id']}]" name="{$args['section']}[{$args['id']}]" value="on" {$checked_variable} />
						{$args['desc']}
					</label>
				</fieldset>
		MSNCHECKBOX;
		echo $html;
	}

	/**
	 * Displays a radio button for a settings field
	 *
	 * @param $args
	 */
	function create_radio( $args ) {

		$value = $this->get_option( $args['id'], $args['section'], $args['std'] );

		$html = '<fieldset>';
		foreach ( $args['options'] as $key => $label ) {
			$html .= sprintf( '<label for="msnsmp-%1$s[%2$s][%3$s]">', $args['section'], $args['id'], $key );
			$html .= sprintf( '<input type="radio" class="radio" id="msnsmp-%1$s[%2$s][%3$s]" name="%1$s[%2$s]" value="%3$s" %4$s />', $args['section'], $args['id'], $key, checked( $value, $key, false ) );
			$html .= sprintf( '%1$s</label><br>', $label );
		}
		$html .= $this->get_field_description( $args );
		$html .= '</fieldset>';

		echo $html;
	}

	/**
	 * Displays a multicheckbox a settings field
	 *
	 * @param array $args settings field args
	 */
	function create_multicheck( $args ) {

		$value = $this->get_option( $args['id'], $args['section'], $args['std'] );

		$html = '<fieldset>';
		foreach ( $args['options'] as $key => $label ) {
			$checked = isset( $value[ $key ] ) ? $value[ $key ] : '0';
			$html    .= sprintf( '<label for="msnsmp-%1$s[%2$s][%3$s]">', $args['section'], $args['id'], $key );
			$html    .= sprintf( '<input type="checkbox" class="checkbox" id="msnsmp-%1$s[%2$s][%3$s]" name="%1$s[%2$s][%3$s]" value="%3$s" %4$s />',
				$args['section'], $args['id'], $key, checked( $checked, $key, false ) );
			$html    .= sprintf( '%1$s</label><br>', $label );
		}
		$html .= $this->get_field_description( $args );
		$html .= '</fieldset>';

		echo $html;
	}

	/**
	 * Displays an image upload field with a preview
	 *
	 * @param array $args settings field args.
	 */
	function create_image( $args ) {

		$value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
		$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
		$id    = $args['section'] . '[' . $args['id'] . ']';
		$label = isset( $args['options']['button_label'] ) ?
			$args['options']['button_label'] :
			__( 'Choose Image' );
		$field_description = $this->get_field_description( $args );
		$html = <<< MSNIMAGE
				<input type="text" class="{$size}-text msnsmp-url" id="{$args['section']}[{$args['id']}]" name="{$args['section']}[{$args['id']}]" value="{$value}"/>
				<input type="button" class="button msnsmp-browse" value="{$label}" />
				{$field_description}
				<p class="msnsmp-image-preview"><img src=""/></p>
		MSNIMAGE;

		echo $html;
	}

	/**
	 * Displays a file upload field for a settings field
	 *
	 * @param array $args settings field args.
	 */
	function create_file( $args ) {

		$value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
		$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
		$id    = $args['section'] . '[' . $args['id'] . ']';
		$label = isset( $args['options']['button_label'] ) ?
			$args['options']['button_label'] :
			__( 'Choose File' );
		$field_description = $this->get_field_description( $args );
		$html = <<< MSNFILE
				<input type="text" class="{$size}-text msnsmp-url" id="{$args['section']}[{$args['id']}]" name="{$args['section']}[{$args['id']}]" value="{$value}"/>
				<input type="button" class="button msnsmp-browse" value="{$label}" />	
				{$field_description}
		MSNFILE;

		echo $html;
	}

	/**
	 * Displays a color picker field for a settings field
	 *
	 * @param array $args settings field args
	 */
	function create_color( $args ) {

		$value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
		$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
		$field_description = $this->get_field_description( $args );

		$html = <<< MSNCOLOR
				<input type="text" class="{$size}-text color-picker" id="{$args['section']}[{$args['id']}]" name="{$args['section']}[{$args['id']}]" value="{$value}" data-default-color="{$args['std']}" placeholder="{$args['placeholder']}" />
				{$field_description}
		MSNCOLOR;

		echo $html;
	}

	/**
	 * Displays a rich text textarea for a settings field
	 *
	 * @param array $args settings field args.
	 */
	function create_wysiwyg( $args ) {

		$value = $this->get_option( $args['id'], $args['section'], $args['std'] );
		$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : '500px';

		echo '<div style="max-width: ' . $size . ';">';

		$editor_settings = array(
			'teeny'         => true,
			'textarea_name' => $args['section'] . '[' . $args['id'] . ']',
			'textarea_rows' => 10,
		);
		if ( isset( $args['options'] ) && is_array( $args['options'] ) ) {
			$editor_settings = array_merge( $editor_settings, $args['options'] );
		}

		wp_editor( $value, $args['section'] . '-' . $args['id'], $editor_settings );

		echo '</div>';

		echo $this->get_field_description( $args );
	}



	/**
	 * Get the value of a settings field
	 *
	 * @param string $option  settings field name.
	 * @param string $section the section name this field belongs to.
	 * @param string $default default text if it's not found.
	 * @return string
	 */
	public function get_option( $option, $section, $default = '' ) {
		$options = (array) get_option( $section );
		if ( isset( $options[ $option ] ) ) {
			return $options[ $option ];
		}
		return $default;
	}


	/**
	 * Get field description for display
	 *
	 * @param array $args settings field args
	 */
	public function get_field_description( $args ) {
		if ( ! empty( $args['desc'] ) ) {
			$desc = <<< MSNDESC
					<p class="description">{$args['desc']}</p>
			MSNDESC;
			//$desc = sprintf( '<p class="description">%s</p>', $args['desc'] );
		} else {
			$desc = '';
		}

		return $desc;
	}

	/**
	 * sanitize_setting_fields method.
	 * A callback function that sanitizes the option's value.
	 *
	 * @access public
	 *
	 */
	public function sanitize_setting_fields( $fields ) {
		$results = [];
		foreach ( $fields as $field_slug => $field_value ) {
			$sanitize_callback_and_errors = $this->get_sanitize_callback( $field_slug );
			// If callback is set, call it.
			if ( $sanitize_callback_and_errors['sanitize_callback'] ) {
				$results[ $field_slug ] = call_user_func( array( $this, $sanitize_callback_and_errors['sanitize_callback'] ), $field_value );

				if ( $results[ $field_slug ] != $field_value ) {
					$temp_setting_error_args =[];
					if ( $sanitize_callback_and_errors['has_unique_error'] ) {
						$temp_setting_error_args = $sanitize_callback_and_errors['error_args'];
					} else {
						$temp_setting_error_args['settings'] = 'plugin_name_prefix_'.$field_slug.'_error';
						$temp_setting_error_args['code'] = 'plugin_name_prefix_'.$field_slug.'_error_id';
						$temp_setting_error_args['message'] = __( 'Some values that you entered, were not valid. So they were sanitized and then save into database', PLUGIN_NAME_TEXTDOMAIN );
						$temp_setting_error_args['type'] = 'warning';
					}
					add_settings_error(
						$temp_setting_error_args['settings'],
						$temp_setting_error_args['code'],
						$temp_setting_error_args['message'],
						$temp_setting_error_args['type']
					);
				}
				continue;
			} else {
				$results[ $field_slug ] = $field_value;
			}
		}

		return $results;
	}

	public function show_general_error( $args ) {
		add_settings_error(
			$args['settings'],
			$args['code'],
			$args['message'],
			$args['type'],
		);
	}

	/**
	 * General method to sanitize text fields
	 * @param string $field_value A field value which needs to sanitize
	 *
	 * @return string
	 */
	public function sanitize_general_text_field( $field_value ) {
		$result = sanitize_text_field($field_value);

		return $result;
	}

	/**
	 * General method to sanitize textarea fields
	 * @param string $field_value  A field value  which needs to sanitize
	 *
	 * @return string
	 */
	public function sanitize_general_textarea_field( $field_value ) {
		$result =  sanitize_textarea_field( $field_value );
		return $result;
	}

	/**
	 * Get sanitization callback for given option slug
	 *
	 * @param string $slug option slug.
	 * @return mixed string | bool false
	 * @since  1.0.0
	 */
	function get_sanitize_callback( $slug = '' ) {
		$result = [];
		if ( empty( $slug ) ) {
			return false;
		}
		// Iterate over registered fields and see if we can find proper callback.
		foreach ( $this->settings_fields as $section => $field_array ) {
			foreach ( $field_array as $field ) {
				if ( $field['id'] == $slug ) {
					$result['sanitize_callback'] = $field['sanitize_callback'];
					$result['has_unique_error'] = $field['has_unique_error'];
					$result['error_args'] = $field['error_args'];
					return $result;
				}
			}
		}

		return false;
	}

	function get_error_callback( $slug = '' ) {
		$result = [];
		if ( empty( $slug ) ) {
			return false;
		}
		// Iterate over registered fields and see if we can find proper callback.
		foreach ( $this->settings_fields as $section => $field_array ) {
			foreach ( $field_array as $field ) {
				if ( $field['id'] == $slug ) {
					$result['error_callback'] = $field['error_callback'];
					$result['error_args'] = $field['error_args'];
					return $result;
				}
			}
		}
		return false;
	}



	/**
	 * Method to create admin menu to show sections and related fields in setting page
	 *
	 * @access public
	 */
	abstract public function add_admin_menu();


}
