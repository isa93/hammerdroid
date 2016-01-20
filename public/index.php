<?php
require_once "../includes/initialize.php";

$title = "Hammerdroid";
$keywords = "hammerdroid,android,application,roof,ceiling,calculator";
$description = "Hammerdroid is the world first android based roof calculator with built in cloud storage for your calculations.";
render('user_header', 'index');
render('user_nav', 'index');
?>

<div class="fadeInDownpos">
    <div class="fadeInDown">
        <img src="images/user-logo.png" width="100" height="100">
    </div>
</div>
<div class="fadeInUppos">
    <div class="animated fadeInUp">
        <i>HammerDroid</i>
    </div>
</div>


<?php require_once "layouts/user_footer.php"; ?>
