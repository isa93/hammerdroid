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

            <div class="col s12" style="margin: 25px 0 0 0">
                <div class="row">
                    <div class="col s10 offset-s1 m5 l5">

                        <ul class="user-widget collapsible" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header" style="cursor: default">
                                    <h5 class="truncate" style="color:#38ab4c;text-shadow: 0 1px 1px #2e7f3f"><i class="fa fa-user" style="position:relative;bottom:10px"></i>Recent clients</h5>
                                </div>
                            </li>
                            <li class="user-widget-item" style="text-align: center">
                                <div class="collapsible-header avatar" style="color:#38ab4c;text-shadow: 0 1px 1px #2e7f3f">
                                    <div class="preloader-wrapper small active" style="margin-top: 15px">
                                        <div class="spinner-layer spinner-green-only">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div><div class="gap-patch">
                                                <div class="circle"></div>
                                            </div><div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div class="col s10 offset-s1 m5 offset-m2 l5 offset-l2">

                        <ul class="admin-widget collapsible" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header" style="cursor: default">
                                    <h5 class="blue-text accent-3 truncate" style="text-shadow: 0 1px 1px #216ec8"><i class="material-icons" style="position: relative;bottom: 10px">android</i>Recent admins</h5>
                                </div>
                            </li>
                            <li class="user-widget-item" style="text-align: center">
                                <div class="collapsible-header avatar" style="color:#38ab4c;text-shadow: 0 1px 1px #2e7f3f">
                                    <div class="preloader-wrapper small active" style="margin-top: 15px">
                                        <div class="spinner-layer spinner-blue-only">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div><div class="gap-patch">
                                                <div class="circle"></div>
                                            </div><div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>



        </div>

    </div><!-- /.section -->
</section>

<?php $widgets = true; require_once "../layouts/admin_footer.php"; ?>