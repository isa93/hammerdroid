<?php
require_once "../../includes/initialize.php";

check_login(false);
logout();
redirect_to('../login.php');