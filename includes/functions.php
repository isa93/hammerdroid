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