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
}

function make_date($year,$month,$day){
    return implode('-',[$year,$month,$day]);
}

function sorter(){
    if(isset($_GET['s'])){
        $sort = get_sort_param($_GET['s']);
        $table = maxLengths('cities');
        $keys = array_keys($table);
        return !in_array($sort,$keys) ? 'name_srb' : $sort;
    }else return 'name_srb';
}
function sorter_activator($item){
    $item = get_sort_param($item);
    isset($_GET['s']) ? $param = get_sort_param($_GET['s']) : $param="";
    return !empty($param) && $param==$item ? "class=\"sort\"" : null;
}

function get_sort_param($value){
    $value = escape_value(trim($value));
    $value = str_replace(" ","_",$value);

    $value == "hun" || $value=="srb" || $value=="eng" ? $value="name_".$value : null;
    $value == "country" ? $value = "id_country" : null;
    $value == "group" ? $value = "id_group" : null;
    $value == "wind" ? $value = "wind_force" : null;

    return $value;
}
