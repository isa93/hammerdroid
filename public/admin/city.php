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

                </div>

                <!-- LIST CITIES -->
                <div class="col s12 m10 offset-m1">

                    <div class="card">
                        <span class="card-title blue-text accent-3" style="padding: 10px">All cities</span>

                        <div class="divider"></div><br>

                        <div class="row">
                            <div class="col s10 offset-s1">
                                <?php
                                $cities = find_all('cities', 'name_srb');
                                foreach ($cities as $city):
                                    ?>
                                    <div class="row" style="padding: 5px;border: 1px dashed #e0e0e0">
                                        <div class="col s9 city-info">
                                            <div class="col s6">
                                                <div class="flag flag-rs"></div><span><?= $city['name_srb'] ?></span><br>
                                                <div class="flag flag-hu"></div><span><?= $city['name_hun'] ?></span><br>
                                                <div class="flag flag-gb"></div><span><?= $city['name_eng'] ?></span><br>
                                            </div>
                                            <div class="col s6">
                                                Country:
                                                <?php
                                                    $country = find_by_id('countries',$city['id']);
                                                    echo $country['name_srb']."<br>";
                                                ?>
                                                <br>
                                                Altitude:
                                                <?= $city['altitude'] ?> m<br>
                                                <br>
                                                Wind force:
                                                <?= $city['wind_force'] ?> m/s
                                            </div>
                                        </div>
                                        <div class="s3 offset-s9">
                                            <button type="submit" name="delete" style="margin-left: 10px"
                                                    class="right btn-floating  red accent-4 waves-effect waves-light">
                                                <i class="mdi-content-remove left"></i>
                                            </button>
                                            <button type="submit" name="modify"
                                                    class="right btn-floating blue waves-effect waves-light">
                                                <i class="material-icons">loop</i>
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- /.section -->
    </section>

<?php require_once "../layouts/admin_footer.php"; ?>