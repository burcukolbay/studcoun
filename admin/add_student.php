<?php
include_once '../config/main.php';

include_once BASE_PATH . '/models/Admin.php';
$Admin = new Admin();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: '. ADMIN_BASE_URL . '/login.php?ref='.ADMIN_BASE_URL.'/add_student.php');
    exit;
}

//form gönderildi mi?
if ( isset($_POST['btnSave']) ){
    include_once BASE_PATH . '/models/Student.php';
    $Student = new Student();
    
    $result = $Student->insert( $_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['university_name'], $_POST['department'], $_POST['birthdate'], $_POST['gender'],  $_POST['registration_time'], $_POST['country_id'], $_POST['status'] );
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
            <h1>Add Student</h1>
            <div>
                <form method="POST" enctype="multipart/form-data">
                    <div>
                        <?php
                        //form gönderilmişse mesajı yazdır
                        if ( isset($_POST['btnSave']) ){
                            echo $message;
                        }
                        ?>
                    </div>
                    Email: 
                    <br><input type="text" name="email" value="" />
                    <br>
                    Password: 
                    <br><input type="password" name="password" value="" />
                    <br>
                    First name: 
                    <br><input type="text" name="firstname" value="" />
                    <br>
                    Last name: 
                    <br><input type="text" name="lastname" value="" />
                    <br>
                    University name: 
                    <br><input type="text" name="university_name" value="" />
                    <br>
                    Department: 
                    <br><input type="text" name="department" value="" />
                    <br>
                    Birth date: 
                    <br><input type="text" name="birthdate" value="" />
                    <br>
                    Gender: 
                    <br><input type="text" name="gender" value="" />
                    <br>
                    Registration Time: 
                    <br><input type="text" name="registration_time" value="" />
                    <br>
                    Country id: 
                    <br><input type="text" name="country_id" value="" />
                    <br>
                    Status: 
                    <br><input type="text" name="status" value="" />
                    <br>
                    Image 1:
                    <br><input type="file" name="image1" />
                    <br>

                   

                    <br>
                    <input type="submit" value="Save" name="btnSave" />
                </form>
            </div>
        </div>

        <div id="submenu">
            <ul>
                <li><a href="students.php">Student List</a></li>
                <li><a href="delete_student.php">Delete Student</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
