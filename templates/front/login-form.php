<?php

use Plugin_Name_Dir\Includes\Functions\Utility;

/*get header*/
Utility::load_template('header.head', array(), 'front');
Utility::load_template('header.extra', array(), 'front');

?>


    <!--Header Section-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <figure>
                        <img class="img-responsive center-block"
                             src="<?php echo MSNSP_IMG . 'ayande-roshan-logo-1.png' ?>" alt="لوگو آینده روشن">
                    </figure>
                </div>
                <div class="col-md-12">
                    <h2 class="text-center msn-color-white">انجمن آینده روشن</h2>
                </div>
                <div class="col-md-12">
                    <h3 class="text-center msn-color-white">" نخبگان "</h3>
                </div>
            </div>

        </div>
    </header>

    <!--Message Section-->
    <div class="container">
        <div class="row ">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="msn-bg-white msn-height-50 msn-padding-20 msn-margin-bottom-20 msn-border-radius-10">
                    <h3 class="text-center">حامی گرامی، به صفحه حامیان انجمن آینده روشن خوش آمدید: </h3>
                    <p class="text-justify">در صورتی که قبلا عضو شده اید، با کلمه کاربری و کلمه عبور حساب کاربری خود وارد شوید. در صورتیکه عضو جدید هست، ابتدا ثبت نام کنید.</p>
                    <p class="text-center"><a href="<?php echo Utility::create_url('/supporter/register')?>">لینک ثبت نام کاربر جدید</a></p>
                    <?php if ($sendErrorMessage['access-issue']): ?>
                        <div class="msn-padding-20 msn-padding-bottom-0 msn-error-message">
                            <p class="text-center">برای رفع مشکل با مسئول سایت تماس بگیرید:</p>
                            <?php foreach ($sendErrorMessage['errorMessage'] as $type => $value): ?>
                                <p class="text-center"><?php echo $value; ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    <!--Primary  Section-->
    <main>
        <div class="container">
            <div>This is sample for /url1/url2</div>
            <div><?php var_dump( $user_Id_Requester ); ?></div>
        </div>
    </main>

<?php

/*get footer*/
Utility::load_template('footer.footer', array(), 'front');

?>