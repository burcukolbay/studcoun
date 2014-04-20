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
            if(isset($_GET['id'])){
                $volunteer_record = $Volunteer->getVolunteerById( $_GET['id'] );
            ?>
            <h1>Volunteer Detail</h1>
            <table border="1" cellpadding="2">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->id; ?></td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->firstname; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->lastname; ?></td>
                        </tr>
                        <tr>
                        
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->email; ?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->password; ?></td>
                        </tr>
                            <td>University Id</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->university_id; ?></td>
                        </tr>
                        <tr>
                            <td>Faculty</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->faculty; ?></td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->department; ?></td>
                        </tr>
                        <tr>
                            <td>Tel</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->tel; ?></td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td>:</td>
                            <td><?php echo $student_record->birthdate; ?></td>
                        </tr>
                        <tr>
                            <td>Registration Time</td>
                            <td>:</td>
                            <td><?php echo date( "d.m.Y H:i:s", strtotime($volunteer_record->registration_time) ); ?></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td><?php echo $volunteer_record->description; ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><?php echo $student_record->gender; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $student_record->status; ?></td>
                        </tr>
                        
                        <tr>
                            <td>Document</td>
                            <td>:</td>
                            <td>
                             <img src="<?php echo BASE_URL.'/files/documents/'.$volunteer_record->language_document; ?>" />
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
                <li><a href="volunteer.php">Volunteer List</a></li>
                <li><a href="add_volunteer.php">Add Volunteer</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
