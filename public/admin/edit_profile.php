<?php
require_once "../../includes/initialize.php";
check_login();

if (isset($_POST['modify'])) {
    $_POST = array_filter($_POST, 'trim_value');
    $check = modify_user(true);
    if (array_shift($check) === TRUE) {
        redirect_to('profile.php');
    } else $message = array_shift($check);
}


?>
<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav', 'edit_profile'); ?>

    <section>
        <div class="section">

            <div class="divider"></div>
            <div class="row page-title" style="margin: 10px 10px">
                <div class="col s12 m6 l5">
                    <a class="breadcrumb" href="profile.php"><i
                            class="mdi-action-account-box left small" style="line-height: 30px"></i>Profile</a>
                    <a class="breadcrumb" href="edit_profile.php">&gt; Edit</a>
                </div>
                <div class="col s12 m6 l7">
                    <?= isset($message) ? output_message($message) : null; ?>
                </div>
            </div>
            <div class="divider"></div>


            <div class="row container">
                <?php $client = find_by_id('users', $_SESSION['user_id']); ?>
                <form action="edit_profile.php" method="post" enctype="multipart/form-data">

                    <div class="col s12 m5">
                        <div class="card" style="overflow: visible">
                            <div class="card-image">
                                <img class="preview materialboxed"
                                     src="../images/user/<?= get_image('users',$client['id']) ?>"
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
                                               value="<?= isset($_POST['modify']) ? $_POST['first_name'] : $client['first_name'] ?>">
                                        <label for="first_name">First name</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="last_name" name="last_name"
                                               length="<?= get_maxLength('users', 'last_name') ?>"
                                               value="<?= isset($_POST['modify']) ? $_POST['last_name'] : $client['last_name'] ?>">
                                        <label for="last_name">Last name</label>
                                    </div>

                                    <div class="input-field country">
                                        <select id="country" name="country">
                                            <option value="">Choose</option>
                                            <?php
                                            foreach ($WORLD_COUNTRIES as $country)
                                                echo isset($_POST['country']) && $_POST['country'] == htmlentities($country, ENT_QUOTES) || !isset($_POST['country']) && htmlentities($country, ENT_QUOTES) == $client['country'] ?
                                                    "<option value=\"" . htmlentities($country, ENT_QUOTES) . "\" selected>" . htmlentities($country) . "</option>\n" :
                                                    "<option value=\"" . htmlentities($country, ENT_QUOTES) . "\">" . htmlentities($country) . "</option>\n";
                                            ?>
                                        </select>
                                        <label for="country">Country</label>
                                    </div>

                                    <div class="row">

                                        <?php $birthday = explode("-", $client['birth_date']) ?>
                                        <div class="input-field col s4">
                                            <select id="year" name="year">
                                                <option value="">Choose</option>
                                                <?php
                                                for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                                    echo isset($_POST['year']) && $_POST['year'] == $i || !isset($_POST['year']) && $birthday[0] == $i ?
                                                        "<option value=\"{$i}\" selected>{$i}</option>" :
                                                        "<option value=\"{$i}\">{$i}</option>";
                                                ?>
                                            </select>
                                            <label for="year">Year</label>
                                        </div>
                                        <div class="input-field col s4">
                                            <select id="month" name="month">
                                                <option value="">Choose</option>
                                                <?php
                                                for ($i = 1; $i <= 12; $i++)
                                                    echo isset($_POST['month']) && $_POST['month'] == $i || !isset($_POST['month']) && $birthday[1] == $i ?
                                                        "<option value=\"{$i}\" selected>{$MONTHS[$i]}</option>" :
                                                        "<option value=\"{$i}\">{$MONTHS[$i]}</option>";
                                                ?>
                                            </select>
                                            <label for="month">Month</label>
                                        </div>
                                        <div class="input-field col s4">
                                            <select id="day" name="day">
                                                <option value="">Choose</option>
                                                <?php
                                                for ($i = 1; $i <= 31; $i++)
                                                    echo isset($_POST['day']) && $_POST['day'] == $i || !isset($_POST['day']) && $birthday[2] == $i ?
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
                                               value="<?= isset($_POST['register']) ? $_POST['username'] : $client['username'] ?>">
                                        <label for="username">Username (optional)</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="email" id="email" name="email" class="validate"
                                               length="<?= get_maxLength('users', 'email') ?>"
                                               value="<?= isset($_POST['register']) ? $_POST['email'] : $client['email'] ?>">
                                        <label for="email">E-mail</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="password" id="password" name="password">
                                        <label for="password">Password</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="password" id="new_password" name="new_password">
                                        <label for="new_password">New password</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="password" id="re_new_password" name="re_new_password"
                                               data-hint="Szia">
                                        <label for="re_new_password">Retype new password</label>
                                    </div>

                                    <div class="col s8 offset-s2 m10 offset-m1 " style="padding: 20px">
                                        <input type="hidden" name="id" value="<?=$client['id']?>">
                                        <button type="submit" name="modify"
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

            </div>

        </div>
        <!-- /.section -->
    </section>

<?php require_once "../layouts/admin_footer.php"; ?>