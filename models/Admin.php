<?php
    include_once 'ModelBase.php';
/**
 * Description of Admin
 *
 * @author YtuUzem
 */
class Admin extends ModelBase{
    CONST ROLE_SUPERADMIN = 0;
    CONST ROLE_ADMIN = 1;
    
    CONST STATUS_ACTIVE = 1;
    CONST STATUS_PASSIVE = 2;
    
    public $email, $password;
    
    public function login($email,$password) {        
        $sql = 'SELECT * '
                . "FROM admin "
                . "WHERE email='$email'";

        //veritabanında $sql değişkeni içindeki sorgu çalıştırıldı
        $queryResult = $this->db->get_row( $sql );
        //email var mı?
        if ( is_null($queryResult) ){
            return array(false, 'Email is wrong!');
        }
        
        $sql = ' SELECT * FROM admin'
                . " WHERE email='$email' AND password='$password'";
        $queryResult = $this->db->get_row( $sql );
        //bir önceki sqlde yer alan şifre doğru mu?
        if ( is_null($queryResult) ){
            return array(false, 'Password is wrong!');
        }
        
        $loginResult = true;
        $_SESSION['login'] = 1;
        return array(true);
    }
    
    public function isLogined(){
        if ( isset($_SESSION['login']) && $_SESSION['login'] == 1 ){
            return true;
        }else{
            return false;
        }
    }
    
}
