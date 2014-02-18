<?php
/**
 * Description of ModelBase
 *
 * @author YtuUzem
 */
class ModelBase {
     public $db;
    
     function __construct() {
        // Include ezSQL core
        include_once "../lib/vendor/ezSQL/shared/ez_sql_core.php";

        // Include ezSQL database specific component
        include_once "../lib/vendor/ezSQL/mysqli/ez_sql_mysqli.php";

        // Initialise database object and establish a connection
        // at the same time - db_user / db_password / db_name / db_host
        // db_host can "host:port" notation if you need to specify a custom port
        $this->db = new ezSQL_mysqli('root','','studcoun','localhost');
        $sonuc = $this->db->get_var( 'SELECT count(*) FROM admin;' );

        $this->db->debug();
   }
}
