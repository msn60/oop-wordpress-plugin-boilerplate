<?php
/**
 * Meta_Box3 Class File
 *
 * Methods and settings which will need for meta box1
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Admin;

use Plugin_Name_Name_Space\Includes\Abstracts\Meta_box;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Meta_Box3.
 * Methods and settings which will need for meta box1
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Meta_Box3 extends Meta_box {

	/**
	 * Meta_box constructor.
	 * This constructor gets initial values to send to add_meta_box function to
	 * create admin menu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_meta_box  function.
	 */
	public function __construct( $initial_values ) {
		parent::__construct( $initial_values );
	}


	/**
	 * Render meta box 1.
	 *
	 * @access public
	 *
	 * @see    https://wpbrigade.com/what-is-wordpress-nonce-and-how-it-works/
	 *
	 * @param  object $post Current post.
	 */
	public function render_content( $post ) {

		// Add an nonce field so we can check for it later.
		wp_nonce_field( $this->action, $this->nonce_name );

		// Use get_post_meta to retrieve an existing value from the database.
		$value = get_post_meta( $post->ID, $this->meta_key, $this->single );


		// Display the form, using the current value.
		?>
        <label for="meta_box3_first_input">
			<?php _e( 'Description for Metabox 3', PLUGIN_NAME_TEXTDOMAIN ); ?>
        </label>
        <input type="text" id="meta_box3_first_input" name="meta_box3_first_input"
               value="<?php echo esc_attr( isset( $value ) && ! empty( $value ) ? $value : '' ); ?>" size="25"/>
		<?php
	}

	public function save_meta_box( $post_id ) {
		// Sanitize the user input.
		$meta_value = sanitize_text_field( $_POST['meta_box3_first_input'] );

		// Update the meta field.
		update_post_meta( $post_id, $this->meta_key, $meta_value );
	}

}
