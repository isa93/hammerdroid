<?php
require_once "../../includes/initialize.php";
check_login();

if(isset($_POST['load'])){
    array_filter($_POST, 'trim_value');
    $check = load_group();
    array_shift($check) === FALSE ? $message = array_shift($check) : null;
}

if(isset($_POST['add'])){
    array_filter($_POST, 'trim_value');
    $check = add_group();
    array_shift($check) === FALSE ? $message = array_shift($check) : $_POST = [];
}

if(isset($_POST['modify'])){
    array_filter($_POST, 'trim_value');
    $check = modify_group();
    array_shift($check) === FALSE ? $message = array_shift($check) : null;
}

if(isset($_POST['delete'])){
    array_filter($_POST, 'trim_value');
    $check = delete_group();
    array_shift($check) === FALSE ? $message = array_shift($check) : null;
}

$sort = sorter('groups','name_srb');
?>
<?php require_once "../layouts/admin_header.php"; ?>
<?php render('admin_nav', 'groups'); ?>


    <section>
        <div class="section">

            <div class="divider"></div>
            <div class="row page-title" style="margin: 10px 10px">
                <div class="col s12 m6 l5">
                    <a class="breadcrumb" href="#"><i class="fa fa-building-o left small"></i>Structure</a>
                    <a class="breadcrumb" href="groups.php">&gt; Groups</a>
                </div>
                <div class="col s12 m6 l7">
                    <?= isset($message) ? output_message($message) : null; ?>
                </div>
            </div>
            <div class="divider"></div>


            <div class="row container">

                <!-- ADD GROUP -->
                <div class="col s12 m10 offset-m1 l8 offset-l2">
                <form action="groups.php" method="post" role="form">

                    <div class="card">
                        <span class="card-title blue-text accent-3" style="padding: 10px">Add new group</span>

                        <div class="divider"></div>

                        <div class="row">

                            <div class="col s11 ">
                                <div class="col s2">
                                    <i class="flag flag-rs" style="margin: 0 auto;position: relative; top: 20px;"></i>
                                </div>
                                <div class="input-field col s10">
                                    <input type="text" name="name_srb" id="name_srb"
                                           length="<?= get_maxLength('groups','name_srb') ?>"
                                           value="<?= isset($_POST['name_srb']) ? $_POST['name_srb'] : null ?>">
                                    <label for="name_srb">Name (Serbian)</label>
                                </div>


                                <div class="col s2">
                                    <i class="flag flag-hu" style="margin:0 auto;position: relative; top: 20px;"></i>
                                </div>
                                <div class="input-field col s10">
                                    <input type="text" name="name_hun" id="name_hun"
                                           length="<?= get_maxLength('groups','name_hun')?>"
                                           value="<?= isset($_POST['name_hun']) ? $_POST['name_hun'] : null ?>">
                                    <label for="name_hun">Name (Hungarian)</label>
                                </div>


                                <div class="col s2">
                                    <i class="flag flag-gb" style="margin:0 auto;position: relative; top: 20px;"></i>
                                </div>
                                <div class="input-field col s10">
                                    <input type="text" name="name_eng" id="name_eng"
                                           length="<?= get_maxLength('groups','name_eng') ?>"
                                           value="<?= isset($_POST['name_eng']) ? $_POST['name_eng'] : null ?>">
                                    <label for="name_eng">Name (English)</label>
                                </div>
                            </div>

                            <div class="col s8 offset-s2 m6 offset-m3 " style="padding: 20px">
                                <?= isset($_POST['load_complete']) && $_POST['load_complete']==true ?
                                    "<input type=\"hidden\" name=\"id\" value=\"{$_POST['id']}\">" :
                                    null;
                                ?>
                                <button type="submit" name="<?= isset($_POST['load_complete']) && $_POST['load_complete']==true ? 'modify' : 'add' ?>"
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

                <!-- LIST GROUPS -->
                <div class="col s12 m10 offset-m1">

                    <div class="card">
                        <span class="card-title blue-text accent-3" style="padding: 10px">All groups</span>

                        <div class="divider"></div><br>

                        <div class="row">
                            <div class="col s10 offset-s1">
                                <table class="responsive-table centered highlight">

                                    <thead>
                                    <tr>
                                        <th>
                                            <a <?= sorter_activator('srb') ?> href="groups.php?s=srb"><div class="flag flag-rs"></div></a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('hun') ?> href="groups.php?s=hun"><div class="flag flag-hu"></div></a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('eng') ?> href="groups.php?s=eng"><div class="flag flag-gb"></div></a>
                                        </th>
                                        <th><span class="hide">Modify</span></th>
                                        <th><span class="hide">Delete</span></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $groups = find_all('groups', $sort);
                                    foreach ($groups as $group):
                                    ?>
                                        <form action="groups.php" method="post" role="form">
                                            <tr>
                                                <td><?= $group['name_srb'] ?></td>
                                                <td><?= $group['name_hun'] ?></td>
                                                <td><?= $group['name_eng'] ?></td>
                                                <td>
                                                    <input type="hidden" name="id" value="<?= $group['id'] ?>">
                                                    <button type="submit" name="load" style="margin-left: 10px"
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
                                        </form>
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
