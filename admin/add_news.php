<?php
session_start();
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';
$Admin = new Admin();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: '. ADMIN_BASE_URL . '/login.php?ref='.ADMIN_BASE_URL.'/add_news.php');
    exit;
}

if ( isset($_POST['btnSave']) ){
    include_once BASE_PATH . '/models/News.php';
    $News = new News();
    
    $result = $News->insert( $_POST['title'], $_POST['summary'], $_POST['content'] );
    //eğer haber kayıt edilmişse
    if ($result == true){
        $message = 'Your news is successfully added.';
    }else{
        $message = 'Error while adding news.';
    }
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
            <h1>Add News</h1>
            <div>
        <form method="POST">
            <div>
                <?php
                //form gönderilmişse mesajı yazdır
                if ( isset($_POST['btnSave']) ){
                    echo $message;
                }
                ?>
            </div>
            Title: 
            <br><input type="text" name="title" value="" />
            <br>
            Summary: 
            <br><textarea name="summary" rows="4" cols="20"></textarea>
            <br>
            Content: 
            <br><textarea name="content" rows="4" cols="20"></textarea>
            <br>
            <input type="submit" value="Save" name="btnSave" />
        </form>
    </div>
        </div>

        <div id="submenu">
            <ul>
                <li><a href="news.php">News List</a></li>
                <li><a href="add_news.php">Add News</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
