<?php
require_once "../../includes/initialize.php";

if(isset($_POST['login'])){
    array_filter($_POST,'trim_value');
    $login = login();
    if(array_shift($login)===TRUE){
        redirect_to('index.php');
    }else $message = array_shift($login);
}
if(isset($_GET['exp'])){
    $message = "Please log in again!";
}
?>
<?php require_once "../layouts/admin_header.php"; ?>

<div class="container">
    <div class="row ">
        <div class="col s12 m10 offset-m1 l6 offset-l3 valign-wrapper" id="login-wrapper">

            <div class="card login col s12">
                <form action="login.php" method="post" role="form">
                    <div class="col s8 right">
                        <?= isset($message) ? output_message($message) : null; ?>
                    </div>

                    <span class="card-title blue-text accent-2">Login</span>

                    <div class="card-content">

                        <div class="row">
                            <div class="input-field col s12 m10 offset-m1">
                                <input type="text" class="validate " id="username" name="username" value="<?= isset($_POST['login']) ? $_POST['username'] : null;?>">
                                <label for="username">Username or E-mail</label>
                            </div>
                            <div class="input-field col s12 m10 offset-m1">
                                <input type="password" class="validate" id="password" name="password">
                                <label for="password">Password</label>
                            </div>
                        </div>

                    </div>

                    <div class="card-action">
                        <button type="submit" name="login"
                                class="btn-floating btn-large waves-effect waves-light green z-depth-4">
                            <i class="material-icons">send</i></button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<?php require_once "../layouts/admin_footer.php"; ?>
