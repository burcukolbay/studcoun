<?php
session_start();
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';
include_once BASE_PATH . '/models/News.php';

$Admin = new Admin();
$News = new News();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: '. ADMIN_BASE_URL . '/login.php?ref='.ADMIN_BASE_URL.'/news.php');
    exit;
}

if( isset($_GET['id']) ){
    $delete_result = $News->delete($_GET['id']);
    if( $delete_result == true ){
        header('Location:' . BASE_URL . '/admin/news.php?delete=ok');
        exit;
    }else{
        header('Location:' . BASE_URL . '/admin/news.php?delete=notok');
        exit;
    }
}

header('Location:' . BASE_URL . '/admin/news.php');
exit;