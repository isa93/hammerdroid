<?php

function render($file,$page){
    $pre_login = ['index','project','team','login','register'];
    $post_login = ['home','profile','edit_profile'];

    switch($file):
        case 'admin_nav':
            $image = get_image('users',$_SESSION['user_id']);
            $image_path = '../images/user/'. $image;
            $name = get_user_name($_SESSION['user_id']);

            include SITE_ROOT . DS . DOMAIN . DS . 'layouts' . DS . 'admin_nav.php';
            break;
        case 'user_nav':
            $type = in_array($page,$pre_login) ? 'pre_login' : (in_array($page,$post_login) ? 'post_login' : null);
            $type == 'post_login' && $page == 'home' ? $page = 'index': null;

            include SITE_ROOT . DS . DOMAIN . DS . 'layouts' . DS . 'user_nav.php' ;
            break;
        case 'user_header':
            global $title;
            global $keywords;
            global $description;
            $style = in_array($page,$pre_login) ? 'style.css' : (in_array($page,$post_login) ? 'user.css' : null);

            if(isset($title) && isset($keywords) && isset($description))
                include SITE_ROOT . DS . DOMAIN . DS . 'layouts' . DS . 'user_header.php';
            else
                output_message('Missing variable! ($title,$keywords,$description)');
            break;
        default:
            output_message("Wrong file name!");
            break;
    endswitch;
}

function get_lang(){
    global $LANGUAGES;
    $lang = [];
    if(!isset($_GET['lang']) || !in_array($_GET['lang'],$LANGUAGES)){
        $lang[]= 'en';
        $lang[] = "en_lang.php";
    } else {
        $lang[] = $_GET['lang'];
        $lang[] = $_GET['lang'] . "_lang.php";
    }
    return $lang;
}