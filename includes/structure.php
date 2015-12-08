<?php

require_once LIB_PATH . DS . "database.php";

function load_group(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');

    $message = "";
    empty($id) ? $message .= "Id can't be empty!" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($group = find_by_id('groups',$id)) == FALSE ? $message .= "Wrong group!\n" : null;

    if(empty($message)){
        $_POST = $group;
        $_POST['load_complete'] = true;
        return [true];
    } else return [false, $message];
}

function add_group(){
    array_filter($_POST, 'escape_value');

    $name_srb = filter_input(INPUT_POST, 'name_srb');
    $name_hun = filter_input(INPUT_POST, 'name_hun');
    $name_eng = filter_input(INPUT_POST, 'name_eng');

    $message = "";
    empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
    empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
    empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;

    if(empty($message)){
        $sql = "INSERT INTO groups (name_srb, name_hun, name_eng) ";
        $sql .= "VALUES (";
        $sql .= "'{$name_srb}', ";
        $sql .= "'{$name_hun}', ";
        $sql .= "'{$name_eng}')";

        query($sql);
        return affected_rows() ? [true] : [false,"Database insert failed!"];
    } else return [false, $message];
}

function modify_group(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');
    $name_srb = filter_input(INPUT_POST, 'name_srb');
    $name_hun = filter_input(INPUT_POST, 'name_hun');
    $name_eng = filter_input(INPUT_POST, 'name_eng');

    $message = "";
    empty($id) ? $message .= "Id can't be empty!" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($group = find_by_id('groups',$id)) == FALSE ? $message .= "Wrong group!\n" : null;
    empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
    empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
    empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;

    if(empty($message)){
        $sql = "UPDATE groups SET ";
        $sql .= "name_srb='{$name_srb}', ";
        $sql .= "name_hun='{$name_hun}', ";
        $sql .= "name_eng='{$name_eng}' ";
        $sql .= "WHERE id='{$id}'";

        query($sql);
        return affected_rows() ? [true] : [false, "Database update failed!"];
    } else return [false, $message];
}

function delete_group(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');

    $message = "";
    empty($id) ? $message = "Id can't be empty!\n" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($group = find_by_id('groups',$id)) == FALSE ? $message .= "Wrong group!\n" : null;

    if(empty($message)){
        $sql = "DELETE FROM groups ";
        $sql .= "WHERE id='{$id}' ";
        $sql .= "LIMIT 1";

        query($sql);
        return affected_rows() ? [true] : [false, "Database delete failed!"];
    } else return [false, $message];
}

/*___________________________ BUILDINGS ___________________*/

function load_building(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');

    $message = "";
    empty($id) ? $message .= "Id can't be empty!" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($building = find_by_id('buildings',$id)) == FALSE ? $message .= "Wrong building!\n" : null;

    if(empty($message)){
        $_POST = $building;
        $_POST['load_complete'] = true;
        return [true];
    } else return [false, $message];
}

function add_building(){
    array_filter($_POST, 'escape_value');

    $name_srb = filter_input(INPUT_POST, 'name_srb');
    $name_hun = filter_input(INPUT_POST, 'name_hun');
    $name_eng = filter_input(INPUT_POST, 'name_eng');
    $id_group = filter_input(INPUT_POST, 'id_groups');

    $message = "";
    empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
    empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
    empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;
    empty($id_group) ? $message .= "Select a group!\n" : null;
    !empty($id_group) && ($check = find_by_id('groups',$id_group)) == FALSE ? $message .= "Wrong group selected!\n" : null;

    if(empty($message)){
        $sql = "INSERT INTO buildings (name_srb, name_hun, name_eng, id_groups) ";
        $sql .= "VALUES (";
        $sql .= "'{$name_srb}', ";
        $sql .= "'{$name_hun}', ";
        $sql .= "'{$name_eng}', ";
        $sql .= "'{$id_group}') ";

        query($sql);
        return affected_rows() ? [true] : [false,"Database insert failed!"];
    } else return [false, $message];
}

function modify_building(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');
    $name_srb = filter_input(INPUT_POST, 'name_srb');
    $name_hun = filter_input(INPUT_POST, 'name_hun');
    $name_eng = filter_input(INPUT_POST, 'name_eng');
    $id_group = filter_input(INPUT_POST, 'id_groups');

    $message = "";
    empty($id) ? $message .= "Id can't be empty!" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($building = find_by_id('buildings',$id)) == FALSE ? $message .= "Wrong building!\n" : null;
    empty($name_srb) ? $message .= "Fill in the name(Serbian) filed!\n" : null;
    empty($name_hun) ? $message .= "Fill in the name(Hungarian) field!\n" : null;
    empty($name_eng) ? $message .= "Fill in the name(English) field!\n" : null;
    empty($id_group) ? $message .= "Select a group!\n" : null;
    !empty($id_group) && ($check = find_by_id('groups',$id_group)) == FALSE ? $message .= "Wrong group selected!\n" : null;

    if(empty($message)){
        $sql = "UPDATE buildings SET ";
        $sql .= "name_srb='{$name_srb}', ";
        $sql .= "name_hun='{$name_hun}', ";
        $sql .= "name_eng='{$name_eng}', ";
        $sql .= "id_groups='{$id_group}' ";
        $sql .= "WHERE id='{$id}'";

        query($sql);
        return affected_rows() ? [true] : [false, "Database update failed!"];
    } else return [false, $message];
}

function delete_building(){
    array_filter($_POST, 'escape_value');

    $id = filter_input(INPUT_POST,'id');

    $message = "";
    empty($id) ? $message = "Id can't be empty!\n" : null;
    !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
    ($building = find_by_id('buildings',$id)) == FALSE ? $message .= "Wrong building!\n" : null;

    if(empty($message)){
        $sql = "DELETE FROM buildings ";
        $sql .= "WHERE id='{$id}' ";
        $sql .= "LIMIT 1";

        query($sql);
        return affected_rows() ? [true] : [false, "Database delete failed!"];
    } else return [false, $message];
}