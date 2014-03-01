<?php
/**
 * Description of ModelBase
 *
 * @author YtuUzem
 */
class ModelBase {
     public static $db;
    
     function __construct() {
        // Include ezSQL core
        include_once BASE_PATH . "/lib/vendor/ezSQL/shared/ez_sql_core.php";

        // Include ezSQL database specific component
        include_once BASE_PATH . "/lib/vendor/ezSQL/mysqli/ez_sql_mysqli.php";

        // Initialise database object and establish a connection
        // at the same time - db_user / db_password / db_name / db_host
        // db_host can "host:port" notation if you need to specify a custom port
        $this->db = new ezSQL_mysqli( DB_USERNAME, DB_PASSWORD, DB_NAME, DB_HOST);
        $this->db->query('SET NAMES utf8');
        $this->db->query('SET CHARACTER SET utf8');
        $this->db->query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
   }
   
   public static function db(){
       if( !isset(self::$db) ){
            // Include ezSQL core
            include_once BASE_PATH . "/lib/vendor/ezSQL/shared/ez_sql_core.php";

            // Include ezSQL database specific component
            include_once BASE_PATH . "/lib/vendor/ezSQL/mysqli/ez_sql_mysqli.php";

            // Initialise database object and establish a connection
            // at the same time - db_user / db_password / db_name / db_host
            // db_host can "host:port" notation if you need to specify a custom port
            self::$db = new ezSQL_mysqli( DB_USERNAME, DB_PASSWORD, DB_NAME, DB_HOST);
            self::$db->query('SET NAMES utf8');
            self::$db->query('SET CHARACTER SET utf8');
            self::$db->query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
       }
       
       return self::$db;
   }
}
