<?php
require_once "../../includes/initialize.php";
check_login();

?>
<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav','profile'); ?>

<section>
    <div class="section">

        <div class="divider"></div>
        <div class="row page-title" style="margin: 10px 10px">
            <div class="col s12 m6 l5">
                <a class="breadcrumb" href="profile.php"><i
                        class="mdi-action-account-box left small" style="line-height: 30px"></i>Profile</a>
                <a class="breadcrumb" href="add_admin.php">&gt; View</a>
            </div>
            <div class="col s12 m6 l7">
                <?= isset($message) ? output_message($message) : null; ?>
            </div>
        </div>
        <div class="divider"></div>


        <div class="row container">
            <?php $user = find_by_id('users',$_SESSION['user_id']); ?>

            <div class="col s12 m5">
                <div class="card" style="overflow: visible">
                    <div class="card-image">
                        <img class="materialboxed" width="200" src="../images/user/<?=get_user_image($user['id'])?>" alt="User profile image">
                    </div>
                </div>
            </div>

            <div class="col s12 m7">
                <div class="card ">

                    <div class="row">
                        <div class="col s10 offset-s1 m10 offset-m1 l8 offset-l2">

                            <div class="input-field">
                                <input type="text" disabled id="first_name" name="first_name" value="<?=$user['first_name']?>">
                                <label for="first_name">First name</label>
                            </div>

                            <div class="input-field">
                                <input type="text" disabled id="last_name" name="last_name" value="<?=$user['last_name']?>">
                                <label for="last_name">Last name</label>
                            </div>

                            <div class="input-field">
                                <select id="country" name="country" disabled>
                                    <?php
                                    foreach($WORLD_COUNTRIES as $country)
                                        echo htmlentities($country, ENT_QUOTES)==$user['country'] ? "<option value=\"" .htmlentities($country, ENT_QUOTES).  "\" selected>".htmlentities($country)."</option>\n" : "<option value=\"" .htmlentities($country)."\">".htmlentities($country)."</option>\n";
                                    ?>
                                </select>
                                <label for="country">Country</label>
                            </div>

                            <div class="row">

                                <?php $birthday = explode("-",$user['birth_date']) ?>
                                <div class="input-field col s4">
                                    <select id="year" name="year" disabled>
                                        <?php
                                        for($i = date('Y');$i>=date('Y')-100;$i--)
                                            echo $birthday[0]==$i ? "<option value=\"{$i}\" selected>{$i}</option>" : "<option value=\"{$i}\">{$i}</option>";
                                        ?>
                                    </select>
                                    <label for="year">Year</label>
                                </div>
                                <div class="input-field col s4">
                                    <select id="month" name="month" disabled>
                                        <?php
                                        for($i = 1;$i<=12;$i++)
                                            echo $birthday[1]==$i ? "<option value=\"{$i}\" selected>{$i}</option>" : "<option value=\"{$i}\">{$i}</option>";
                                        ?>
                                    </select>
                                    <label for="month">Month</label>
                                </div>
                                <div class="input-field col s4">
                                    <select id="day" name="day" disabled>
                                        <?php
                                        for($i = 1;$i<=31;$i++)
                                            echo $birthday[2]==$i ? "<option value=\"{$i}\" selected>{$i}</option>" : "<option value=\"{$i}\">{$i}</option>";
                                        ?>
                                    </select>
                                    <label for="day">Day</label>
                                </div>

                            </div>

                            <div class="input-field">
                                <input type="text" disabled id="username" name="username" value="<?= $user['username'] ?>">
                                <label for="username">Username</label>
                            </div>

                            <div class="input-field">
                                <input type="text" disabled id="email" name="email" value="<?= $user['email'] ?>">
                                <label for="email">E-mail</label>
                            </div>


                            <a href="edit_profile.php" class="btn-floating blue accent-3 btn-large waves-effect waves-light right"><i class="material-icons">loop</i> </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div><!-- /.section -->
</section>

<?php require_once "../layouts/admin_footer.php"; ?>
