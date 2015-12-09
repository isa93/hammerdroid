<?php

require_once LIB_PATH . DS . "database.php";

function add_dimension($data){
    $data = escape_value($data);

    $sql = "INSERT INTO dimensions (dimensions) VALUES ('{$data}')";

    query($sql);
    return affected_rows() ? [true,insert_id()] : [false,"Database insert failed!"];
}

function delete_dimension(){
    $_POST = array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id)){
        $message = "";

        empty($id) ? $message = "Id can't be empty!\n" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($dimension = find_by_id('dimensions',$id)) == FALSE ? $message .= "Wrong dimension!\n" : null;

        if(empty($message)){
            $sql = "DELETE FROM dimensions ";
            $sql .= "WHERE id='{$id}' ";
            $sql .= "LIMIT 1";

            query($sql);
            return affected_rows() ? [true] : [false, "Database delete failed!"];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

/* _____________________________ MATERIAL ____________________*/

function load_material(){
    $_POST = array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id)){
        $message = "";

        empty($id) ? $message .= "Id can't be empty!" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($material = find_by_id('data',$id)) == FALSE ? $message .= "Wrong material!\n" : null;

        $post = [];
        foreach($material as $key => $value)
            $post[strtolower($key)] = $value;

        if(empty($message)){
            $_POST = $post;
            $_POST['load_complete'] = true;
            return [true];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}

function add_material(){
    $_POST = array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($new_dimensions) && isset($id_dimensions) && isset($s) && isset($a) && isset($wx) && isset($wy) && isset($ix) && isset($iy) && isset($jx) && isset($jy)){
        $message = "";
        $dimension = "";

        if(!empty($new_dimensions)){
            $dimension = add_dimension($new_dimensions);
            array_shift($dimension) == false ? $message .= array_shift($dimension) : $dimension = array_shift($dimension);
        } else {
            empty($id_dimensions) ? $message .= "Select a dimension!\n" : $dimension = $id_dimensions;
        }
        empty($s) ? $message .= "Fill in the S field!\n" : null;
        !empty($s) && !is_numeric($s) ? $message .= "S must be numeric!\n" : null;
        empty($a) ? $message .= "Fill in the A field!\n" : null;
        !empty($a) && !is_numeric($a) ? $message .= "A must be numeric!\n" : null;
        empty($wx) ? $message .= "Fill in the W<sub>x</sub> field!\n" : null;
        !empty($wx) && !is_numeric($wx) ? $message .= "W<sub>x</sub> must be numeric!\n" : null;
        empty($wy) ? $message .= "Fill in the W<sub>y</sub> field!\n" : null;
        !empty($wx) && !is_numeric($wy) ? $message .= "W<sub>y</sub> must be numeric!\n" : null;
        empty($ix) ? $message .= "Fill in the I<sub>x</sub> field!\n" : null;
        !empty($ix) && !is_numeric($ix) ? $message .= "I<sub>x</sub> must be numeric!\n" : null;
        empty($iy) ? $message .= "Fill in the I<sub>y</sub> field!\n" : null;
        !empty($iy) && !is_numeric($ix) ? $message .= "I<sub>y</sub> must be numeric!\n" : null;
        empty($jx) ? $message .= "Fill in the J<sub>x</sub> field!\n" : null;
        !empty($jx) && !is_numeric($jx) ? $message .= "J<sub>x</sub> must be numeric!\n" : null;
        empty($jy) ? $message .= "Fill in the J<sub>y</sub> field!\n" : null;
        !empty($jy) && !is_numeric($jy) ? $message .= "J<sub>y</sub> must be numeric!\n" : null;

        if(empty($message)){
            $sql = "INSERT INTO data (id_dimensions, S, A, Wx, Wy, Ix, Iy, Jx, Jy) ";
            $sql .= "VALUES (";
            $sql .= "'{$dimension}', ";
            $sql .= "'{$s}', ";
            $sql .= "'{$a}', ";
            $sql .= "'{$wx}', ";
            $sql .= "'{$wy}', ";
            $sql .= "'{$ix}', ";
            $sql .= "'{$iy}', ";
            $sql .= "'{$jx}', ";
            $sql .= "'{$jy}')";

            query($sql);
            return affected_rows() ? [true] : [false,"Database insert failed!"];
        } else return [false,$message];
    } else return [false,"Wrong parameters!"];
}

function modify_material(){
    $_POST = array_filter($_POST, 'clean');

//    dump($_POST);exit;
    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id) && isset($new_dimensions) && isset($id_dimensions) && isset($s) && isset($a) && isset($wx) && isset($wy) && isset($ix) && isset($iy) && isset($jx) && isset($jy)) {
        $message = "";
        $dimension = "";

        empty($id) ? $message .= "Id can't be empty!\n" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($material = find_by_id('data',$id)) == FALSE ? $message .= "Wrong material!\n" : null;
        if(!empty($new_dimensions)){
            $dimension = add_dimension($new_dimensions);
            array_shift($dimension) == false ? $message .= array_shift($dimension) : $dimension = array_shift($dimension);
        } else {
            empty($id_dimensions) ? $message .= "Select a dimension!\n" : $dimension = $id_dimensions;
        }
        empty($s) ? $message .= "Fill in the S field!\n" : null;
        !empty($s) && !is_numeric($s) ? $message .= "S must be numeric!\n" : null;
        empty($a) ? $message .= "Fill in the A field!\n" : null;
        !empty($a) && !is_numeric($a) ? $message .= "A must be numeric!\n" : null;
        empty($wx) ? $message .= "Fill in the W<sub>x</sub> field!\n" : null;
        !empty($wx) && !is_numeric($wx) ? $message .= "W<sub>x</sub> must be numeric!\n" : null;
        empty($wy) ? $message .= "Fill in the W<sub>y</sub> field!\n" : null;
        !empty($wx) && !is_numeric($wy) ? $message .= "W<sub>y</sub> must be numeric!\n" : null;
        empty($ix) ? $message .= "Fill in the I<sub>x</sub> field!\n" : null;
        !empty($ix) && !is_numeric($ix) ? $message .= "I<sub>x</sub> must be numeric!\n" : null;
        empty($iy) ? $message .= "Fill in the I<sub>y</sub> field!\n" : null;
        !empty($iy) && !is_numeric($ix) ? $message .= "I<sub>y</sub> must be numeric!\n" : null;
        empty($jx) ? $message .= "Fill in the J<sub>x</sub> field!\n" : null;
        !empty($jx) && !is_numeric($jx) ? $message .= "J<sub>x</sub> must be numeric!\n" : null;
        empty($jy) ? $message .= "Fill in the J<sub>y</sub> field!\n" : null;
        !empty($jy) && !is_numeric($jy) ? $message .= "J<sub>y</sub> must be numeric!\n" : null;

        if(empty($message)){
            $sql = "UPDATE data SET ";
            $sql .= "id_dimensions='{$dimension}', ";
            $sql .= "S='{$s}', ";
            $sql .= "A='{$a}', ";
            $sql .= "Wx='{$wx}', ";
            $sql .= "Wy='{$wy}', ";
            $sql .= "Ix='{$ix}', ";
            $sql .= "Iy='{$iy}', ";
            $sql .= "Jx='{$jx}', ";
            $sql .= "Jy='{$jy}' ";
            $sql .= "WHERE id='{$id}'";

            query($sql);
            return affected_rows() ? [true] : [false,"Database update failed!"];
        } else return [false,$message];
    } else return [false,"Wrong parameters!"];
}

function delete_material(){
    $_POST = array_filter($_POST, 'clean');

    foreach ($_POST as $var => $value)
        $$var = $value;

    if(isset($id)){
        $message = "";

        empty($id) ? $message = "Id can't be empty!\n" : null;
        !empty($id) && !is_numeric($id) ? $message .= "Id must be numeric!\n" : null;
        ($material = find_by_id('data',$id)) == FALSE ? $message .= "Wrong material!\n" : null;

        if(empty($message)){
            $sql = "DELETE FROM data ";
            $sql .= "WHERE id='{$id}' ";
            $sql .= "LIMIT 1";

            query($sql);
            return affected_rows() ? [true] : [false, "Database delete failed!"];
        } else return [false, $message];
    } else return [false,"Wrong parameters!"];
}