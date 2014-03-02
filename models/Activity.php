<?php
/**
 * Description of Activity
 *
 * @author YtuUzem
 */
class Activity extends ModelBase{
    public function insert( $title, $content, $quota, $place, $activity_time ){
        $time = date("Y-m-d H:i:s");
        $filename = '';
        
        //dosya boş değilse
        if( !empty($_FILES['image1']['name']) ){
            $filename = $_FILES['image1']['name'];

            $copy_result = move_uploaded_file($_FILES['image1']['tmp_name'], BASE_PATH.'/files/activities/'.$filename);
            if( $copy_result != true ){
                exit('Warning: file couldnt be uploaded.');
            }
        }
        
        
        $sql = 'INSERT INTO activity(title, content, quota, photo, place, time, activity_time)'
                . "VALUES('$title', '$content', '$quota', '$filename', '$place', '$time', '$activity_time');";
        
        $result = $this->db->query( $sql );
        return $result;
    }
    
    public function delete($id){
        $sql = "SELECT photo FROM activity WHERE id=$id;";
        $activity_photo = $this->db->get_var($sql);
        
        $sql = "DELETE FROM activity WHERE id=$id;";
        $delete_result = $this->db->query($sql);
        
        //eğer delet işlemi başarılı ise ve fotoğraf varsa
        if($delete_result == true && !is_null($activity_photo)){
            unlink( BASE_PATH.'/files/activities/'.$activity_photo );
        }

        return $delete_result;
    }
    
    
    public function getActivities($number=NULL) {
        $limit = is_null($number) ?  NULL : " LIMIT 0, $number";
        
        $sql = 'SELECT * FROM activity';
        $sql .= ' ORDER BY time DESC';
        $sql .= is_null($limit) ? '' : $limit;
       
        $result = $this->db->get_results( $sql );
        return $result;
    }
    
    public function getActivityById($id){
        $sql = "SELECT * FROM activity WHERE id=$id";
        $result = $this->db->get_row($sql);
        
        return $result;
    }
    
}
