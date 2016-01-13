<?php

require_once LIB_PATH . DS . "database.php";

function authenticate($user, $password,$admin = false)
{
    ($mail = check_mail($user)) ? $mail = escape_value($mail) : $user = escape_value($user);
    $password = escape_value($password);

    $mail ? $m_check = check_maxLength($mail, 'users', 'email') : $u_check = check_maxLength($user, 'users', 'username');
    $p_check = check_maxLength($password, 'users', 'password');

    if (($mail ? array_shift($m_check) : array_shift($u_check)) && array_shift($p_check)) {

        $sql = "SELECT id FROM ";
        $admin===false ? $sql.= "clients" : $sql.= "users";
        $sql .= " WHERE ";
        $sql .= "password='" . hash_password($password) . "' AND ";
        $mail ? $sql .= "email='{$mail}' " : $sql .= "username='{$user}' ";
        $sql .= "LIMIT 1 ";

        $result = find_by_sql($sql);
        return !empty($result) ? [true, array_shift($result[0])] : [false, "Authentication failed! Please try again!"];
    } else {
        $output = [];
        isset($m_check[0]) ? is_string($m_check[0]) ? $output = array_merge($output, $m_check) : null : null;
        isset($u_check[0]) ? is_string($u_check[0]) ? $output = array_merge($output, $u_check) : null : null;
        is_string($p_check[0]) ? $output = array_merge($output, $p_check) : null;
        return [false, implode("\n", $output)];
    }

//
//    $sql = "SELECT id FROM users WHERE ";
//    $sql .= "password='{$password}' AND ";
//    if(!$mail) {
//        $sql .= "username='{$user}' ";
//    } else {
//        $sql .= "email='{$mail}' ";
//    }
//    $sql.= "LIMIT 1 ";
//
//    $result = find_by_sql($sql);
//    return !empty($result) ? [true, array_shift($result[0])] : [false,"Authentication failed! Please try again!"] ;

}

function add_user($admin= false)
{
    global $WORLD_COUNTRIES;
    $_POST = array_filter($_POST, 'clean');

    isset($_FILES['image']) ? $image = $_FILES['image'] : $image = "";
    $image_check = save_image($image);

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($first_name) && isset($last_name) && isset($country) && isset($year) && isset($month) && isset($day) && isset($username) && isset($email) && isset($password) && isset($re_password)){
        $message = "";

        empty($first_name) ? $message .= "Fill in the first name field!\n" : null;
        empty($last_name) ? $message .= "Fill in the last name field!\n" : null;
        empty($country) ? $message .= "Select a country!\n" : null;
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
            $sql = "INSERT INTO ";
            $admin ? $sql .= "users" : $sql .= "clients";
            $sql .= " (username, email, password, first_name, last_name, country, birth_date, image, created_at) ";
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
    } else return [false,"Wrong parameters!"];
}

function modify_user(){

    global $WORLD_COUNTRIES;
    $_POST = array_filter($_POST, 'clean');

    isset($_FILES['image']) ? $image = $_FILES['image'] : $image = "";

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id) && isset($first_name) && isset($last_name) && isset($country) && isset($year) && isset($month) && isset($day) && isset($username) && isset($email) && isset($password) && isset($new_password) && isset($re_new_password)) {
        $message = "";

        empty($id) ? $message .= "Id can't be empty!" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($user = find_by_id('users',$id)) == FALSE ? $message .= "Wrong user!\n" : null;
        empty($first_name) ? $message .= "Fill in the first name field!\n" : null;
        empty($last_name) ? $message .= "Fill in the last name field!\n" : null;
        empty($country) ? $message .= "Select a country!\n" : null;
        !empty($country) && !in_array(html_entity_decode($country),$WORLD_COUNTRIES) ? $message .= "Wrong country selected!\n" : null;
        $country = htmlentities($country,ENT_QUOTES);
        empty($year) ? $message .= "Select birth year!\n" : null;
        !empty($year) && $year > date('Y') && $year < date('Y') - 100 ? $message .= "Wrong year selected!\n" : null;
        empty($month) ? $message .= "Select a birth month!\n" : null;
        !empty($month) && $month < 1 && $month > 12 ? $message .= "Wrong month selected!\n" : null;
        empty($day) ? $message .= "Select a birth day!\n" : null;
        !empty($day) && $day < 1 && $day > 31 ? $message .= "Wrong day selected!\n" : null;
        !check_username($id,$username) ? !check_username_availability($username) ? $message .= "Username already taken!\n" : null : null;
        empty($email) ? $message.= "Fill in the e-mail field!\n" : null;
        !empty($email) && !check_mail($email) ? $message .= "Not a valid email address!\n" : null;
        empty($password) ? $message .= "Fill in the password field!\n" : null;
        !empty($password)  && $new_password !== $re_new_password ? $message .= "Incorrect password combination!\n" : null;

        if(empty($message)){
            $auth = authenticate($email,$password,true);
            if(array_shift($auth)===TRUE){
//            dump($image);exit;
                ($old_image = get_image('users',$auth[0])) != 'default.jpg' ?
                    $new_image = update_image($old_image,$image) :
                    $new_image = save_image($image);
                if(!is_string($new_image)){

                    $sql = "UPDATE users SET ";
                    array_shift($new_image)==TRUE ? $sql .= "image='".array_shift($new_image)."', " : null;
                    $sql .= "first_name='{$first_name}', ";
                    $sql .= "last_name='{$last_name}', ";
                    $sql .= "country='{$country}', ";
                    $sql .= "birth_date='".make_date($year,$month,$day)."', ";
                    !empty($username) ? $sql .= "username='{$username}', " : null;
                    $sql .= "email='{$email}', ";
                    !empty($new_password) ? $sql .= "password='".hash_password($new_password)."', " : null;
                    $sql .= "updated_at=now() ";
                    $sql .= "WHERE id='{$auth[0]}'";

                    query($sql);
                    return affected_rows() ? [true] : [false,"Database update failed!"];
                } else return [false,$new_image];
            } else return [false,array_shift($auth)];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

function delete_user(){
    $_POST = array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id)){
        $message = "";

        empty($id) ? $message = "Id can't be empty!\n" : null;
        $id==1 ? $message .= "Can't delete superuser account!\n" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;

        if(empty($message)){
            $image_check = delete_image(get_image('users',$id));
            if($image_check == true){
                $sql = "DELETE from users ";
                $sql .= "WHERE id='{$id}' ";
                $sql .= "LIMIT 1";

                query($sql);
                return affected_rows() ? [true] : [false, "Database delete failed!"];
            } else return [false,$image_check];
        } else return [false,$message];
    } else return [false,"Wrong parameters!"];
}
function check_superuser(){
    $_SESSION['user_id']==1 ? null : redirect_to('index.php');
}

function get_superuser_status(){
    return $_SESSION['user_id']==1 ? true : false;
}

function check_username($id,$username){
    $user = find_by_sql("SELECT username FROM users WHERE id='{$id}'");
    return array_shift($user[0])==$username ? true : false;
}

function check_username_availability($username)
{
    $user = find_by_sql("SELECT id FROM users WHERE username='{$username}'");
    return empty($user) ? true : false;
}

function hash_password($password)
{
    $salt = generate_salt($password);
    return hash('sha256', $salt . $password . $salt) . hash('sha512', $salt . $password . $salt) . hash('sha256', $salt . $password . $salt);
}

function generate_salt($string)
{
    $i = ceil(strlen($string) / 2);
    $string_l = substr($string, 0, $i);
    $string_r = substr($string, $i);
    return hash('sha256', SYSTEM_SALT . $string_l . SYSTEM_SALT . $string_r . SYSTEM_SALT);
}

//function get_user_image($id)
//{
//    $sql = "SELECT image FROM users WHERE id='{$id}'";
//    $result = find_by_sql($sql);
//    $result = array_shift($result);
//    if ($result[0] !== null) {
//        return array_shift($result);
//    } else return 'default.jpg';
//}

function get_user_name($id,$admin = true)
{
    $sql = "SELECT first_name,last_name FROM ";
    $admin ? $sql .= "users" : $sql .= "clients";
    $sql .= " WHERE id='{$id}'";
    $result = find_by_sql($sql);
    $result = array_shift($result);
    return $result['first_name'] . " " . $result['last_name'];
}

