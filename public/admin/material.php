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
<?php render('admin_nav', 'material'); ?>

    <section>
        <div class="section">

            <div class="divider"></div>
            <div class="row page-title" style="margin: 10px 10px">
                <div class="col s12 m6 l5">
                    <a class="breadcrumb" href="material.php"><i class="material-icons left small">build</i>Material</a>
                </div>
                <div class="col s12 m6 l7">
                    <?= isset($message) ? output_message($message) : null; ?>
                </div>
            </div>
            <div class="divider"></div>


            <div class="row container">

                <!-- ADD COUNTRY -->
                <div class="col s12 m10 offset-m1">

                    <div class="card">
                        <span class="card-title blue-text accent-3" style="padding: 10px">Add new material</span>

                        <div class="divider"></div>

                        <div class="row">

                            <div class="col s10 offset-s1 ">
                                <div class="input-field col s5">
                                    <input type="text" name="new_dimension" id="new_dimension" value="">
                                    <label for="new_dimension">Add dimension</label>
                                </div>
                                <div class="col s2 valign-wrapper" style="height: 70px">
                                    <div class="valign center-block">
                                        <span>or</span>
                                    </div>
                                </div>
                                <div class="input-field col s5">
                                    <select name="dimension" id="dimension">
                                        <option value="" selected>Choose</option>
                                        <?php
                                        $dimensions = find_all('dimensions','dimensions');
                                        foreach($dimensions as $dimension)
                                            echo isset($_POST['dimension']) && $_POST['dimension']==$dimension ?
                                                "<option value=\"" . $dimension['id'] . "\" selected>" . htmlentities($dimension['dimension']) . "</option>\n" :
                                                "<option value=\"" . $dimension['id'] . "\">" . htmlentities($dimension['dimensions']) . "</option>\n";
                                        ?>
                                    </select>
                                    <label for="dimension">Dimension</label>
                                </div>
                            </div>

                            <div class="col s12">
                                <div class="divider"></div>
                            </div>

                            <div class="col s10 offset-s1 ">

                                <div class="input-field col s6">
                                    <input type="number" step="0.1" name="s" id="s" value="">
                                    <label for="s">S (mm)</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" step="0.001" name="a" id="a" value="">
                                    <label for="a">A</label>
                                </div>

                                <div class="input-field col s6">
                                    <input type="number" step="0.001" name="wx" id="wx" value="">
                                    <label for="wx">Wx</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" step="0.01" name="wy" id="wy" value="">
                                    <label for="wy">Wy</label>
                                </div>

                                <div class="input-field col s6">
                                    <input type="number" step="0.01" name="lx" id="lx" value="">
                                    <label for="lx">Lx</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" step="0.01" name="ly" id="ly" value="">
                                    <label for="ly">Ly</label>
                                </div>

                                <div class="input-field col s6">
                                    <input type="number" step="0.001" name="jx" id="jx" value="">
                                    <label for="jx">Jx</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" step="0.001" name="jy" id="jy" value="">
                                    <label for="jy">Jy</label>
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
                                <?php
                                $countries = find_all('countries', 'name_srb');
                                foreach ($countries as $country):
                                    ?>
                                    <div class="row" style="padding: 5px;border: 1px dashed #e0e0e0">
                                        <div class="col s9 city-info">

                                            <div class="flag flag-rs"></div><span><?= $country['name_srb'] ?></span><br>
                                            <div class="flag flag-hu"></div><span><?= $country['name_hun'] ?></span><br>
                                            <div class="flag flag-gb"></div><span><?= $country['name_eng'] ?></span><br>

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
