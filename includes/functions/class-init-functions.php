<?php

namespace Plugin_Name_Dir\Includes\Functions;
class Init_Functions {

	/*Check output buffer*/
	public function app_output_buffer() {
		ob_start();
	}

	/*
	 * Good sample to do that: https://alka-web.com/blog/how-to-restrict-access-to-wordpress-dashboard-programmatically/
	*/
	/*Check to avoid access of supporter to admin panel*/


	public function not_access_to_wp_admin_panel() {
		if ( is_admin() && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) && ( current_user_can( 'msnsp_supporter_cap' ) ) ) {
			wp_redirect( home_url() );
			exit;
		}
	}

	public function not_access_to_wp_admin_panel_for_list() {

		//Check if the current page is an admin page
		// && and ensure that this is not an ajax call
		if ( is_admin() && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {

			//Get all capabilities of the current user
			$user = get_userdata( get_current_user_id() );
			$caps = ( is_object( $user ) ) ? array_keys( $user->allcaps ) : array();

			//All capabilities/roles listed here are not able to see the dashboard
			$block_access_to = array( 'subscriber', 'contributor', 'my-custom-role', 'my-custom-capability' );

			if ( array_intersect( $block_access_to, $caps ) ) {
				wp_redirect( home_url() );
				exit;
			}
		}
	}

	public function remove_admin_bar() {
		if ( current_user_can( 'msnsp_supporter_cap' ) ) {
			show_admin_bar( false );
		}
	}

}