<?php
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';
include_once BASE_PATH . '/models/Volunteer.php';

$Admin = new Admin();
$Volunteer = new Volunteer();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: '. ADMIN_BASE_URL . '/login.php?ref='.ADMIN_BASE_URL.'/volunteers.php');
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
            $VolunteerList = $Volunteer->getVolunteers(10);
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>University ID</th>
                        <th>Faculty</th>
                        <th>Department</th>
                        <th>Tel</th>
                        <th>Birth date</th>
                        <th>Registration Time</th>
                        <th>Description</th>
                        <th>Gender</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_null($VolunteerList) ){
                        echo '<tr><td colspan="8">No record.</td></tr>';
                    }else{
                        foreach ($VolunteerList as $VolunteerItem) {
                    ?>
                            <tr>
                                <td><?php echo $VolunteerItem->id; ?></td>
                                <td><?php echo $VolunteerItem->firstname; ?></td>
                                <td><?php echo $VolunteerItem->lastname; ?></td>
                                <td><?php echo $VolunteerItem->email; ?></td>
                                <td><?php echo $VolunteerItem->password; ?></td>
                                <td><?php echo $VolunteerItem->university_id; ?></td>
                                <td><?php echo $VolunteerItem->faculty; ?></td>
                                <td><?php echo $VolunteerItem->department; ?></td>
                                <td><?php echo $VolunteerItem->tel; ?></td>
                                <td><?php echo $VolunteerItem->birthdate; ?></td>
                                <td><?php echo $VolunteerItem->registration_time; ?></td>
                                <td><?php echo $VolunteerItem->description; ?></td>
                                <td><?php echo $VolunteerItem->gender; ?></td>
                                <td><?php echo $VolunteerItem->status; ?></td>
                                
                                <td>
                                    <a href="delete_volunteer.php?id=<?php echo $VolunteerItem->id; ?>">
                                    Delete
                                    </a>
                                    | 
                                    <a href="volunteer_detail.php?id=<?php echo $VolunteerItem->id; ?>">
                                    Detail
                                    </a>
                                    </td>
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
                <li><a href="volunteers.php">Volunteers List</a></li>
                <li><a href="add_volunteer.php">Add Volunteer</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
