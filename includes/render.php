<?php

function render($file,$page){
    switch($file):
        case 'admin_nav':

            $image = get_user_image($_SESSION['user_id']);
            $image_path = '../images/user/'. $image;
            $name = get_user_name($_SESSION['user_id']);
            include SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . 'admin_nav.php';
            break;
        case 'user_nav':

            include SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . 'user_nav.php' ;
            break;
        default:
            output_message("Wrong file name!");
            break;
    endswitch;
}