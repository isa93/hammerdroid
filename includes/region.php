<?php

require_once LIB_PATH . DS . "database.php";

function load_city(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');

    $message = "";
    empty($id) ? $message .= "Id can't be empty!" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($city = find_by_id('cities',$id)) == FALSE ? $message .= "Wrong city!\n" : null;

    if(empty($message)){
        $_POST = $city;
        $_POST['load_complete'] = true;
        return [true];
    } else return [false, $message];
}

function add_city(){
    array_filter($_POST, 'escape_value');

    $name_srb = filter_input(INPUT_POST, 'name_srb');
    $name_hun = filter_input(INPUT_POST, 'name_hun');
    $name_eng = filter_input(INPUT_POST, 'name_eng');
    $id_country = filter_input(INPUT_POST, 'id_country');
    $altitude = filter_input(INPUT_POST, 'altitude');
    $wind_force = filter_input(INPUT_POST, 'wind_force');

    $message = "";
    empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
    empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
    empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;
    empty($id_country) ? $message .= "Select a country!\n" : null;
    !empty($id_country) && ($check = find_by_id('countries',$id_country)) == FALSE ? $message .="Wrong country selected!\n" : null;
    empty($altitude) ? $message .= "Fill in the altitude field!\n" : null;
    !empty($altitude) && !is_numeric($altitude) ? $message .= "Altitude must be numeric!\n" : null;
    empty($wind_force) ? $message .= "Fill in the wind force field!\n" : null;
    !empty($wind_force) && !is_numeric($wind_force) ? $message .= "Wind fore must be numeric!\n" : null;

    if(empty($message)){
        $sql = "INSERT INTO cities (id_country, name_srb, name_hun, name_eng, altitude, wind_force) ";
        $sql .= "VALUES (";
        $sql .= "'{$id_country}', ";
        $sql .= "'{$name_srb}', ";
        $sql .= "'{$name_hun}', ";
        $sql .= "'{$name_eng}', ";
        $sql .= "'{$altitude}', ";
        $sql .= "'{$wind_force}')";

        query($sql);
        return affected_rows() ? [true] : [false,"Database insert failed!"];
    } else return [false, $message];
}

function modify_city(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');
    $name_srb = filter_input(INPUT_POST, 'name_srb');
    $name_hun = filter_input(INPUT_POST, 'name_hun');
    $name_eng = filter_input(INPUT_POST, 'name_eng');
    $id_country = filter_input(INPUT_POST, 'id_country');
    $altitude = filter_input(INPUT_POST, 'altitude');
    $wind_force = filter_input(INPUT_POST, 'wind_force');

    $message = "";
    empty($id) ? $message .= "Id can't be empty!" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($city = find_by_id('cities',$id)) == FALSE ? $message .= "Wrong user!\n" : null;
    empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
    empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
    empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;
    empty($id_country) ? $message .= "Select a country!\n" : null;
    !empty($id_country) && ($check = find_by_id('countries',$id_country)) == FALSE ? $message .="Wrong country selected!\n" : null;
    empty($altitude) ? $message .= "Fill in the altitude field!\n" : null;
    !empty($altitude) && !is_numeric($altitude) ? $message .= "Altitude must be numeric!\n" : null;
    empty($wind_force) ? $message .= "Fill in the wind force field!\n" : null;
    !empty($wind_force) && !is_numeric($wind_force) ? $message .= "Wind fore must be numeric!\n" : null;

    if(empty($message)){
        $sql = "UPDATE cities SET ";
        $sql .= "name_srb='{$name_srb}', ";
        $sql .= "name_hun='{$name_hun}', ";
        $sql .= "name_eng='{$name_eng}', ";
        $sql .= "id_country='{$id_country}', ";
        $sql .= "altitude='{$altitude}', ";
        $sql .= "wind_force='{$wind_force}' ";
        $sql .= "WHERE id='{$id}'";

        query($sql);
        return affected_rows() ? [true] : [false, "Database update failed!"];
    } else return [false, $message];
}

function delete_city(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');

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
}

/* _________________________ COUNTRY __________________________*/

function load_country(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');

    $message = "";
    empty($id) ? $message .= "Id can't be empty!" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($city = find_by_id('countries',$id)) == FALSE ? $message .= "Wrong city!\n" : null;

    if(empty($message)){
        $_POST = $city;
        $_POST['load_complete'] = true;
        return [true];
    } else return [false, $message];
}

function add_country(){
    array_filter($_POST, 'escape_value');

    $name_srb = filter_input(INPUT_POST, 'name_srb');
    $name_hun = filter_input(INPUT_POST, 'name_hun');
    $name_eng = filter_input(INPUT_POST, 'name_eng');

    $message = "";
    empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
    empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
    empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;

    if(empty($message)){
        $sql = "INSERT INTO countries (name_srb, name_hun, name_eng) ";
        $sql .= "VALUES (";
        $sql .= "'{$name_srb}', ";
        $sql .= "'{$name_hun}', ";
        $sql .= "'{$name_eng}')";

        query($sql);
        return affected_rows() ? [true] : [false,"Database insert failed!"];
    } else return [false, $message];
}

function modify_country(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');
    $name_srb = filter_input(INPUT_POST, 'name_srb');
    $name_hun = filter_input(INPUT_POST, 'name_hun');
    $name_eng = filter_input(INPUT_POST, 'name_eng');

    $message = "";
    empty($id) ? $message .= "Id can't be empty!" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($city = find_by_id('countries',$id)) == FALSE ? $message .= "Wrong user!\n" : null;
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
}

function delete_country(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');

    $message = "";
    empty($id) ? $message = "Id can't be empty!\n" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($city = find_by_id('countries',$id)) == FALSE ? $message .= "Wrong city!\n" : null;

    if(empty($message)){
        $sql = "DELETE FROM countries ";
        $sql .= "WHERE id='{$id}' ";
        $sql .= "LIMIT 1";

        query($sql);
        return affected_rows() ? [true] : [false, "Database delete failed!"];
    } else return [false, $message];
}