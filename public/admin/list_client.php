<?php
require_once "../../includes/initialize.php";
check_login();
?>

<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav','list_client'); ?>

<section>
    <div class="section">

    <div class="divider"></div>
    <div class="row page-title" style="margin: 10px 10px">
        <div class="col s12 m6 l5">
            <a class="breadcrumb" href="list_client.php"><i class="fa fa-user left small"></i>Client</a>
            <a class="breadcrumb" href="list_client.php">&gt; List</a>
        </div>
        <div class="col s12 m6 l7">
            <?= isset($message) ? output_message($message) : null; ?>
        </div>
    </div>
    <div class="divider"></div>

    <div class="row container">
        <?php
        $clients = find_all('clients','first_name');
        foreach($clients as $client) :
            $image = get_image('clients',$client['id']);
        ?>
        <div class="col s12 m10 offset-m1 l6">
            <div class="card medium">

                <div class="card-image waves-effect waves-block waves-light" style="height: 300px;">
                    <a href="#">
                        <img class="activator" src="../images/user/<?= $image ?>" alt="<?= $client['first_name'] ?> profile picture">
                    </a>
                </div>

                <div class="card-content">
                    <span class="card-title activator blue-text accent-3"><?= $client['first_name'] . " " . $client['last_name'] ?><i class="material-icons right">more_vert</i></span>
                </div>

                <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <?= $client['first_name'] . " " . $client['last_name'] ?>
                            <i class="material-icons right">close</i>
                        </span>

                    <div class="row">
                        <div class="col s10 offset-s1">

                            <div class="input-field">
                                <input type="text" disabled id="first_name<?=$client['id']?>" name="first_name" value="<?=$client['first_name']?>">
                                <label for="first_name<?=$client['id']?>">First name</label>
                            </div>

                            <div class="input-field">
                                <input type="text" disabled id="last_name<?=$client['id']?>" name="last_name" value="<?=$client['last_name']?>">
                                <label for="last_name<?=$client['id']?>">Last name</label>
                            </div>

                            <div class="input-field">
                                <select id="country<?=$client['id']?>" disabled>
                                    <?php
                                    foreach($WORLD_COUNTRIES as $country)
                                        echo htmlentities($country, ENT_QUOTES)==$client['country'] ?
                                            "<option value=\"" .htmlentities($country, ENT_QUOTES).  "\" selected>".htmlentities($country)."</option>\n" :
                                            "<option value=\"" .htmlentities($country,ENT_QUOTES)."\">".htmlentities($country)."</option>\n";
                                    ?>
                                </select>
                                <label for="country<?=$client['id']?>">Country</label>
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
                                <input type="text" disabled id="username<?=$client['id']?>" name="username" value="<?= $client['username'] ?>">
                                <label for="username<?=$client['id']?>">Username</label>
                            </div>

                            <div class="input-field">
                                <input type="text" disabled id="email<?=$client['id']?>" name="email" value="<?= $client['email'] ?>">
                                <label for="email<?=$client['id']?>">E-mail</label>
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