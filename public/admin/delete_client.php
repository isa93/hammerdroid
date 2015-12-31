<?php
require_once "../../includes/initialize.php";
check_login();

if(isset($_POST['delete'])){
    $_POST = array_filter($_POST,'trim_value');
    $check = delete_client();
    if(array_shift($check) == TRUE) {
        redirect_to('list_client.php');
    } else $message = array_shift($check);
}

?>
<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav', 'delete_client'); ?>

    <section>
        <div class="section">

            <div class="divider"></div>
            <div class="row page-title" style="margin: 10px 10px">
                <div class="col s12 m6 l5">
                    <a class="breadcrumb" href="list_client.php"><i class="fa fa-user left small"></i>Client</a>
                    <a class="breadcrumb" href="delete_client.php">&gt; Delete</a>
                </div>
                <div class="col s12 m6 l7">
                    <?= isset($message) ? output_message($message) : null; ?>
                </div>
            </div>
            <div class="divider"></div>

            <div class="row container">
                <?php
                $clients = find_all('clients');
                foreach ($clients as $client):
                    $image = get_image('clients',$client['id']);
                    ?>
                    <div class="col s12 m10 offset-m1 l6">
                        <div class="card medium">

                            <div class="card-image waves-effect waves-block waves-light" style="height: 300px">
                                <a href="#">
                                    <img class="activator" src="../images/user/<?= $image ?>"
                                         alt="<?= $client['first_name'] ?> profile picture">
                                </a>
                            </div>

                            <div class="card-content" style="height: 100px">
                                <!-- MODAL -->
                                <a class="waves-light waves-light btn-floating btn-large modal-trigger red accent-4 left"
                                   href="#delete<?= $client['id'] ?>" style="position: absolute;bottom: 75px">
                                    <i class="mdi-content-remove left"></i>
                                </a>

                                <div id="delete<?= $client['id'] ?>" class="modal">

                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="card col s12 m5 z-depth-0 transparent">
                                                <img class="z-depth-1 center-align" src="../images/user/<?= $image ?>"
                                                     style="width:auto !important;height: inherit;max-width: 100% !important;"
                                                     alt="<?= $client['first_name'] ?> profile picture">
                                            </div>
                                            <div class="col s12 m7">
                                                <h2 class="center">Warning!</h2>
                                                <h5>Are you sure you want to remove the selected client?</h5>

                                                <p style="margin-left: 20px">
                                                    <?= $client['first_name'] . " " . $client['last_name'] ?><br>
                                                    <?= $client['username'] ?><br>
                                                    <?= $client['email'] ?><br>
                                                    <?= $client['country'] ?><br>
                                                    <?= $client['birth_date'] ?><br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <form action="delete_client.php" method="post">
                                            <input type="hidden" name="id" value="<?= $client['id'] ?>">
                                            <button type="reset" name="reset" class="btn blue accent-3 modal-close"
                                                    style="margin-left: 15px">Cancel
                                            </button>
                                            <button type="submit" name="delete" class="btn red">Delete</button>
                                        </form>
                                    </div>
                                </div>

                                <span
                                    class="card-title activator blue-text accent-3"><?= $client['first_name'] . " " . $client['last_name'] ?>
                                    <i class="material-icons right">more_vert</i></span>
                            </div>

                            <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <?= $client['first_name'] . " " . $client['last_name'] ?>
                            <i class="material-icons right">close</i>
                        </span>

                                <div class="row">
                                    <div class="col s10 offset-s1">

                                        <div class="input-field">
                                            <input type="text" disabled id="first_name<?= $client['id'] ?>"
                                                   name="first_name" value="<?= $client['first_name'] ?>">
                                            <label for="first_name<?= $client['id'] ?>">First name</label>
                                        </div>

                                        <div class="input-field">
                                            <input type="text" disabled id="last_name<?= $client['id'] ?>"
                                                   name="last_name" value="<?= $client['last_name'] ?>">
                                            <label for="last_name<?= $client['id'] ?>">Last name</label>
                                        </div>

                                        <div class="input-field">
                                            <select id="country<?= $client['id'] ?>" disabled>
                                                <?php
                                                foreach ($WORLD_COUNTRIES as $country)
                                                    echo htmlentities($country,ENT_QUOTES) == $client['country'] ? "<option value=\"" . htmlentities($country, ENT_QUOTES) . "\" selected>" . htmlentities($country) . "</option>\n" : "<option value=\"" . htmlentities($country, ENT_QUOTES) . "\">" . htmlentities($country) . "</option>\n";
                                                ?>
                                            </select>
                                            <label for="country<?= $client['id'] ?>">Country</label>
                                        </div>

                                        <div class="row">

                                            <?php $birthday = explode("-",$client['birth_date']) ?>
                                            <div class="input-field col s4">
                                                <select id="year<?=$client['id']?>" name="year" disabled>
                                                    <?php
                                                    for($i = date('Y');$i>=date('Y')-100;$i--)
                                                        echo $birthday[0]==$i ? "<option value=\"{$i}\" selected>{$i}</option>" : "<option value=\"{$i}\">{$i}</option>";
                                                    ?>
                                                </select>
                                                <label for="year<?=$client['id']?>">Year</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <select id="month<?=$client['id']?>" name="month" disabled>
                                                    <?php
                                                    for($i = 1;$i<=12;$i++)
                                                        echo $birthday[1]==$i ? "<option value=\"{$i}\" selected>{$i}</option>" : "<option value=\"{$i}\">{$i}</option>";
                                                    ?>
                                                </select>
                                                <label for="month<?=$client['id']?>">Month</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <select id="day<?=$client['id']?>" name="day" disabled>
                                                    <?php
                                                    for($i = 1;$i<=31;$i++)
                                                        echo $birthday[2]==$i ? "<option value=\"{$i}\" selected>{$i}</option>" : "<option value=\"{$i}\">{$i}</option>";
                                                    ?>
                                                </select>
                                                <label for="day<?=$client['id']?>">Day</label>
                                            </div>

                                        </div>

                                        <div class="input-field">
                                            <input type="text" disabled id="username<?= $client['id'] ?>" name="username"
                                                   value="<?= $client['username'] ?>">
                                            <label for="username<?= $client['id'] ?>">Username</label>
                                        </div>
                                        <div class="input-field">
                                            <input type="text" disabled id="email<?= $client['id'] ?>" name="email"
                                                   value="<?= $client['email'] ?>">
                                            <label for="email<?= $client['id'] ?>">E-mail</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <!-- /.section -->
    </section>

<?php require_once "../layouts/admin_footer.php"; ?>