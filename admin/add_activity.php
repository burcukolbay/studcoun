<?php
session_start();
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';
$Admin = new Admin();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: '. ADMIN_BASE_URL . '/login.php?ref='.ADMIN_BASE_URL.'/add_activity.php');
    exit;
}

if ( isset($_POST['btnSave']) ){
    include_once BASE_PATH . '/models/Activity.php';
    $Activity = new Activity();
    
    $result = $Activity->insert( $_POST['title'], $_POST['content'], $_POST['quota'], $_POST['place'], $_POST['activity_time'] );
    //eğer aktivite kayıt edilmişse
    if ($result == true){
        $message = 'Your record is successfully added.';
    }else{
        $message = 'Error while adding new record.';
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
            <h1>Add Activity</h1>
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
            Content: 
            <br><textarea name="content" rows="4" cols="20"></textarea>
            <br>
            Quota: 
            <br><input type="text" name="quota" value="" />
            <br>
            Place: 
            <br><input type="input" name="place" value="" />
            <br>
            Activity Time: 
            <br>
            <input type="text" name="activity_time" value="" />
            <br>            
            <br>    
            <input type="submit" value="Save" name="btnSave" />
        </form>
    </div>
        </div>

        <div id="submenu">
            <ul>
                <li><a href="activities.php">Activity List</a></li>
                <li><a href="add_activity.php">Add Activity</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
