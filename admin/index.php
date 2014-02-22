<?php
session_start();

include_once '../models/Admin.php';
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
</head>
<body>
Yönetici anasafasına hoşgeldiniz..
</body>
</html>
