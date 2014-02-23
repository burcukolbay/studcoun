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
            $NewsList = $News->getNews(10);
            ?>
            
            <table border="1" cellpadding="2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_null($NewsList) ){
                        echo '<tr><td cols="5">No record.</td></tr>';
                    }else{
                        foreach ($NewsList as $NewsItem) {
                    ?>
                            <tr>
                                <td><?php echo $NewsItem->id; ?></td>
                                <td></td>
                                <td><?php echo $NewsItem->title; ?></td>
                                <td><?php echo $NewsItem->time; ?></td>
                                <td>Delete | Detail</td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    
                </tbody>
            </table>

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
