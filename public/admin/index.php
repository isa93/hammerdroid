<?php
require_once "../../includes/initialize.php";
check_login();
//$message = "Szia :D\nHogyan vagyol breate?\nKi kell probalnnom h milyen mikor hoszabb:D\n";
?>
<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav','dashboard'); ?>

<section>
    <div class="section">

        <div class="divider"></div>
            <div class="row page-title" style="margin: 10px 10px">
                <div class="col s12 m6 l5">
                    <a class="breadcrumb" href="index.php"><i class="material-icons left small">dashboard</i>Dashboard</a>
                </div>
                <div class="col s12 m6 l7">
                    <?= isset($message) ? output_message($message) : null; ?>
                </div>
            </div>
        <div class="divider"></div>

        <div class="row container">

            <div class="col s12">
                <div class="slider">
                    <ul class="slides z-depth-1-half">
                        <li>
                            <img src="../images/slider-1.jpg" alt="Slider image 1">
                        </li>
                        <li>
                            <img src="../images/slider-2.jpg" alt="Slider image 2">
                        </li>
                        <li>
                            <img src="../images/slider-3.jpg" alt="Slider image 3">
                        </li>
                        <li>
                            <img src="../images/slider-4.jpg" alt="Slider image 4">
                        </li>
                    </ul>
                </div><!--/slider -->
            </div>

            <div class="col s12">

            </div>



        </div>

    </div><!-- /.section -->
</section>

<?php require_once "../layouts/admin_footer.php"; ?>