<?php
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';
include_once BASE_PATH . '/models/Student.php';

$Admin = new Admin();
$Student = new Student();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: '. ADMIN_BASE_URL . '/login.php?ref='.ADMIN_BASE_URL.'/students.php');
    exit;
}

if( isset($_GET['id']) ){
    $delete_result = $Student->delete($_GET['id']);
    if( $delete_result == true ){
        header('Location:' . BASE_URL . '/admin/students.php?delete=ok');
        exit;
    }else{
        header('Location:' . BASE_URL . '/admin/students.php?delete=notok');
        exit;
    }
}

header('Location:' . BASE_URL . '/admin/students.php');
exit;