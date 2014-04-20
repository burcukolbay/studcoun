<?php
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';
include_once BASE_PATH . '/models/Student.php';

$Admin = new Admin();
$Student = new Student();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: '. ADMIN_BASE_URL . '/login.php?ref='.ADMIN_BASE_URL.'/students.php');
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
                $student_record = $Student->getStudentById( $_GET['id'] );
            ?>
            <h1>Student Detail</h1>
            <table border="1" cellpadding="2">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td><?php echo $student_record->id; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $student_record->email; ?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><?php echo $student_record->password; ?></td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>:</td>
                            <td><?php echo $student_record->firstname; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>:</td>
                            <td><?php echo $student_record->lastname; ?></td>
                        </tr>
                        <tr>
                            <td>University Name</td>
                            <td>:</td>
                            <td><?php echo $student_record->university_name; ?></td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td>:</td>
                            <td><?php echo $student_record->department; ?></td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td>:</td>
                            <td><?php echo $student_record->birthdate; ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><?php echo $student_record->gender; ?></td>
                        </tr>
                        <tr>
                            <td>Registration Time</td>
                            <td>:</td>
                            <td><?php echo date( "d.m.Y H:i:s", strtotime($student_record->registration_time) ); ?></td>
                        </tr>
                        <tr>
                            <td>Country Id</td>
                            <td>:</td>
                            <td><?php echo $student_record->country_id; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $student_record->status; ?></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>:</td>
                            <td>
                                <img src="<?php echo BASE_URL.'/files/students/'.$student_record->photo; ?>" />
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
                <li><a href="students.php">Student List</a></li>
                <li><a href="add_student.php">Add Student</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
