<?php
require_once "../../includes/initialize.php";
check_login();

if(isset($_POST['load'])){
    $_POST = array_filter($_POST, 'trim_value');
    $check = load_building();
    array_shift($check) === FALSE ? $message = array_shift($check) : null;
}

if(isset($_POST['add'])){
    $_POST = array_filter($_POST, 'trim_value');
    $check = add_building();
    array_shift($check) === FALSE ? $message = array_shift($check) : $_POST = [];
}

if(isset($_POST['modify'])){
    $_POST = array_filter($_POST, 'trim_value');
    $check = modify_building();
    array_shift($check) === FALSE ? $message = array_shift($check) : $_POST = [];
}

if(isset($_POST['delete'])){
    $_POST = array_filter($_POST, 'trim_value');
    $check = delete_building();
    array_shift($check) === FALSE ? $message = array_shift($check) : null;
}

$sort = sorter('buildings','name_srb');
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

            <!-- ADD BUILDING -->
            <div class="col s12 m10 offset-m1 l8 offset-l2">
            <form action="buildings.php" method="post" role="form">

                <div class="card">
                    <span class="card-title blue-text accent-3" style="padding: 10px">Add new building</span>

                    <div class="divider"></div>

                    <div class="row">

                        <div class="col s11 ">
                            <div class="col s2">
                                <i class="flag flag-rs" style="margin: 0 auto;position: relative; top: 20px;"></i>
                            </div>
                            <div class="input-field col s10">
                                <input type="text" name="name_srb" id="name_srb"
                                       length="<?= get_maxLength('buildings','name_srb') ?>"
                                       value="<?= isset($_POST['name_srb']) ? $_POST['name_srb'] : null ?>">
                                <label for="name_srb">Name (Serbian)</label>
                            </div>


                            <div class="col s2">
                                <i class="flag flag-hu" style="margin:0 auto;position: relative; top: 20px;"></i>
                            </div>
                            <div class="input-field col s10">
                                <input type="text" name="name_hun" id="name_hun"
                                       length="<?= get_maxLength('buildings','name_hun')?>"
                                       value="<?= isset($_POST['name_hun']) ? $_POST['name_hun'] : null ?>">
                                <label for="name_hun">Name (Hungarian)</label>
                            </div>


                            <div class="col s2">
                                <i class="flag flag-gb" style="margin:0 auto;position: relative; top: 20px;"></i>
                            </div>
                            <div class="input-field col s10">
                                <input type="text" name="name_eng" id="name_eng"
                                       length="<?= get_maxLength('buildings','name_eng') ?>"
                                       value="<?= isset($_POST['name_eng']) ? $_POST['name_eng'] : null ?>">
                                <label for="name_eng">Name (English)</label>
                            </div>
                        </div>

                        <div class="col s10 offset-s1">
                            <div class="col s11 offset-s1">
                                    <?php
                                    $groups = find_all('groups', 'name_srb');
                                    foreach ($groups as $group)
                                        echo isset($_POST['id_groups']) && $_POST['id_groups'] == $group['id'] ?
                                            "<div class='col s6'>
                                                <input type=\"radio\" name=\"id_groups\" id=\"{$group['id']}\" value=\"{$group['id']}\" checked>
                                                <label for=\"{$group['id']}\">{$group['name_srb']}</label>
                                            </div>"
                                            :
                                            "<div class='col s6'>
                                                <input type=\"radio\" name=\"id_groups\" id=\"{$group['id']}\" value=\"{$group['id']}\">
                                                <label for=\"{$group['id']}\">{$group['name_srb']}</label>
                                            </div>"
                                            ;
                                    ?>

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

            <!-- LIST BUILDINGS -->
            <div class="col s12 m10 offset-m1">

                <div class="card">
                    <span class="card-title blue-text accent-3" style="padding: 10px">All buildings</span>

                    <div class="divider"></div><br>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <table class="responsive-table centered highlight">

                                <thead>
                                <tr>
                                    <th>
                                        <a <?= sorter_activator('srb') ?> href="buildings.php?s=srb"><div class="flag flag-rs"></div></a>
                                    </th>
                                    <th>
                                        <a <?= sorter_activator('hun') ?> href="buildings.php?s=hun"><div class="flag flag-hu"></div></a>
                                    </th>
                                    <th>
                                        <a <?= sorter_activator('eng') ?> href="buildings.php?s=eng"><div class="flag flag-gb"></div></a>
                                    </th>
                                    <th>
                                        <a <?= sorter_activator('group') ?> href="buildings.php?s=group">Group</a>
                                    </th>
                                    <th><span class="hide">Modify</span></th>
                                    <th><span class="hide">Delete</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $buildings = find_all('buildings', $sort);
                                foreach ($buildings as $building):
                                ?>

                                    <tr>

                                        <td><?= $building['name_srb'] ?></td>
                                        <td><?= $building['name_hun'] ?></td>
                                        <td><?= $building['name_eng'] ?></td>
                                        <td><?php $group = find_by_id('groups',$building['id_groups']);echo $group['name_srb']?></td>
                                        <td>
                                            <form action="buildings.php" method="post" role="form">
                                                <input type="hidden" name="id" value="<?= $building['id'] ?>">
                                                <button type="submit" name="load" style="margin-left: 10px"
                                                        class="btn-floating  blue waves-effect waves-light">
                                                    <i class="material-icons">loop</i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="buildings.php" method="post" role="form">
                                                <input type="hidden" name="id" value="<?= $building['id'] ?>">
                                                <button type="submit" name="delete" style="margin-left: 10px"
                                                        class="btn-floating  red accent-4 waves-effect waves-light">
                                                    <i class="mdi-content-remove"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>

                                <?php endforeach ?>
                                </tbody>

                            </table>
                        </div> <!-- /col -->
                    </div> <!-- /row -->

                </div> <!-- /card -->

            </div>
            <!-- /LIST BUILDINGS -->

        </div>
    </div>
    <!-- /.section -->
</section>

<?php require_once "../layouts/admin_footer.php"; ?>
