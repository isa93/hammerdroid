<?php
require_once "../../includes/initialize.php";
check_login();



?>
<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav', 'buildings'); ?>


<section>
    <div class="section">

        <div class="divider"></div>
        <div class="row page-title" style="margin: 10px 10px">
            <div class="col s12 m6 l5">
                <a class="breadcrumb" href="#"><i class="fa fa-building left small"></i>Structure</a>
                <a class="breadcrumb" href="groups.php">&gt; Buildings</a>
            </div>
            <div class="col s12 m6 l7">
                <?= isset($message) ? output_message($message) : null; ?>
            </div>
        </div>
        <div class="divider"></div>


        <div class="row container">

            <!-- ADD GROUP -->
            <div class="col s12 m10 offset-m1 l8 offset-l2">

                <div class="card">
                    <span class="card-title blue-text accent-3" style="padding: 10px">Add new building</span>

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

            <!-- LIST GROUPS -->
            <div class="col s12 m10 offset-m1">

                <div class="card">
                    <span class="card-title blue-text accent-3" style="padding: 10px">All buildings</span>

                    <div class="divider"></div><br>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <?php
                            $buildings = find_all('structures_buildings', 'name_srb');
                            foreach ($buildings as $building):
                                ?>
                                <div class="row" style="padding: 5px;border: 1px dashed #e0e0e0">
                                    <div class="col s9 city-info">

                                        <div class="flag flag-rs"></div><span><?= $building['name_srb'] ?></span><br>
                                        <div class="flag flag-hu"></div><span><?= $building['name_hun'] ?></span><br>
                                        <div class="flag flag-gb"></div><span><?= $building['name_eng'] ?></span><br>

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
