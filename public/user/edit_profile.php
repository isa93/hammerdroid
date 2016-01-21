<?php
require_once "../../includes/initialize.php";
check_login(false);

$title = "Edit profile";
$keywords = "edit,profile,hammerdroid,android,application,roof,ceiling,calculator";
$description = "Hammerdroid is the world first android based roof calculator with built in cloud storage for your calculations.";
render('user_header', 'edit_profile');
render('user_nav', 'edit_profile');
?>
<?= isset($message) ? output_user_message($message) : null; ?>

<!-- ide jon a html -->

<?php require_once "../layouts/user_footer.php"; ?>
