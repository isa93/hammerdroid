<?php
require_once "../../includes/initialize.php";

check_login();
logout();
redirect_to('login.php');