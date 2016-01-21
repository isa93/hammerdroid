<?php
require_once "../../includes/initialize.php";
check_login();

if(isset($_POST['userWidget'])){
    $outout = "";
    $result = find_by_sql("SELECT id,username,first_name,last_name FROM clients ORDER BY last_login DESC LIMIT 5");
    foreach($result as $item){
        $outout .= '<li class="user-widget-item">
                        <a href="list_client.php?id='.$item['id'].'">
                            <div class="collapsible-header avatar" style="color:#38ab4c;text-shadow: 0 1px 1px #2e7f3f;">
                                <img class="circle right" src="../images/user/'.get_image('clients',$item['id']).'" alt="'.$item['username'].'\'s profile picture" style="height: 35px;margin-top: 4px">
                                <span class="title truncate">'.$item['first_name']." ".$item['last_name'].'</span>
                            </div>
                        </a>
                    </li>';
    }

    echo($outout);
}

if(isset($_POST['adminWidget'])){
    $outout = "";
    $result = find_by_sql("SELECT id,username,first_name,last_name FROM users ORDER BY last_login DESC LIMIT 5");
    foreach($result as $item){
        $outout .= '<li class="admin-widget-item">
                        <a href="list_admin.php?id='.$item['id'].'">
                            <div class="collapsible-header avatar blue-text" style="text-shadow: 0 1px 1px #216ec8;">
                                <img class="circle right" src="../images/user/'.get_image('users',$item['id']).'" alt="'.$item['username'].'\'s profile picture" style="height: 35px;margin-top: 4px">
                                <span class="title truncate">'.$item['first_name']." ".$item['last_name'].'</span>
                            </div>
                        </a>
                    </li>';
    }

    echo($outout);
}



function check_search($search_term)
{
    return !empty($search_term) && preg_match("/[A-Za-z0-9]+/", $search_term) ? true : "<p class='blue-text'>Type something...</p>";
}

if(isset($_POST['adminSearch'])){
    $search = escape_value($_POST['adminSearch']);
    $check = check_search($search);
    $outout = "";
    if($check===true){
        $result = query("SELECT id FROM clients WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR username LIKE '%$search%' LIMIT 5");
        if(mysqli_num_rows($result)>0){
            while($record = mysqli_fetch_array($result,MYSQLI_ASSOC))
                $outout .= '<a href="list_client.php?id='.$record['id'].'">
                        <p style="margin:10px 10px 5px 10px">
                            <img src="../images/user/'.get_image('clients',$record['id']).'" alt="'.get_user_name($record['id'],false).'" class="circle" style="height: 40px">
                            <span style="font-size: 1.5em;position: relative;bottom: 12px;left:10px">'.get_user_name($record['id'],false).'</span>
                        </p>
                    </a>
                    <div class="divider"></div>';
        } else $outout .= "<p class='blue-text'>Try something else :D </p>";
    } else $outout = $check;
    echo($outout);
}