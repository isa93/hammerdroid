<?php
require_once "../../includes/initialize.php";
check_login();
check_superuser();

if (isset($_POST['register'])) {
    array_filter($_POST, 'trim_value');
    $check = add_user();
    if (array_shift($check) === TRUE) {
        redirect_to('list_admin.php');
    } else $message = array_shift($check);
}


?>
<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav', 'add_admin'); ?>

    <section>
        <div class="section">

            <div class="divider"></div>
            <div class="row page-title" style="margin: 10px 10px">
                <div class="col s12 m6 l5">
                    <a class="breadcrumb" href="list_admin.php"><i
                            class="material-icons left small">android</i>Admin</a>
                    <a class="breadcrumb" href="add_admin.php">&gt; Add</a>
                </div>
                <div class="col s12 m6 l7">
                    <?= isset($message) ? output_message($message) : null; ?>
                </div>
            </div>
            <div class="divider"></div>


            <div class="row container">

                <form action="add_admin.php" method="post" enctype="multipart/form-data">

                    <div class="col s12 m5">
                        <div class="card" style="overflow: visible">
                            <div class="card-image">
                                <img class="preview materialboxed"
                                     src="../images/user/default.jpg"
                                     alt="User profile image">
                            </div>
                            <div class="card-action">
                                <div
                                    class="file-upload right btn-floating btn-large waves-effect waves-light blue accent-3 ">
                                    <i class="material-icons">loop</i>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="<?= $MAX_FILE_SIZE ?>">
                                    <input type="file" name="image" class="upload">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m7">
                        <div class="card" style="overflow: visible">

                            <div class="row">
                                <div class="col s10 offset-s1 l8 offset-l2">

                                    <div class="input-field">
                                        <input type="text" id="first_name" name="first_name"
                                               length="<?= get_maxLength('users', 'first_name') ?>"
                                               value="<?= isset($_POST['register']) ? $_POST['first_name'] : null ?>">
                                        <label for="first_name">First name</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="last_name" name="last_name"
                                               length="<?= get_maxLength('users', 'last_name') ?>"
                                               value="<?= isset($_POST['register']) ? $_POST['last_name'] : null ?>">
                                        <label for="last_name">Last name</label>
                                    </div>

                                    <div class="input-field country">
                                        <select name="country" id="country">
                                            <option value="" <?= !isset($_POST['register']) ? 'selected' : null; ?>>Choose</option>
                                            <?php
                                            foreach ($WORLD_COUNTRIES as $country)
                                                echo isset($_POST['country']) && $_POST['country'] == $country ?
                                                    "<option value=\"" . htmlentities($country, ENT_QUOTES) . "\" selected>" . htmlentities($country) . "</option>\n" :
                                                    "<option value=\"" . htmlentities($country, ENT_QUOTES) . "\">" . htmlentities($country) . "</option>\n";
                                            ?>
                                        </select>
                                        <label for="country">Country</label>
                                    </div>

                                    <div class="row">


                                        <div class="input-field col s4">
                                            <select id="year" name="year">
                                                <option value="" <?= !isset($_POST['register']) ? 'selected' : null; ?>>Choose</option>
                                                <?php
                                                for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                                    echo isset($_POST['year']) && $_POST['year'] == $i ?
                                                        "<option value=\"{$i}\" selected>{$i}</option>" :
                                                        "<option value=\"{$i}\">{$i}</option>";
                                                ?>
                                            </select>
                                            <label for="year">Year</label>
                                        </div>
                                        <div class="input-field col s4">
                                            <select id="month" name="month">
                                                <option value="" <?= !isset($_POST['register']) ? 'selected' : null; ?>>Choose</option>
                                                <?php
                                                for ($i = 1; $i <= 12; $i++)
                                                    echo isset($_POST['month']) && $_POST['month'] == $i ?
                                                        "<option value=\"{$i}\" selected>{$i}</option>" :
                                                        "<option value=\"{$i}\">{$i}</option>";
                                                ?>
                                            </select>
                                            <label for="month">Month</label>
                                        </div>
                                        <div class="input-field col s4">
                                            <select id="day" name="day">
                                                <option value="" <?= !isset($_POST['register']) ? 'selected' : null; ?>>Choose</option>
                                                <?php
                                                for ($i = 1; $i <= 31; $i++)
                                                    echo isset($_POST['day']) && $_POST['day'] == $i ?
                                                        "<option value=\"{$i}\" selected>{$i}</option>" :
                                                        "<option value=\"{$i}\">{$i}</option>";
                                                ?>
                                            </select>
                                            <label for="day">Day</label>
                                        </div>

                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="username" name="username"
                                               length="<?= get_maxLength('users', 'username') ?>"
                                               value="<?= isset($_POST['register']) ? $_POST['username'] : null ?>">
                                        <label for="username">Username (optional)</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="email" id="email" name="email" class="validate"
                                               length="<?= get_maxLength('users', 'email') ?>"
                                               value="<?= isset($_POST['register']) ? $_POST['email'] : null ?>">
                                        <label for="email">E-mail</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="password" id="password" name="password">
                                        <label for="password">Password</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="password" id="re_password" name="re_password">
                                        <label for="re_password">Retype password</label>
                                    </div>

                                    <div class="col s8 offset-s2 m10 offset-m1 " style="padding: 20px">
                                        <button type="submit" name="register"
                                                class="left btn-floating btn-large teal waves-effect waves-light"><i
                                                class="material-icons">done</i></button>
                                        <button type="reset" name="reset_default"
                                                class="right btn-floating btn-large orange waves-effect waves-light"><i
                                                class="material-icons">restore</i></button>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>

                </form>
            </div>

        </div>
        <!-- /.section -->
    </section>

<?php require_once "../layouts/admin_footer.php"; ?>