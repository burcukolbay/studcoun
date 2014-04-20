<?php
/**
 * Description of Volunteer
 *
 * @author YtuUzem
 */
class Student extends ModelBase{
    public function insert( $firstname, $lastname, $email, $password, $faculty, $department, $tel, $birthdate, $registration_time,$description,$gender,$status ){
        $registration_time = date("Y-m-d H:i:s");
        $birthdate = date("Y-m-d H:i:s");
        $filename = '';
        
        //dosya boş değilse
        if( !empty($_FILES['image1']['name']) ){
            $filename = $_FILES['image1']['name'];

            $copy_result = move_uploaded_file($_FILES['image1']['tmp_name'], BASE_PATH.'/files/volunteers/'.$filename);
            if( $copy_result != true ){
                exit('Warning: file couldnt be uploaded.');
            }
        }
        
        
        $sql = 'INSERT INTO volunteer ( firstname, lastname, email, password, faculty, department, tel, birthdate, registration_time,description,gender,status )'
                . "VALUES( '$firstname', '$lastname', '$email', '$password', '$faculty', '$department', '$tel', '$birthdate', '$registration_time','$description','$gender','$status' );";
        
        $result = $this->db->query( $sql );
        return $result;
    }
    
    public function delete($id){
        $sql = "SELECT photo FROM volunteer WHERE id=$id;";
        $student_photo = parent::$db->get_var($sql);
        
        $sql = "DELETE FROM volunteer WHERE id=$id;";
        $delete_result = ModelBase::$db->query($sql);
        
        //eğer delet işlemi başarılı ise ve fotoğraf varsa
        if($delete_result == true && !is_null($volunteer_photo)){
            unlink( BASE_PATH.'/files/volunteer/'.$volunteer_photo );
        }

        return $delete_result;
    }
    
    
    public function getVolunteers($number=NULL) {
        $limit = is_null($number) ?  NULL : " LIMIT 0, $number";
        
        $sql = 'SELECT * FROM volunteer';
        $sql .= ' ORDER BY time DESC';
        $sql .= is_null($limit) ? '' : $limit;
       
        $result = self::$db->get_results( $sql );
        return $result;
    }
    
    public function getVolunteerById($id){
        $sql = "SELECT * FROM volunteer WHERE id=$id";
        $result = $this->db->get_row($sql);
        
        return $result;
    }
    
}
