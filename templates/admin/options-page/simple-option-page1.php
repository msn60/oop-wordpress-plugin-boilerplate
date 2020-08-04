<div class="wrap">
	<h2>MSN plugin options page</h2>
	<form action="options.php" method="post">
		<?php
		settings_fields( 'plugin_name_option_group1' );
		do_settings_sections( 'plugin-name-menu-page-option-url' );
		submit_button( 'Save Changes', 'primary' );
		?>
	</form>
</div>