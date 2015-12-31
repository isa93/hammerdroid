<?php

require_once LIB_PATH . DS . "database.php";

function add_client(){
    global $WORLD_COUNTRIES;
    $_POST = array_filter($_POST,'clean');

    isset($_FILES['image']) ? $image = $_FILES['image'] : $image = "";
    $image_check = save_image($image);

    foreach($_POST as $var => $value)
        $$var = $value;

    if(isset($first_name) && isset($last_name) && isset($country) && isset($year) && isset($month) && isset($day) && isset($username) && isset($email) && isset($password) && isset($re_password)){
        $message = "";

        empty($first_name) ? $message .= "Fill in the first name field!\n" : null;
        empty($last_name) ? $message .= "Fill in the last name field!\n" : null;
        !empty($country) && !in_array(html_entity_decode($country),$WORLD_COUNTRIES) ? $message .= "Wrong country selected!\n" : null;
        $country = htmlentities($country,ENT_QUOTES);
        empty($year) ? $message .= "Select birth year!\n" : null;
        !empty($year) && $year > date('Y') && $year < date('Y') - 100 ? $message .= "Wrong year selected!\n" : null;
        empty($month) ? $message .= "Select a birth month!\n" : null;
        !empty($month) && $month < 1 && $month > 12 ? $message .= "Wrong month selected!\n" : null;
        empty($day) ? $message .= "Select a birth day!\n" : null;
        !empty($day) && $day < 1 && $day > 31 ? $message .= "Wrong day selected!\n" : null;
        !check_username_availability($username) ? $message .= "Username already taken!\n" : null;
        empty($email) ? $message.= "Fill in the e-mail field!\n" : null;
        !empty($email) && !check_mail($email) ? $message .= "Not a valid email address!\n" : null;
        empty($password) || empty($re_password) ? $message .= "Fill in the password fields!\n" : null;
        !empty($password) && !empty($re_password) && $password !== $re_password ? $message .= "Incorrect password combination!\n" : null;

        if (empty($message)) {
            $sql = "INSERT INTO clients (username, email, password, first_name, last_name, country, birth_date, image, created_at) ";
            $sql .= "VALUES (";
            empty($username) ? $sql .= "NULL, " : $sql .= "'{$username}', ";
            $sql .= "'{$email}', ";
            $sql .= "'".hash_password($password)."', ";
            $sql .= "'{$first_name}', ";
            $sql .= "'{$last_name}', ";
            $sql .= "'{$country}', ";
            $sql .= "'".make_date($year,$month,$day)."', ";
            is_array($image_check) && array_shift($image_check)===true ? $sql.= "'".array_shift($image_check)."', " : $sql .= "NULL, ";
            $sql .= "now() )";

            query($sql);
            return affected_rows() ? [true] : [false,"Database insert failed!"];
        } else return [false, $message];
    } else return [false, "Wrong parameters!"];
}

function modify_client(){

}

function delete_client(){
    $_POST = array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id)){
        $message = "";

        empty($id) ? $message = "Id can't be empty!\n" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;

        if(empty($message)){
            $image_check = delete_image(get_image('clients',$id));
            if($image_check == true){
                $sql = "DELETE from clients ";
                $sql .= "WHERE id='{$id}' ";
                $sql .= "LIMIT 1";

                query($sql);
                return affected_rows() ? [true] : [false, "Database delete failed!"];
            } else return [false,$image_check];
        } else return [false,$message];
    } else return [false,"Wrong parameters!"];
}