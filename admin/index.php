<?php
session_start();
include_once '../config/main.php';

include_once  BASE_PATH . '/models/Admin.php';
$Admin = new Admin();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<?php include_once './inc/body_top.php'; ?>
    
    
Yönetici anasafasına hoşgeldiniz..
</body>
</html>
