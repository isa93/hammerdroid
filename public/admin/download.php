<?php
require_once "../../includes/initialize.php";
check_login();

if(isset($_GET['table'])){
    $table = escape_value($_GET['table']);
    $file = $table . ".xls";
    header("Content-type: application/vnd.ms-excel; charset=UTF-8");
    header("Content-Disposition: attachment; filename=$file");
    $data = find_all($table);
    $output = "<table><thead>";
    foreach($data[0] as $cell => $value)
        if(!is_numeric($cell)) $output .= "<th>$cell</th>"; else continue;
    $output .= "</thead>";
    foreach($data as $record){
        $i = (count($record)/2)-1;
        $j = 0;
        $output .= "<tr>";
        while($j<=$i){
            $output .= "<td>$record[$j]</td>";
            $j++;
        }
        $output .= "</tr>";
    }
    $output .= "</table>";

    print chr(255) . chr(254) . mb_convert_encoding($output, 'UTF-16LE', 'UTF-8');
}
