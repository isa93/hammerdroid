<?php
/**
 * @var $page
 * @var $image_path
 * @var $name
 */
?>
<header>

    <!-- ___________________________________________MAIN NAV_____________________________________________________________-->
    <div class="navbar-fixed">
        <nav class="blue accent-3">
            <div class="nav-wrapper">

                <a href="../admin/index.php" class="brand-logo center"><img class="navbar-logo"
                                                                            src="../images/logo-small.png"
                                                                            alt="Hammerdroid logo"></a>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right">
                    <li>
                        <a href="#" id="searchActivator"><i class="mdi-action-search"></i></a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-button navbar-profile " data-activates="profile-options">
                            <img src="<?= $image_path ?>" class="circle z-depth-1">
                        </a>
                    </li>

                </ul>

            </div>
        </nav>
    </div>

    <ul id="profile-options" class="dropdown-content text-blue">
        <li class="<?= $page == 'profile' ? 'active' : null ?>"><a href="profile.php" class="blue-text">View</a></li>
        <li class="<?= $page == 'edit_profile' ? 'active' : null ?>"><a href="edit_profile.php"
                                                                        class="blue-text">Edit</a></li>
        <li class="divider"></li>
        <li><a href="../admin/logout.php" class="blue-text">Logout</a></li>
    </ul>


    <!-- ________________________________________________SIDE NAV________________________________________________________-->
    <ul id="slide-out" class="side-nav fixed blue accent-3 z-depth-2">
        <li class="side-nav-header">
            <img src="<?= $image_path ?>" alt="Profile Image">

            <p class="white-text" style="font-size: 20px;text-shadow: 0 0 1px white">
                <?= $name ?>
            </p>
        </li>
        <li class="<?= $page == 'dashboard' ? 'active' : null ?>">
            <a href="../admin/index.php" class="white-text"><i class="material-icons">dashboard</i> Dashboard</a>
        </li>
        <?php if (get_superuser_status()): ?>
            <li class="no-padding <?= ($page == 'list_admin') || ($page == 'add_admin') || ($page == 'delete_admin') ? 'active' : null ?>">
                <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                    <li>

                        <a class="collapsible-header white-text <?= ($page == 'list_admin') || ($page == 'add_admin') || ($page == 'delete_admin') ? 'active' : null ?>">
                            <i class="material-icons">android</i>Admin<i class="mdi-navigation-arrow-drop-down right"></i>
                        </a>

                        <div class="collapsible-body blue accent-2">
                            <ul>
                                <li class="<?= $page == 'list_admin' ? 'active' : null ?>"><a href="list_admin.php"
                                                                                              class="white-text">List</a>
                                </li>
                                <li class="<?= $page == 'add_admin' ? 'active' : null ?>"><a href="add_admin.php"
                                                                                             class="white-text">Add</a>
                                </li>
                                <li class="<?= $page == 'delete_admin' ? 'active' : null ?>"><a href="delete_admin.php"
                                                                                                class="white-text">Delete</a>
                                </li>
                            </ul>
                        </div>

                    </li>
                </ul>
            </li>
        <?php endif; ?>
        <li class="no-padding <?= ($page == 'list_user') || ($page == 'add_user') || ($page == 'delete_user') ? 'active' : null ?>">
            <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                <li>

                    <a class="collapsible-header white-text <?= ($page == 'list_user') || ($page == 'add_user') || ($page == 'delete_user') ? 'active' : null ?>">
                        <i class="fa fa-user"></i>Client<i class="mdi-navigation-arrow-drop-down right"></i>
                    </a>

                    <div class="collapsible-body blue accent-2">
                        <ul>
                            <li class="<?= $page == 'list_client' ? 'active' : null ?>">
                                <a href="list_client.php" class="white-text">List</a>
                            </li>
                            <li class="<?= $page == 'add_client' ? 'active' : null ?>">
                                <a href="add_client.php" class="white-text">Add</a>
                            </li>
                            <li class="<?= $page == 'delete_client' ? 'active' : null ?>">
                                <a href="delete_client.php" class="white-text">Delete</a>
                            </li>
                        </ul>
                    </div>

                </li>
            </ul>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                <li>

                    <a class="collapsible-header white-text <?= ($page == 'city') || ($page == 'country') ? 'active' : null ?>">
                        <i class="fa fa-globe"></i>Region<i class="mdi-navigation-arrow-drop-down right"></i>
                    </a>

                    <div class="collapsible-body blue accent-2">
                        <ul>
                            <li class="<?= $page == 'city' ? 'active' : null ?>">
                                <a href="city.php" class="white-text">Cities</a>
                            </li>
                            <li class="<?= $page == 'country' ? 'active' : null ?>">
                                <a href="country.php" class="white-text">Countries</a>
                            </li>
                        </ul>
                    </div>

                </li>
            </ul>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                <li>

                    <a class="collapsible-header white-text <?= ($page == 'groups') || ($page == 'buildings') ? 'active' : null ?>">
                        <i class="fa fa-building"></i>Structure<i class="mdi-navigation-arrow-drop-down right"></i>
                    </a>

                    <div class="collapsible-body blue accent-2">
                        <ul>
                            <li class="<?= $page == 'groups' ? 'active' : null ?>">
                                <a href="groups.php" class="white-text">Groups</a>
                            </li>
                            <li class="<?= $page == 'buildings' ? 'active' : null ?>">
                                <a href="buildings.php" class="white-text">Buildings</a>
                            </li>
                        </ul>
                    </div>

                </li>
            </ul>
        </li>
        <li class="<?= $page == 'material' ? 'active' : null ?>">
            <a href="material.php" class="white-text"><i class="material-icons">build</i> Material</a>
        </li>
<!--        <li class="no-padding">-->
<!--            <ul class="collapsible collapsible-accordion" data-collapsible="accordion">-->
<!--                <li>-->
<!---->
<!--                    <a class="collapsible-header white-text --><?//= ($page == 'dimensions') || ($page == 'parameters') ? 'active' : null ?><!--">-->
<!--                        <i class="material-icons">build</i>Material<i class="mdi-navigation-arrow-drop-down right"></i>-->
<!--                    </a>-->
<!---->
<!--                    <div class="collapsible-body blue accent-2">-->
<!--                        <ul>-->
<!--                            <li class="--><?//= $page == 'dimensions' ? 'active' : null ?><!--">-->
<!--                                <a href="dimensions.php" class="white-text">Dimensions</a>-->
<!--                            </li>-->
<!--                            <li class="--><?//= $page == 'parameters' ? 'active' : null ?><!--">-->
<!--                                <a href="parameters.php" class="white-text">Parameters</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!---->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->

    </ul><!-- /SIDE NAV -->


    <!-- ________________________________________________SEARCH_________________________________________________________ -->
    <div id="search">
        <div class="container">
            <div class="row">
                <div class="card col s12 m8 offset-m2 l6 offset-l4 z-depth-1-half">
                    <div class="input-field">
                        <input id="searchField" type="text" class="col s9 m10" placeholder="Search...">
                        <label for="searchValue" class="hide">Search</label>

                        <div class="col s3 m2 right-align">
                            <button type="button" id="searchBtn"
                                    class="btn-floating btn-large waves-effect waves-light blue accent-2"
                                    style=""><i class="material-icons">search</i></button>
                        </div>
                    </div>
                </div>
                <div id="searchResult" class="card col s12 m8 offset-m2 l6 offset-l4 z-depth-1-half" style="">

                </div>
            </div>
        </div>
    </div>

</header>