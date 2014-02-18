<?php
if ( isset($_POST['btnLogin']) ){//form gonderilmişse
    include_once '../models/ModelBase.php';
    include_once '../models/Admin.php';
    
    $Admin = new Admin();
    
    $loginResult = $Admin->login($_POST['email'], $_POST['password']);
    
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <form name="frmLogin" method="POST">
            Email : <input type="text" name="email" value="" />
            <br />
            Password : <input type="password" name="password" value="" />
            <br />
            <input type="submit" value="Login" name="btnLogin" />
            
        </form>
        
    </body>
</html>