<?php
require_once "../includes/initialize.php";

if(isset($_POST['login'])){
    array_filter($_POST,'trim_value');
    $login = login();
    if(array_shift($login)===TRUE){
        redirect_to('user/index.php');
    } else $message = array_shift($login);
}
if(isset($_GET['exp'])){
    $message = "Please log in again!";
}

$title = "Login";
$keywords = "login,hammerdroid,android,application,roof,ceiling,calculator";
$description = "Hammerdroid is the world first android based roof calculator with built in cloud storage for your calculations.";
render('user_header', 'login');
render('user_nav', 'login');
?>
<?= isset($message) ? output_user_message($message) : null; ?>

<div class="fadeInDownstat">
    <img src="images/user-logo.png" width="100" height="100">
</div>

<div class="fadeInUpstat">
    <i>HammerDroid</i>
</div>


<div id="form">
    <form action="login.php" method="post" onsubmit="return validateForm();">

        <div class="register">
            <h2><span><i>Login Page</i></span></h2>

            <div id="formposition">
                <label for="username" class="hvr-sweep-to-right"><span><i>Username:</i></span></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="username" id="username"><br/><br/>
                <label for="password" class="hvr-sweep-to-right"><span><i>Password:</i></span></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="password" name="password" id="password"><br/><br/>
            </div>
            <input style="background:green;border: hidden;color: snow;font-size: 20px; border-radius: 10px;"
                   type="submit" value="Enter" name="login"/>
        </div>

    </form>
</div>
<div id="undo1" class="hvr-bob"><a href="index.php"> <img src="images/undo.png" </a></div>

<?php require_once "layouts/user_footer.php"; ?>
