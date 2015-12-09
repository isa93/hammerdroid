<?php

require_once LIB_PATH . DS . "database.php";

function load_city(){
    $_POST =  array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id)){
        $message = "";

        empty($id) ? $message .= "Id can't be empty!" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($city = find_by_id('cities',$id)) == FALSE ? $message .= "Wrong city!\n" : null;

        if(empty($message)){
            $_POST = $city;
            $_POST['load_complete'] = true;
            return [true];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

function add_city(){
    $_POST =  array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($name_srb) && isset($name_hun) && isset($name_eng) && isset($id_countries) && isset($altitude) && isset($wind_force)){
        $message = "";

        empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
        empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
        empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;
        empty($id_countries) ? $message .= "Select a country!\n" : null;
        !empty($id_countries) && ($check = find_by_id('countries',$id_countries)) == FALSE ? $message .="Wrong country selected!\n" : null;
        empty($altitude) ? $message .= "Fill in the altitude field!\n" : null;
        !empty($altitude) && !is_numeric($altitude) ? $message .= "Altitude must be numeric!\n" : null;
        empty($wind_force) ? $message .= "Fill in the wind force field!\n" : null;
        !empty($wind_force) && !is_numeric($wind_force) ? $message .= "Wind fore must be numeric!\n" : null;

        if(empty($message)){
            $sql = "INSERT INTO cities (id_countries, name_srb, name_hun, name_eng, altitude, wind_force) ";
            $sql .= "VALUES (";
            $sql .= "'{$id_countries}', ";
            $sql .= "'{$name_srb}', ";
            $sql .= "'{$name_hun}', ";
            $sql .= "'{$name_eng}', ";
            $sql .= "'{$altitude}', ";
            $sql .= "'{$wind_force}')";

            query($sql);
            return affected_rows() ? [true] : [false,"Database insert failed!"];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

function modify_city(){
    $_POST =  array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id) && isset($name_srb) && isset($name_hun) && isset($name_eng) && isset($id_countries) && isset($altitude) && isset($wind_force)){
        $message = "";

        empty($id) ? $message .= "Id can't be empty!" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($city = find_by_id('cities',$id)) == FALSE ? $message .= "Wrong user!\n" : null;
        empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
        empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
        empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;
        empty($id_countries) ? $message .= "Select a country!\n" : null;
        !empty($id_countries) && ($check = find_by_id('countries',$id_countries)) == FALSE ? $message .="Wrong country selected!\n" : null;
        empty($altitude) ? $message .= "Fill in the altitude field!\n" : null;
        !empty($altitude) && !is_numeric($altitude) ? $message .= "Altitude must be numeric!\n" : null;
        empty($wind_force) ? $message .= "Fill in the wind force field!\n" : null;
        !empty($wind_force) && !is_numeric($wind_force) ? $message .= "Wind fore must be numeric!\n" : null;

        if(empty($message)){
            $sql = "UPDATE cities SET ";
            $sql .= "name_srb='{$name_srb}', ";
            $sql .= "name_hun='{$name_hun}', ";
            $sql .= "name_eng='{$name_eng}', ";
            $sql .= "id_countries='{$id_countries}', ";
            $sql .= "altitude='{$altitude}', ";
            $sql .= "wind_force='{$wind_force}' ";
            $sql .= "WHERE id='{$id}'";

            query($sql);
            return affected_rows() ? [true] : [false, "Database update failed!"];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

function delete_city(){
    $_POST =  array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id)){
        $message = "";

        empty($id) ? $message = "Id can't be empty!\n" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($city = find_by_id('cities',$id)) == FALSE ? $message .= "Wrong city!\n" : null;

        if(empty($message)){
            $sql = "DELETE FROM cities ";
            $sql .= "WHERE id='{$id}' ";
            $sql .= "LIMIT 1";

            query($sql);
            return affected_rows() ? [true] : [false, "Database delete failed!"];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

/* _________________________ COUNTRY __________________________*/

function load_country(){
    $_POST =  array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id)){
        $message = "";

        empty($id) ? $message .= "Id can't be empty!" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($city = find_by_id('countries',$id)) == FALSE ? $message .= "Wrong city!\n" : null;

        if(empty($message)){
            $_POST = $city;
            $_POST['load_complete'] = true;
            return [true];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

function add_country(){
    $_POST = array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($name_srb) && isset($name_hun) && isset($name_eng)) {
        $message = "";

        empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
        empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
        empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;

        if (empty($message)) {
            $sql = "INSERT INTO countries (name_srb, name_hun, name_eng) ";
            $sql .= "VALUES (";
            $sql .= "'{$name_srb}', ";
            $sql .= "'{$name_hun}', ";
            $sql .= "'{$name_eng}')";

            query($sql);
            return affected_rows() ? [true] : [false, "Database insert failed!"];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

function modify_country(){
    $_POST = array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id) && isset($name_srb) && isset($name_hun) && isset($name_eng)){
        $message = "";

        empty($id) ? $message .= "Id can't be empty!\n" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($city = find_by_id('countries',$id)) == FALSE ? $message .= "Wrong country!\n" : null;
        empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
        empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
        empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;

        if(empty($message)){
            $sql = "UPDATE countries SET ";
            $sql .= "name_srb='{$name_srb}', ";
            $sql .= "name_hun='{$name_hun}', ";
            $sql .= "name_eng='{$name_eng}' ";
            $sql .= "WHERE id='{$id}'";

            query($sql);
            return affected_rows() ? [true] : [false, "Database update failed!"];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

function delete_country(){
    $_POST = array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id)){
        $message = "";

        empty($id) ? $message = "Id can't be empty!\n" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($city = find_by_id('countries',$id)) == FALSE ? $message .= "Wrong country!\n" : null;

        if(empty($message)){
            $sql = "DELETE FROM countries ";
            $sql .= "WHERE id='{$id}' ";
            $sql .= "LIMIT 1";

            query($sql);
            return affected_rows() ? [true] : [false, "Database delete failed!"];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}