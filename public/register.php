<?php
require_once "../includes/initialize.php";

if (isset($_POST['register'])) {
    $_POST = array_filter($_POST, 'trim_value');
    $check = add_user();
    if (array_shift($check) === TRUE) {
        redirect_to('login.php');
    } else $message = array_shift($check);
}

$title = "Registration";
$keywords = "register,hammerdroid,android,application,roof,ceiling,calculator";
$description = "Hammerdroid is the world first android based roof calculator with built in cloud storage for your calculations.";
render('user_header', 'register');
render('user_nav', 'register');
?>
<?= isset($message) ? output_user_message($message) : null; ?>

<div class="fadeInDownstat">
    <img src="images/user-logo.png" width="100" height="100">
</div>

<div class="fadeInUpstat">
    <i>HammerDroid</i>
</div>


<div id="form">
    <form action="register.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">

        <div class="register">
            <h2><span><i>Registration Page</i></span></h2>

            <div id="formposition">
                <label for="first_name" class="hvr-sweep-to-right">
                    <span><i>First name:</i></span>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="first_name" id="first_name" onfocus="blue(this)" onblur="red(this)"
                       class="mytext" value="<?= isset($_POST['register']) ? $_POST['first_name'] : null ?>"/> <br/>
                <br/>
                <label for="last_name" class="hvr-sweep-to-right">
                    <span><i>Last name:</i></span>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="last_name" id="last_name" onfocus="blue(this)" onblur="red(this)"
                       class="mytext" value="<?= isset($_POST['register']) ? $_POST['last_name'] : null ?>"/> <br/>
                <br/>
                <label for="email" class="hvr-sweep-to-right">
                    <span><i>E-mail:</i></span>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="email" id="email" onfocus="blue(this)" onblur="red(this)"
                       class="mytext" value="<?= isset($_POST['register']) ? $_POST['email'] : null ?>"/><br/>
                <br/>
                <label for="country" class="hvr-sweep-to-right">
                    <span><i>Country:</i></span>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select name="country" id="country" style="width:147px;">
                    <option value="" <?= !isset($_POST['register']) ? 'selected' : null ?>>Choose</option>
                    <?php
                    foreach ($WORLD_COUNTRIES as $country)
                        echo isset($_POST['country']) && $_POST['country'] == $country ?
                            "<option value=\"" . htmlentities($country, ENT_QUOTES) . "\" selected>" . htmlentities($country) . "</option>\n" :
                            "<option value=\"" . htmlentities($country, ENT_QUOTES) . "\">" . htmlentities($country) . "</option>\n"
                    ?>
                </select>
                <br/>

                <label class="hvr-sweep-to-right">
                    <span><i>Birth date:</i></span>
                </label>

                <br/>
                <label for="year" class="hvr-sweep-to-right">
                    <i>Year:</i>
                </label>
                <select id="year" name="year" class="mytext">
                    <option value="" <?= !isset($_POST['register']) ? 'selected' : null; ?>>Choose</option>
                    <?php
                    for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                        echo isset($_POST['year']) && $_POST['year'] == $i ?
                            "<option value=\"{$i}\" selected>{$i}</option>" :
                            "<option value=\"{$i}\">{$i}</option>";
                    ?>
                </select>
                <label for="month" class="hvr-sweep-to-right">
                    <i>Month:</i>
                </label>
                <select id="month" name="month">
                    <option value="" <?= !isset($_POST['register']) ? 'selected' : null; ?>>Choose</option>
                    <?php
                    for ($i = 1; $i <= 12; $i++)
                        echo isset($_POST['month']) && $_POST['month'] == $i ?
                            "<option value=\"{$i}\" selected>{$MONTHS[$i]}</option>" :
                            "<option value=\"{$i}\">{$MONTHS[$i]}</option>";
                    ?>
                </select>
                <label for="day" class="hvr-sweep-to-right"
                    ><i>Day:</i>
                </label>
                <select id="day" name="day">
                    <option value="" <?= !isset($_POST['register']) ? 'selected' : null; ?>>Choose</option>
                    <?php
                    for ($i = 1; $i <= 31; $i++)
                        echo isset($_POST['day']) && $_POST['day'] == $i ?
                            "<option value=\"{$i}\" selected>{$i}</option>" :
                            "<option value=\"{$i}\">{$i}</option>";
                    ?>
                </select>

                <br/>
                <br />
                <label class="hvr-sweep-to-right">
                    <i>Picture:</i>
                </label><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $MAX_FILE_SIZE ?>">
                <input type="file" name="image" class="upload">
                <br/>
                <br/>
                <label for="username" class="hvr-sweep-to-right">
                    <span><i>Username:</i></span>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="username" id="username" onfocus="blue(this)" onblur="red(this)"
                       class="mytext" value="<?= isset($_POST['register']) ? $_POST['password'] : null ?>"/><br/><br/>
                <label for="password" class="hvr-sweep-to-right">
                    <span><i>Password:</i></span>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="password" name="password" id="password" onfocus="blue(this)" onblur="red(this)"
                       class="mytext"/><br /><br />
                <label for="re_password" class="hvr-sweep-to-right">
                    <span><i>Retype password:</i></span>
                </label>
                <input type="password" name="re_password" id="re_password" onfocus="blue(this)" onblur="red(this)"
                       class="mytext"/>
                <br/>
                <br/>

            </div>

            <input style="background:green; border: hidden;color: snow;font-size: 20px; border-radius: 10px;"
                   type="submit" value="Register" name="register"/>
        </div>
    </form>

</div>

<div id="undo" class="hvr-bob"><a href="index.php"><img src="images/undo.png"> </a></div>

<?php require_once "layouts/user_footer.php"; ?>