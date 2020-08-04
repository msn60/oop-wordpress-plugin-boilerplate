<script>
    jQuery(document).ready(function ($) {

        //Initiate Color Picker.
        $('.color-picker').iris();

        // Switches option sections
        $('.group').hide();
        var activetab = '';
        if ('undefined' != typeof localStorage) {
            activetab = localStorage.getItem('activetab');
        }
        if ('' != activetab && $(activetab).length) {
            $(activetab).fadeIn();
        } else {
            $('.group:first').fadeIn();
        }
        $('.group .collapsed').each(function () {
            $(this)
                .find('input:checked')
                .parent()
                .parent()
                .parent()
                .nextAll()
                .each(function () {
                    if ($(this).hasClass('last')) {
                        $(this).removeClass('hidden');
                        return false;
                    }
                    $(this)
                        .filter('.hidden')
                        .removeClass('hidden');
                });
        });

        if ('' != activetab && $(activetab + '-tab').length) {
            $(activetab + '-tab').addClass('nav-tab-active');
        } else {
            $('.nav-tab-wrapper a:first').addClass('nav-tab-active');
        }
        $('.nav-tab-wrapper a').click(function (evt) {
            $('.nav-tab-wrapper a').removeClass('nav-tab-active');
            $(this)
                .addClass('nav-tab-active')
                .blur();
            var clicked_group = $(this).attr('href');
            if ('undefined' != typeof localStorage) {
                localStorage.setItem('activetab', $(this).attr('href'));
            }
            $('.group').hide();
            $(clicked_group).fadeIn();
            evt.preventDefault();
        });


    });

</script>

<style type="text/css">
    /** WordPress 3.8 Fix **/
    .form-table th {
        padding: 20px 10px;
    }

    #wpbody-content .metabox-holder {
        padding-top: 5px;
    }

    .wpsa-image-preview img {
        height: auto;
        max-width: 70px;
    }

    .wpsa-settings-separator {
        background: #ccc;
        border: 0;
        color: #ccc;
        height: 1px;
        position: absolute;
        left: 0;
        width: 99%;
    }

    .group .form-table input.color-picker {
        max-width: 100px;
    }
</style>

<div class="wrap">
    <h1>WP OOP Settings API <span style="font-size:50%;">MSN GHOLAM</span></h1>
    <div class="wrap">
		<?php
		$html = '<h2 class="nav-tab-wrapper">';

		foreach ( $params as $tab ) {
			$html .= sprintf( '<a href="#%1$s" class="nav-tab" id="%1$s-tab">%2$s</a>', $tab['id'], $tab['header_title'] );
		}

		$html .= '</h2>';

		echo $html;
		?>


        <div class="metabox-holder">
			<?php foreach ( $params as $form ) { ?>
                <!-- style="display: none;" -->
                <div id="<?php echo $form['id']; ?>" class="group">
                    <form method="post" action="options.php">
						<?php
						settings_fields( $form['id'] );
						do_settings_sections( $form['id'] );
						submit_button( 'Save Changes', 'primary' );
						?>
                    </form>
                </div>
			<?php } ?>
        </div>
    </div>

