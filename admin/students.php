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
            $StudentList = $Student->getStudents(10);
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
                        <th>Email</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>University Name</th>
                        <th>Department</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Registration Time</th>
                        <th>Country Id</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_null($StudentList) ){
                        echo '<tr><td colspan="8">No record.</td></tr>';
                    }else{
                        foreach ($StudentList as $StudentItem) {
                    ?>
                            <tr>
                                <td><?php echo $StudentItem->id; ?></td>
                                <td></td>
                                <td><?php echo $StudentItem->email; ?></td>
                                <td><?php echo $StudentItem->password; ?></td>
                                <td><?php echo $StudentItem->firstname; ?></td>
                                <td><?php echo $StudentItem->lastname; ?></td>
                                <td><?php echo $StudentItem->university_name; ?></td>
                                <td><?php echo $StudentItem->department; ?></td>
                                <td><?php echo $StudentItem->birthdate; ?></td>
                                <td><?php echo $StudentItem->gender; ?></td>
                                <td><?php echo $StudentItem->registration_time; ?></td>
                                <td><?php echo $StudentItem->country_id; ?></td>
                                <td><?php echo $StudentItem->status; ?></td>
                                
                                <td>
                                    <a href="delete_student.php?id=<?php echo $StudentItem->id; ?>">
                                    Delete
                                    </a>
                                    | 
                                    <a href="student_detail.php?id=<?php echo $StudentItem->id; ?>">
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
                <li><a href="students.php">Student List</a></li>
                <li><a href="add_student.php">Add Student</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
