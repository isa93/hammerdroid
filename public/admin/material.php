<?php
require_once "../../includes/initialize.php";
check_login();

if(isset($_POST['load'])){
    array_filter($_POST, 'trim_value');
    $check = load_material();
    array_shift($check) === FALSE ? $message = array_shift($check) : null;
}

if(isset($_POST['add'])){
    array_filter($_POST, 'trim_value');
    $check = add_material();
    array_shift($check) === FALSE ? $message = array_shift($check) : $_POST = [];
}

if(isset($_POST['modify'])){
    array_filter($_POST, 'trim_value');
    $check = modify_material();
    array_shift($check) === FALSE ? $message = array_shift($check) : null;
}

if(isset($_POST['delete'])){
    array_filter($_POST, 'trim_value');
    $check = delete_material();
    array_shift($check) === FALSE ? $message = array_shift($check) : null;
}

if(isset($_POST['drop_dimension'])){
    array_filter($_POST,'trim_value');
    $check = delete_dimension();
    array_shift($check) === FALSE ? $message = array_shift($check) : null;
}

$sort = sorter('data','id_dimensions');
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

                <!-- ADD MATERIAL -->
                <div class="col s12 m10 offset-m1">
                <form action="material.php" method="post" role="form">

                    <div class="card">
                        <span class="card-title blue-text accent-3" style="padding: 10px">Add new material</span>

                        <div class="divider"></div>

                        <div class="row">

                            <div class="col s10 offset-s1 ">
                                <div class="input-field col s5">
                                    <input type="text" name="new_dimension" id="new_dimension"
                                        length="<?= get_maxLength('dimensions','dimensions') ?>"
                                        value="<?= isset($_POST['new_dimension']) ? $_POST['new_dimension'] : null ?>">
                                    <label for="new_dimension">Add dimension</label>
                                </div>
                                <div class="col s2 valign-wrapper" style="height: 70px">
                                    <div class="valign center-block">
                                        <span>or</span>
                                    </div>
                                </div>
                                <div class="input-field col s5">
                                    <select name="id_dimensions" id="dimension">
                                        <option value="" <?= !isset($_POST['id_dimensions']) ? 'selected' : null?>>Choose</option>
                                        <?php
                                        $dimensions = find_all('dimensions','dimensions');
                                        foreach($dimensions as $dimension)
                                            echo isset($_POST['id_dimensions']) && $_POST['id_dimensions']==$dimension['id'] ?
                                                "<option value=\"" . $dimension['id'] . "\" selected>" . htmlentities($dimension['dimensions']) . "</option>\n" :
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
                                    <input type="number" step="0.1" name="s" id="s"
                                        length="<?= get_maxLength('data','S')?>"
                                        value="<?= isset($_POST['s']) ? $_POST['s'] : null ?>">
                                    <label for="s">S</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" step="0.001" name="a" id="a"
                                           length="<?= get_maxLength('data','A') ?>"
                                           value="<?= isset($_POST['a']) ? $_POST['a'] : null ?>">
                                    <label for="a">A</label>
                                </div>

                                <div class="input-field col s6">
                                    <input type="number" step="0.001" name="wx" id="wx"
                                           length="<?= get_maxLength('data','Wx') ?>"
                                           value="<?= isset($_POST['wx']) ? $_POST['wx'] : null?>">
                                    <label for="wx">Wx</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" step="0.01" name="wy" id="wy"
                                           length="<?= get_maxLength('data','Wy') ?>"
                                           value="<?= isset($_POST['wy']) ? $_POST['wy'] : null ?>">
                                    <label for="wy">Wy</label>
                                </div>

                                <div class="input-field col s6">
                                    <input type="number" step="0.01" name="ix" id="ix"
                                           length="<?= get_maxLength('data','Ix') ?>"
                                           value="<?= isset($_POST['ix']) ? $_POST['ix'] : null ?>">
                                    <label for="ix">Ix</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" step="0.01" name="iy" id="iy"
                                           length="<?= get_maxLength('data','Iy') ?>"
                                           value="<?= isset($_POST['iy']) ? $_POST['iy'] : null ?>">
                                    <label for="iy">Iy</label>
                                </div>

                                <div class="input-field col s6">
                                    <input type="number" step="0.001" name="jx" id="jx"
                                           length="<?= get_maxLength('data','Jx') ?>"
                                           value="<?= isset($_POST['jx']) ? $_POST['jx'] : null ?>">
                                    <label for="jx">Jx</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" step="0.001" name="jy" id="jy"
                                           length="<?= get_maxLength('data','Jy') ?>"
                                           value="<?= isset($_POST['jy']) ? $_POST['jy'] : null ?>">
                                    <label for="jy">Jy</label>
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

                <!-- LIST MATERIAL -->
                <div class="col s12 m10 offset-m1">

                    <div class="card">

                        <div class="row">

                            <div class="col s12 ">
                                <ul class="tabs">
                                    <li class="tab col s6"><a href="#materials">Materials</a></li>
                                    <li class="tab col s6"><a href="#dimensions">Dimensions</a></li>
                                </ul>
                            </div>


                            <div id="materials" class="col s10 offset-s1">
                                <table class="responsive-table centered highlight">

                                    <thead>
                                    <tr>
                                        <th>
                                            <a <?= sorter_activator('dimensions')?> href="material.php?s=dimensions">Dimensions</a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('s') ?> href="material.php?s=s">S</a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('a') ?> href="material.php?s=a">A</a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('wx') ?> href="material.php?s=wx">W<sub>x</sub></a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('wy') ?> href="material.php?s=wy">W<sub>y</sub></a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('ix') ?> href="material.php?s=ix">I<sub>x</sub></a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('iy') ?> href="material.php?s=iy">I<sub>y</sub></a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('jx') ?> href="material.php?s=jx" >J<sub>x</sub></a>
                                        </th>
                                        <th>
                                            <a <?= sorter_activator('jy') ?> href="material.php?s=jy" >J<sub>y</sub></a>
                                        </th>
                                        <th><span class="hide">Modify</span></th>
                                        <th><span class="hide">Delete</span></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $materials = find_all('data', $sort);
                                    foreach ($materials as $material):
                                    ?>
                                        <form action="material.php" method="post" role="form">
                                            <tr>
                                                <td><?php $dimension = find_by_id('dimensions',$material['id_dimensions']);echo $dimension['dimensions'];?></td>
                                                <td><?= $material['S'] ?></td>
                                                <td><?= $material['A'] ?></td>
                                                <td><?= $material['Wx'] ?></td>
                                                <td><?= $material['Wy'] ?></td>
                                                <td><?= $material['Ix'] ?></td>
                                                <td><?= $material['Iy'] ?></td>
                                                <td><?= $material['Jx'] ?></td>
                                                <td><?= $material['Jy'] ?></td>
                                                <td>
                                                    <input type="hidden" name="id" value="<?= $material['id'] ?>">
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


                            <div id="dimensions" class=" col s6 offset-s3">
                                <table class="responsive-table centered highlight">

                                    <thead>
                                    <tr>
                                        <th>
                                            <a <?= sorter_activator('dimensions')?> href="material.php?s=dimensions">Dimensions</a>
                                        </th>
                                        <th><span class="hide">Delete</span></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $dimensions = find_all('dimensions','dimensions');
                                    foreach($dimensions as $dimension) :
                                    ?>
                                        <form action="material.php" method="post" role="form">
                                            <tr>
                                                <td><?= $dimension['dimensions'] ?></td>
                                                <td>
                                                    <input type="hidden" name="id" value="<?= $dimension['id'] ?>">
                                                    <button type="submit" name="drop_dimension" style="margin-left: 10px"
                                                            class="btn-floating  red accent-4 waves-effect waves-light">
                                                        <i class="mdi-content-remove"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php endforeach ?>
                                    </tbody>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- /.section -->
    </section>

<?php require_once "../layouts/admin_footer.php"; ?>
