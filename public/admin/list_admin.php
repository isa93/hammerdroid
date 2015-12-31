<?php
require_once "../../includes/initialize.php";
check_login();
check_superuser();
?>
<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav','list_admin'); ?>

<section>
    <div class="section">

        <div class="divider"></div>
        <div class="row page-title" style="margin: 10px 10px">
            <div class="col s12 m6 l5">
                <a class="breadcrumb" href="list_admin.php"><i class="material-icons left small">android</i>Admin</a>
                <a class="breadcrumb" href="list_admin.php">&gt; List</a>
            </div>
            <div class="col s12 m6 l7">
                <?= isset($message) ? output_message($message) : null; ?>
            </div>
        </div>
        <div class="divider"></div>

        <div class="row container">
            <?php
            $admins = find_all('users','first_name');
            foreach($admins as $admin):
               $image = get_image('users',$admin['id']);
            ?>
            <div class="col s12 m10 offset-m1 l6">
                <div class="card medium">

                    <div class="card-image waves-effect waves-block waves-light" style="height: 300px">
                        <a href="#">
                            <img class="activator" src="../images/user/<?= $image ?>" alt="<?= $admin['first_name'] ?> profile picture">
                        </a>
                    </div>

                    <div class="card-content" style="height: 100px">
                        <span class="card-title activator blue-text accent-3"><?= $admin['first_name'] . " " . $admin['last_name'] ?><i class="material-icons right">more_vert</i></span>
                    </div>

                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <?= $admin['first_name'] . " " . $admin['last_name'] ?>
                            <i class="material-icons right">close</i>
                        </span>

                        <div class="row">
                            <div class="col s10 offset-s1">

                                <div class="input-field">
                                    <input type="text" disabled id="first_name<?=$admin['id']?>" name="first_name" value="<?=$admin['first_name']?>">
                                    <label for="first_name<?=$admin['id']?>">First name</label>
                                </div>

                                <div class="input-field">
                                    <input type="text" disabled id="last_name<?=$admin['id']?>" name="last_name" value="<?=$admin['last_name']?>">
                                    <label for="last_name<?=$admin['id']?>">Last name</label>
                                </div>

                                <div class="input-field">
                                    <select id="country<?=$admin['id']?>" disabled>
                                        <?php
                                            foreach($WORLD_COUNTRIES as $country)
                                            echo htmlentities($country, ENT_QUOTES)==$admin['country'] ?
                                                "<option value=\"" .htmlentities($country, ENT_QUOTES).  "\" selected>".htmlentities($country)."</option>\n" :
                                                "<option value=\"" .htmlentities($country,ENT_QUOTES)."\">".htmlentities($country)."</option>\n";
                                        ?>
                                    </select>
                                    <label for="country<?=$admin['id']?>">Country</label>
                                </div>

                                <div class="row">

                                    <?php $birthday = explode("-",$admin['birth_date']) ?>
                                    <div class="input-field col s4">
                                        <select id="year<?=$admin['id']?>" name="year" disabled>
                                            <?php
                                            for($i = date('Y');$i>=date('Y')-100;$i--)
                                                echo $birthday[0]==$i ? "<option value=\"{$i}\" selected>{$i}</option>" : "<option value=\"{$i}\">{$i}</option>";
                                            ?>
                                        </select>
                                        <label for="year<?=$admin['id']?>">Year</label>
                                    </div>
                                    <div class="input-field col s4">
                                        <select id="month<?=$admin['id']?>" name="month" disabled>
                                            <?php
                                            for($i = 1;$i<=12;$i++)
                                                echo $birthday[1]==$i ? "<option value=\"{$i}\" selected>{$i}</option>" : "<option value=\"{$i}\">{$i}</option>";
                                            ?>
                                        </select>
                                        <label for="month<?=$admin['id']?>">Month</label>
                                    </div>
                                    <div class="input-field col s4">
                                        <select id="day<?=$admin['id']?>" name="day" disabled>
                                            <?php
                                            for($i = 1;$i<=31;$i++)
                                                echo $birthday[2]==$i ? "<option value=\"{$i}\" selected>{$i}</option>" : "<option value=\"{$i}\">{$i}</option>";
                                            ?>
                                        </select>
                                        <label for="day<?=$admin['id']?>">Day</label>
                                    </div>

                                </div>

                                <div class="input-field">
                                    <input type="text" disabled id="username<?=$admin['id']?>" name="username" value="<?= $admin['username'] ?>">
                                    <label for="username<?=$admin['id']?>">Username</label>
                                </div>

                                <div class="input-field">
                                    <input type="text" disabled id="email<?=$admin['id']?>" name="email" value="<?= $admin['email'] ?>">
                                    <label for="email<?=$admin['id']?>">E-mail</label>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div><!-- /.section -->
</section>

<?php require_once "../layouts/admin_footer.php"; ?>
