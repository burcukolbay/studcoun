<?php
session_start();

$errorMessage = NULL;
if ( isset($_POST['btnLogin']) ){//form gonderilmişse
    include_once '../models/Admin.php';
    
    $Admin = new Admin();
    
    $loginResult = $Admin->login($_POST['email'], $_POST['password']);//true veya false döner
    
    if ( $loginResult == true ){
        //sayfa yönlendirmesi yapılıyor
        header( 'Location: index.php' );
        exit; //yönlendirmeden sonra exiti unutmayın
    }else{
        $errorMessage = 'Email or password is wrong!';
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