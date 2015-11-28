<?php

session_start();

function check_login()
{
    isset($_SESSION['user_id']) ? null : redirect_to('login.php');
    isset($_SESSION['user_activity']) && time() - $_SESSION['user_activity'] < SESSION_TIME * 60 ? $_SESSION['user_activity'] = time() : redirect_to('login.php?exp');
}

function login()
{
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if($username && $password){
        $user = authenticate($username, $password);

        if (array_shift($user)) {
            $id = array_shift($user);

            $sql = "UPDATE users SET ";
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