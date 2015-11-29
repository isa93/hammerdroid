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
<?php render('admin_nav', 'country'); ?>

    <section>
        <div class="section">

            <div class="divider"></div>
            <div class="row page-title" style="margin: 10px 10px">
                <div class="col s12 m6 l5">
                    <a class="breadcrumb" href="#"><i class="fa fa-globe left small"></i>Region</a>
                    <a class="breadcrumb" href="city.php">&gt; Countries</a>
                </div>
                <div class="col s12 m6 l7">
                    <?= isset($message) ? output_message($message) : null; ?>
                </div>
            </div>
            <div class="divider"></div>


            <div class="row container">

                <!-- ADD COUNTRY -->
                <div class="col s12 m10 offset-m1 l8 offset-l2">

                    <div class="card">
                        <span class="card-title blue-text accent-3" style="padding: 10px">Add new country</span>

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

                <!-- LIST COUNTRIES -->
                <div class="col s12 m10 offset-m1">

                    <div class="card">
                        <span class="card-title blue-text accent-3" style="padding: 10px">All countries</span>

                        <div class="divider"></div><br>

                        <div class="row">
                            <div class="col s10 offset-s1">
                                <table class="responsive-table centered highlight">

                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="flag flag-rs"></div>
                                        </th>
                                        <th>
                                            <div class="flag flag-hu"></div>
                                        </th>
                                        <th>
                                            <div class="flag flag-gb"></div>
                                        </th>
                                        <th><span class="hide">Modify</span></th>
                                        <th><span class="hide">Delete</span></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $countries = find_all('countries', 'name_srb');
                                    foreach ($countries as $country):
                                        ?>
                                        <tr>
                                            <td><?= $country['name_srb'] ?></td>
                                            <td><?= $country['name_hun'] ?></td>
                                            <td><?= $country['name_eng'] ?></td>
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