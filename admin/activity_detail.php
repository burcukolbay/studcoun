<?php
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';
include_once BASE_PATH . '/models/Activity.php';

$Admin = new Admin();
$Activity = new Activity();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: '. ADMIN_BASE_URL . '/login.php?ref='.ADMIN_BASE_URL.'/activities.php');
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
            if(isset($_GET['id'])){
                $activity_record = $Activity->getActivityById( $_GET['id'] );
            ?>
            <h1>Activity Detail</h1>
            <table border="1" cellpadding="2">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td><?php echo $activity_record->id; ?></td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>:</td>
                            <td><?php echo $activity_record->title; ?></td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>:</td>
                            <td><?php echo $activity_record->content; ?></td>
                        </tr>
                        <tr>
                            <td>Place</td>
                            <td>:</td>
                            <td><?php echo $activity_record->place; ?></td>
                        </tr>
                        <tr>
                            <td>Quota</td>
                            <td>:</td>
                            <td><?php echo $activity_record->quota; ?></td>
                        </tr>
                        <tr>
                            <td>Activity Time</td>
                            <td>:</td>
                            <td><?php echo $activity_record->activity_time; ?></td>
                        </tr>
                        <tr>
                            <td>Create Time</td>
                            <td>:</td>
                            <td><?php echo date( "d.m.Y H:i:s", strtotime($activity_record->time) ); ?></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>:</td>
                            <td>
                                <img src="<?php echo BASE_URL.'/files/activities/'.$activity_record->photo; ?>" />
                            </td>
                        </tr>
                    </tbody>
                </table>

            
            <?php
            }
            ?>


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
