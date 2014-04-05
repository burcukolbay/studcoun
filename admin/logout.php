<?php
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';

$Admin = new Admin();

$logoutResult = $Admin->logout();//true veya false döner

if ( $logoutResult == true ){
    header('Location: '. ADMIN_BASE_URL . '/login.php');
    exit;
}