<?php
session_start();
include_once '../config/main.php';
$errorMessage = NULL;
if ( isset($_POST['btnLogin']) ){//form gonderilmişse
    include_once BASE_PATH . '/models/Admin.php';
    
    $Admin = new Admin();
    
    $loginResult = $Admin->login($_POST['email'], $_POST['password']);//true veya false döner
    
    //eğer login bilgileri doğruysa ilgili admin sayfasına yönlendir
    if ( $loginResult[0] == true ){
        //sayfa yönlendirmesi yapılıyor
        $redirectPage = ( isset($_GET['ref']) ) ? $_GET['ref'] : 'index.php';
        header( 'Location: ' . $redirectPage );
        exit; //yönlendirmeden sonra exiti unutmayın
    }else{
        $errorMessage = $loginResult[1];
    }
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        if ( !is_null($errorMessage) ) {
        ?>
        <div>
            <?php echo $errorMessage; ?>
        </div>

        <?php 
        } 
        ?>
        
        <form name="frmLogin" method="POST">
            Email : <input type="text" name="email" value="" />
            <br />
            Password : <input type="password" name="password" value="" />
            <br />
            <input type="submit" value="Login" name="btnLogin" />
            
        </form>
        
    </body>
</html>