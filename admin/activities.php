<?php
session_start();
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
            $ActivityList = $Activity->getActivities(10);
            ?>
            <div id="deleteResult">
                <?php
                if(isset($_GET['delete'])){
                    switch ($_GET['delete']) {
                        case 'ok':
                            echo 'Delete operation successful.';
                        break;
                        case 'notok':
                            echo 'Delete operation not successful.';
                        break;
                        default:
                        break;
                    }
                }
                ?>
            </div>
            <table border="1" cellpadding="2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Place</th>
                        <th>Quota</th>
                        <th>Activity Time</th>
                        <th>Create Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_null($ActivityList) ){
                        echo '<tr><td colspan="8">No record.</td></tr>';
                    }else{
                        foreach ($ActivityList as $ActivityItem) {
                    ?>
                            <tr>
                                <td><?php echo $ActivityItem->id; ?></td>
                                <td></td>
                                <td><?php echo $ActivityItem->title; ?></td>
                                <td><?php echo $ActivityItem->place; ?></td>
                                <td><?php echo $ActivityItem->quota; ?></td>
                                <td><?php echo $ActivityItem->activity_time; ?></td>
                                <td><?php echo $ActivityItem->time; ?></td>
                                
                                <td>
                                    <a href="delete_activity.php?id=<?php echo $ActivityItem->id; ?>">
                                    Delete
                                    </a>
                                    | Detail</td>
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
                <li><a href="activities.php">Activity List</a></li>
                <li><a href="add_activity.php">Add Activity</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
