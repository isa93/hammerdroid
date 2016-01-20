<?php
require_once "../../includes/initialize.php";
check_login(false);

$title = "Home";
$keywords = "home,hammerdroid,android,application,roof,ceiling,calculator";
$description = "Hammerdroid is the world first android based roof calculator with built in cloud storage for your calculations.";
render('user_header', 'home');
render('user_nav', 'home');
?>
<?= isset($message) ? output_user_message($message) : null; ?>


<?php require_once "../layouts/user_footer.php"; ?>
