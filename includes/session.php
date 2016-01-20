<?php

session_start();

function check_login($admin = true)
{
    !isset($_SESSION['user_id']) ? $admin ? redirect_to('login.php') : redirect_to('../login.php') : null ;
    if(isset($_SESSION['user_activity']) && time() - $_SESSION['user_activity'] > SESSION_TIME * 60)
        $admin ? redirect_to('login.php?exp') : redirect_to('../login.php?exp');
    else $_SESSION['user_activity'] = time() ;
}

function login($admin = false)
{
//    $username = filter_input(INPUT_POST, 'username');
//    $password = filter_input(INPUT_POST, 'password');

    isset($_POST['username']) ? $username = $_POST['username'] : $username = "";
    isset($_POST['password']) ? $password = $_POST['password'] : $password = "";

    if($username && $password){
        $admin ?
            $user = authenticate($username, $password,true):
            $user = authenticate($username, $password);

        if (array_shift($user)) {
            $id = array_shift($user);

            $sql = "UPDATE ";
            $admin===false ? $sql .= "clients" : $sql .= "users";
            $sql .= " SET ";
            $sql .= "last_login=now() ";
            $sql .= "WHERE id='{$id}'";

            query($sql);
            if(affected_rows()){
                $_SESSION['user_id'] = $id;
                $_SESSION['user_activity'] = time();
                return [true];
            } else return [false,"Login failed! Please try again!"];
        } else return [false,array_shift($user)];

    } else return [false,"Username / password can't be empty!"];
}

function logout()
{
    close_connection();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_activity']);
    session_destroy();
}