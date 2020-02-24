<?php

use Plugin_Name_Name_Space\Includes\Functions\Utility;

/*get header*/
Utility::load_template( 'header.head', array(), 'front' );
Utility::load_template( 'header.menu', array(), 'front' );


?>

    <!--Primary  Section-->
    <main>
        <div class="container">
            <h1 class="pluginprefix-blue pluginprefix-text-center">This is sample for second page</h1>
            <div class="pluginprefix-vardump-style">
                <h2>Now we want to get current user information in the following:</h2>
                <div>Hello, my name is <?php echo $sample_variable; ?></div>
            </div>
        </div>
    </main>

<?php

/*get footer*/
Utility::load_template( 'footer.footer', array(), 'front' );

?>