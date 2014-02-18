<?php
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
        var_dump($this->db);
        exit;
        
        $sql = 'SELECT * '
                . "FROM admin "
                . "WHERE email='$email'";

        //veritabanında $sql değişkeni içindeki sorgu çalıştırıldı
        $queryResult = $this->db->get_row( $sql );
        var_dump($queryResult);
        
    }
    
}
