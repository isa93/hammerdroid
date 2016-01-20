<?php
/**
 * @var $type
 * @var $page
 */
$lang = get_lang();
include SITE_ROOT . DS . DOMAIN . DS . 'user' . DS . 'lang' . DS . array_pop($lang);
$lang = array_shift($lang);

switch ($type) {
    case 'pre_login':
        ?>
        <div id="header">
            <div id='cssmenu'>
                <ul>
                    <li><a href='index.php'><span><i>Home</i></span></a></li>
                    <li><a href='project.php'><span><i>Project</i></span></a></li>
                    <li><a href='team.php'><span><i>Team</i></span></a></li>
                </ul>
            </div>

            <div id='settings' style="width: 100px !important;">
                <ul>
                    <li class='active has-sub'><a href='#'><span><i>Sign in</i></span></a>
                        <ul>
                            <li class='has-sub'>
                                <a href='login.php'><span><i>Login</i></span></a>
                            </li>
                            <li class='has-sub'>
                                <a href="register.php"><span><i>Register</i></span></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <?php
        break;
    case 'post_login' :
        ?>
        <div class="animated fadeInUp"><?php echo TITLE?> <?= get_user_name($_SESSION['user_id'],false) ?>!</div>

        <div id="slide">
            <div class="example">
                <ul id="nav">
                    <li><a href="index.php?lang=<?= $lang ?>"><?= HEADER1 ?></a>
                    <li><a href="profile.php?lang=<?= $lang ?>"><?= HEADER2 ?></a>

                        <div>
                            <ul>
                                <li><a href="profile.php?lang=<?= $lang ?>"><?= HEADER2_1 ?></a></li>
                                <li><a href="edit_profile.php?lang=<?= $lang ?>"><?= HEADER2_2 ?></a></li>
                            </ul>
                        </div>
                    </li>
<!--                    <li><a href="index.php?lang=--><?//= $lang ?><!--">--><?//= LINK2 ?><!--</a>-->
<!---->
<!--                        <div>-->
<!--                            <ul>-->
<!--                                <li><a href="http://www.script-tutorials.com/category/php/">PHP</a></li>-->
<!--                                <li><a href="http://www.script-tutorials.com/category/mysql/">MySQL</a></li>-->
<!--                                <li><a href="http://www.script-tutorials.com/category/xslt/">XSLT</a></li>-->
<!--                                <li><a href="http://www.script-tutorials.com/category/ajax/">Ajax</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </li>-->
                    <li><a href="#"><?php echo HEADER3 ?></a>

                        <div>
                            <ul>
                                <li><a href="<?= $page ?>.php?lang=en"><?= HEADER3_1 ?> </a> <img
                                        src="../images/en_flag.png" height="19" width="30"/></li>
                                <li><a href="<?= $page ?>.php?lang=hu"><?= HEADER3_2 ?> </a> <img
                                        src="../images/hu_flag.gif" height="19" width="30"/></li>
                                <li><a href="<?= $page ?>.php?lang=rs"><?= HEADER3_3 ?> </a> <img
                                        src="../images/sr_flag.png" height="19" width="30"/></li>
                            </ul>
                        </div>
                    </li>
                    <li><a id="logout" href="logout.php"><?php echo HEADER4 ?></a></li>
                    <li class="pad"></li>
                </ul>
            </div>
        </div>
        <div id="animated-example" class="loading bounceOut">
            <div class="windows8">
                <div class="wBall" id="wBall_1">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_2">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_3">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_4">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_5">
                    <div class="wInnerBall"></div>
                </div>
            </div>
        </div>
        <?php
        break;
    default:
        echo "Unknown view file!";
        break;
}
