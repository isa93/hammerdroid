<?php
require_once "../../includes/initialize.php";
check_login();

if (isset($_POST['register'])) {
    array_filter($_POST, 'trim_value');
    $check = add_user();
    if (array_shift($check) === TRUE) {
        redirect_to('list_admin.php');
    } else $message = array_shift($check);
}

if(isset($_POST['add'])){
    dump($_POST);exit;
}

$sort = sorter('name_srb');
?>
<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav', 'city'); ?>

    <section>
        <div class="section">

            <div class="divider"></div>
            <div class="row page-title" style="margin: 10px 10px">
                <div class="col s12 m6 l5">
                    <a class="breadcrumb" href="#"><i class="fa fa-globe left small"></i>Region</a>
                    <a class="breadcrumb" href="city.php">&gt; Cities</a>
                </div>
                <div class="col s12 m6 l7">
                    <?= isset($message) ? output_message($message) : null; ?>
                </div>
            </div>
            <div class="divider"></div>


            <div class="row container">

                <!-- ADD CITY -->
                <div class="col s12 m10 offset-m1 l8 offset-l2">
                <form action="city.php" method="post" role="form">

                    <div class="card">
                        <span class="card-title blue-text accent-3" style="padding: 10px">Add new city</span>

                        <div class="divider"></div>

                        <div class="row">

                            <div class="col s11 ">
                                <div class="col s2">
                                    <i class="flag flag-rs" style="margin: 0 auto;position: relative; top: 20px;"></i>
                                </div>
                                <div class="input-field col s10">
                                    <input type="text" name="name_srb" id="name_srb" value="">
                                    <label for="name_srb">Name</label>
                                </div>


                                <div class="col s2">
                                    <i class="flag flag-hu" style="margin:0 auto;position: relative; top: 20px;"></i>
                                </div>
                                <div class="input-field col s10">
                                    <input type="text" name="name_hun" id="name_hun" value="">
                                    <label for="name_hun">Name</label>
                                </div>


                                <div class="col s2">
                                    <i class="flag flag-gb" style="margin:0 auto;position: relative; top: 20px;"></i>
                                </div>
                                <div class="input-field col s10">
                                    <input type="text" name="name_eng" id="name_eng" value="">
                                    <label for="name_eng">Name</label>
                                </div>
                            </div>


                            <div class="col s10 offset-s1">
                                <div class="input-field country col s11 offset-s1">
                                    <select name="country" id="country">
                                        <option value="" selected>Choose</option>
                                        <?php
                                        $countries = find_all('countries', 'name_srb');
                                        foreach ($countries as $country)
                                            echo isset($_POST['country']) && $_POST['country'] == $country['name_srb'] ?
                                                "<option value=\"" . $country['ID_country'] . "\" selected>" . htmlentities($country['name_srb']) . "</option>\n" :
                                                "<option value=\"" . $country['ID_country'] . "\">" . htmlentities($country['name_srb']) . "</option>\n";
                                        ?>
                                    </select>
                                    <label for="country">Country</label>
                                </div>


                                <div class="col s11 offset-s1">
                                    <div class="input-field col s6">
                                        <input type="number" name="altitude" id="altitude" value="">
                                        <label for="altitude">Altitude</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input type="number" name="wind_force" id="wind_force" value="">
                                        <label for="wind_force">Wind force</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col s8 offset-s2 m6 offset-m3 " style="padding: 20px">
                                <button type="submit" name="add"
                                        class="left btn-floating btn-large teal waves-effect waves-light">
                                    <i class="material-icons">done</i>
                                </button>
                                <button type="reset" name="reset_default"
                                        class="right btn-floating btn-large orange waves-effect waves-light">
                                    <i class="material-icons">restore</i>
                                </button>
                            </div>
                        </div>

                    </div>

                </form>
                </div>

                <!-- LIST CITIES -->
                <div class="col s12">

                    <div class="card">
                        <span class="card-title blue-text accent-3" style="padding: 10px">All cities</span>

                        <div class="divider"></div><br>

                        <div class="row">
                            <div class="col s10 offset-s1">
                                <table class="responsive-table centered highlight">

                                    <thead>
                                        <tr>
                                            <th>
                                                <a <?= sorter_activator('srb') ?> href="city.php?s=srb"><div class="flag flag-rs"></div></a>
                                            </th>
                                            <th>
                                                <a <?= sorter_activator('hun') ?> href="city.php?s=hun"><div class="flag flag-hu"></div></a>
                                            </th>
                                            <th>
                                                <a <?= sorter_activator('eng') ?> href="city.php?s=eng"><div class="flag flag-gb"></div></a>
                                            </th>
                                            <th>
                                                <a <?= sorter_activator('country') ?> href="city.php?s=country">Country</a>
                                            </th>
                                            <th>
                                                <a <?= sorter_activator('altitude') ?> class="" href="city.php?s=altitude">Altitude</a>
                                            </th>
                                            <th>
                                                <a <?= sorter_activator('wind_force') ?> href="city.php?s=wind_force">Wind force</a>
                                            </th>
                                            <th><span class="hide">Modify</span></th>
                                            <th><span class="hide">Delete</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $cities = find_all('cities', $sort);
                                    foreach ($cities as $city):
                                    ?>
                                        <tr>
                                            <td><?= $city['name_srb'] ?></td>
                                            <td><?= $city['name_hun'] ?></td>
                                            <td><?= $city['name_eng'] ?></td>
                                            <td><?php $country = find_by_id('countries',$city['id']);echo $country['name_srb'];?></td>
                                            <td><?= $city['altitude'] ?> m</td>
                                            <td><?= $city['wind_force'] ?> <sup>m</sup><strong>&sol;</strong><sub>s</sub></td>
                                            <td>
                                                <button type="submit" name="modify" style="margin-left: 10px"
                                                        class="btn-floating  blue waves-effect waves-light">
                                                    <i class="material-icons">loop</i>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="submit" name="delete" style="margin-left: 10px"
                                                        class="btn-floating  red accent-4 waves-effect waves-light">
                                                    <i class="mdi-content-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- /.section -->
    </section>

<?php require_once "../layouts/admin_footer.php"; ?>