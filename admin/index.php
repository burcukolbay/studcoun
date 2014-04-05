<?php
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

    <div id="container">
        <div id="content">

            <?php 
            include_once '../models/News.php';
            echo 'Toplam haber sayısı: ' . News::getTotalNews(); 
            echo '<br>';
            ?>

        </div>
    </div>

</body>
</html>
