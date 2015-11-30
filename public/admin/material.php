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

$sort = sorter('id_dimensions');
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
                                    <input type="number" step="0.01" name="ix" id="ix" value="">
                                    <label for="ix">Ix</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" step="0.01" name="iy" id="iy" value="">
                                    <label for="iy">Iy</label>
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
                                        <tr>
                                            <td><?php $dimension = find_by_id('dimensions',$material['id_dimensions']);echo $dimension['dimensions'];?></td>
                                            <td><?= $material['s (mm)'] ?></td>
                                            <td><?= $material['A'] ?></td>
                                            <td><?= $material['Wx'] ?></td>
                                            <td><?= $material['Wy'] ?></td>
                                            <td><?= $material['Ix'] ?></td>
                                            <td><?= $material['Iy'] ?></td>
                                            <td><?= $material['Jx'] ?></td>
                                            <td><?= $material['Jy'] ?></td>
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
