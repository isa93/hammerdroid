<?php

function redirect_to($location = NULL)
{
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}

function output_message($message = "")
{
    $output = "";
    if (!empty($message)) {
        $output .= "<div class='chip-holder'>";
        if (strrpos($message, "\n")===FALSE) {
            $output .= "<div class=\"chip red accent-3 white-text right z-depth-1\"><span>{$message}</span><i class=\"material-icons\">close</i></div>";
        } else {
            $messages = explode("\n", $message);
//            var_dump($messages);exit;
            foreach ($messages as $messageItem) {
                !empty($messageItem) ? $output .= "<div class=\"chip red accent-3 white-text right z-depth-1\"><span>{$messageItem}</span><i class=\"material-icons\">close</i></div>" : null;
            }
        }
        $output .= "</div>";
        return $output;
    } else return $output;
}

function dump($expr){
    echo "<pre>";
        var_dump($expr);
    echo "</pre>";
}

function check_mail($email){
    return filter_var($email,FILTER_VALIDATE_EMAIL) ? filter_var($email,FILTER_SANITIZE_EMAIL) : false;
}

function trim_value(&$value){
    $value = trim($value);
    return true;
}

function make_date($year,$month,$day){
    return implode('-',[$year,$month,$day]);
}

function sorter($table,$default){
    global $page;
    if(isset($_GET['s'])){
        $sort = get_sort_param(strtolower($_GET['s']));
        $table = maxLengths($table);
        $keys = array_keys($table);
        return !in_array($sort,$keys) ? $default : $sort;
    }else{
//        $uri = $_SERVER['REQUEST_URI'];
//        $uri = substr($uri,strrpos($uri,"/"));
//        redirect_to($uri."?s=".$default);
        return $default;
    }
}
function sorter_activator($item){
    global $sort;
    $item = get_sort_param($item);
    isset($_GET['s']) ? $param = get_sort_param($_GET['s']) : $param="";
    return (empty($param) && $sort==$item) || (!empty($param) && $param==$item) ?
        "class=\"sort\"" : null;
}

function get_sort_param($value){
    $value = escape_value(trim($value));
    $value = str_replace(" ","_",$value);

    $value == "hun" || $value=="srb" || $value=="eng" ? $value="name_".$value : null;
    $value == "country" ? $value = "id_countries" : null;
    $value == "group" ? $value = "id_groups" : null;
    $value == "wind" ? $value = "wind_force" : null;

    $value == "dimensions" ? $value = "id_dimensions" : null;
    $value == "a" || $value == "wx" || $value == "wy" || $value == "ix" || $value == "iy" || $value == "jx" || $value=="jy" || $value=="s" ?
        ucfirst($value) : null;

    return $value;
}
