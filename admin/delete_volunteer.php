<?php
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';
include_once BASE_PATH . '/models/Volunteer.php';

$Admin = new Admin();
$Volunteer = new Volunteer();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: '. ADMIN_BASE_URL . '/login.php?ref='.ADMIN_BASE_URL.'/volunteers.php');
    exit;
}

if( isset($_GET['id']) ){
    $delete_result = $Volunteer->delete($_GET['id']);
    if( $delete_result == true ){
        header('Location:' . BASE_URL . '/admin/volunteers.php?delete=ok');
        exit;
    }else{
        header('Location:' . BASE_URL . '/admin/volunteers.php?delete=notok');
        exit;
    }
}

header('Location:' . BASE_URL . '/admin/volunteers.php');
exit;