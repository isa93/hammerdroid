<?php

require_once LIB_PATH . DS . "config.php";

function open_connection()
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
    if (!$connection) {
        die("Database connection failed! Error: " . mysqli_error($connection));
    } else {
        $db_select = mysqli_select_db($connection, DB_NAME);
        !$db_select ? die("Database selection failed! Error: " . mysqli_error($connection)) : null;
    }
    mysqli_query($connection, "SET NAMES utf8");
    mysqli_query($connection, "SET CHARACTER SET utf8");
    mysqli_query($connection, "SET COLLATION_CONNECTION='utf8_general_ci'");
    return $connection;
}

function close_connection()
{
    if (isset($connection)) {
        mysqli_close($connection);
        unset($connection);
        unset($conn);
    }
}

function query($sql)
{
    global $connection;
    $result = mysqli_query($connection, $sql);
    $result = confirm_query($result, $sql); // REMOVE at production grade
    return $result;
}

function confirm_query($result, $sql)
{
    global $connection;
    if (!$result) {
        $output = "Database query failed! Error: " . mysqli_error($connection) . "<br>";
        $output .= "Last query: " . $sql; // REMOVE at production grade
        die($output);
    } else return $result;
}

function affected_rows()
{
    global $connection;
    return mysqli_affected_rows($connection) == 1 ? true : false;
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function fetch_item($result){
    return mysqli_fetch_field($result);
}

function escape_value($value)
{
    global $connection;

    $value = strip_tags($value);
    while(is_int(strpos($value,"'"))){
        $value = str_replace("'","",$value);
    }
    while(is_int(strpos($value,chr(34)))){ // "
        $value = str_replace(chr(34),"",$value);
    }
    while(is_int(strpos($value,chr(47)))){ // /
        $value = str_replace(chr(47),"",$value);
    }
    while(is_int(strpos($value,"`"))){
        $value = str_replace("`","",$value);
    }
    while(is_int(strpos($value,"~"))){
        $value = str_replace("~","",$value);
    }
    while(is_int(strpos($value,";"))){
        $value = str_replace(";","",$value);
    }
    while(is_int(strpos($value,"*"))){
        $value = str_replace("*","",$value);
    }
    while(is_int(strpos($value,"%"))){
        $value = str_replace("%","",$value);
    }
    while(is_int(strpos($value,"$"))){
        $value = str_replace("$","",$value);
    }
    while(is_int(strpos($value,"<"))){
        $value = str_replace("<","",$value);
    }
    while(is_int(strpos($value,">"))){
        $value = str_replace(">","",$value);
    }
    $value = str_ireplace("drop","",$value);
    $value = str_ireplace("crypt","",$value);
    $value = str_ireplace("select","",$value);
    $value = str_ireplace("delete","",$value);
    $value = str_ireplace("insert","",$value);
    $value = str_ireplace("update","",$value);
    $value = str_ireplace("from","",$value);
    $value = stripslashes(stripslashes($value));


//    $magic_quotes = get_magic_quotes_gpc();
//    $real_escape_string = function_exists('mysqli_real_escape_string');
//
//    if ($real_escape_string) {
//        $magic_quotes ? $value = stripcslashes($value) : null;
//        $value = mysqli_real_escape_string($connection, $value);
//    } else {
//        $magic_quotes ? $value = addslashes($value) : null;
//    }

    return trim(mysqli_real_escape_string($connection,$value));
}

function clean(&$value){
    $value = escape_value($value);
    return true;
}

/*_______________________________________*/

function find_all($parent_table,$order="id")
{

    return find_by_sql("SELECT * FROM {$parent_table} ORDER BY {$order} ASC");


//    $order[0]=$order;
//    $keys = array_keys(maxLengths($parent_table));
//    $ibfk = [];
//    foreach($keys as $key){
//        $check = strpos($key,"id_");
//        $check !== false ? $ibfk[$key] = substr($key,3) : null;
//    }
//
//    $parent_array = find_by_sql("SELECT * FROM {$parent_table}");
//    if(!empty($ibfk)){
//        foreach($parent_array as $i => $item){
//            foreach($ibfk as $cell => $child_table){
//                $child_array = find_by_id($child_table,$item[$cell]);
//                dump($item);
//                $item['teszt'] = $child_array;
//            }
//        }
//    }
//
////    dump($parent_array);
//    exit;
//
//    $return = false;
//    $sort_array = [];
//    foreach($parent_array as $item){
//        foreach($item as $key => $value){
//            if(!isset($sort_array[$key])){
//                $sort_array[$key] = array();
//            }
//            $sort_array[$key][]=$value;
//        }
//    }
//    array_multisort($sort_array[$order],SORT_ASC,$parent_array);
//    $return = $parent_array;

//    if(!empty($ibfk)){
//        foreach($ibfk as $cell=>$child_table) {
//            $child_array = find_by_id($child_table,$parent_array[$cell]);
//            $sql = "SELECT " . substr($parent_table,0,3) . ".* FROM {$parent_table} " . substr($parent_table, 0, 3) . " ";
//            $sql .= "LEFT JOIN {$child_table} " . substr($child_table, 0, 3) .
//                " ON " . substr($parent_table, 0, 3) . ".{$cell} = " . substr($child_table, 0, 3) . ".id ";
//            $sql .= "UNION ";
//            $sql .= "SELECT " . substr($parent_table,0,3) . "* FROM {$parent_table} " . substr($parent_table, 0, 3) . " ";
//            $sql .= "RIGHT JOIN {$child_table} " . substr($child_table, 0, 3) .
//                " ON " . substr($parent_table, 0, 3) . ".{$cell} = " . substr($child_table, 0, 3) . ".id ";
//            $sql .= "ORDER BY {$order} ASC";
//        }
//
//    } else $return = array_multisort($order[0],SORT_ASC,$parent_array);

//    return($return);
}

function count_all($table_name)
{
    $sql = "SELECT COUNT(*) FROM " . $table_name;
    $result = query($sql);
    $result = fetch_array($result);
    return array_shift($result);
}

function check_maxLength($data,$table_name,$col_name){
    $check = maxLengths($table_name);
    return strlen($data) > $check[$col_name] ? [false,ucfirst($col_name)." too large! Maximum ".$check[$col_name]." characters allowed!"] : [true];
}
function get_maxLength($table_name,$col_name){
    $check = maxLengths($table_name);
    return $check[$col_name];
}

function maxLengths($table_name)
{
    $return = [];
    $result = query("SELECT * FROM {$table_name}");
    while($field_info = fetch_item($result)){
        if($field_info->type === MYSQLI_TYPE_VAR_STRING ){
            $return[$field_info->name] = $field_info->length/3;
        } else {
            $return[$field_info->name] = $field_info->length;
        }
    }
    return($return);
}

function find_by_id($table_name, $id = 0)
{
    $result = find_by_sql("SELECT * FROM {$table_name} WHERE id='{$id}' LIMIT 1");
    return !empty($result) ? array_shift($result) : false;
}

function insert_id()
{
    global $connection;
    return mysqli_insert_id($connection);
}

function find_by_sql($sql)
{
    $result = query($sql);
    $object = [];
    while ($row = fetch_array($result)) {
        $object[] = $row;
    }
    return $object;
}

/*______________________________________________ INITIALIZE __________________________________________________________*/

$connection = open_connection();
