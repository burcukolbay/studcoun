<?php
/**
 * Description of Student
 *
 * @author YtuUzem
 */
class Student extends ModelBase{
    public function insert( $email, $password, $firstname, $lastname, $university_name, $department, $birthdate, $gender, $registration_time,$status ){
        $registration_time = date("Y-m-d H:i:s");
        $birthdate = date("Y-m-d H:i:s");
        $filename = '';
        
        //dosya boş değilse
        if( !empty($_FILES['image1']['name']) ){
            $filename = $_FILES['image1']['name'];

            $copy_result = move_uploaded_file($_FILES['image1']['tmp_name'], BASE_PATH.'/files/students/'.$filename);
            if( $copy_result != true ){
                exit('Warning: file couldnt be uploaded.');
            }
        }
        
        
        $sql = 'INSERT INTO student ( email, password, firstname, lastname, university_name, department, birthdate, gender, registration_time, status )'
                . "VALUES( '$email', '$password', '$firstname', '$lastname', '$university_name', '$department', '$birthdate', '$gender', '$registration_time','$status' );";
        
        $result = $this->db->query( $sql );
        return $result;
    }
    
    public function delete($id){
        $sql = "SELECT photo FROM student WHERE id=$id;";
        $student_photo = parent::$db->get_var($sql);
        
        $sql = "DELETE FROM student WHERE id=$id;";
        $delete_result = ModelBase::$db->query($sql);
        
        //eğer delet işlemi başarılı ise ve fotoğraf varsa
        if($delete_result == true && !is_null($student_photo)){
            unlink( BASE_PATH.'/files/students/'.$student_photo );
        }

        return $delete_result;
    }
    
    
    public function getStudents($number=NULL) {
        $limit = is_null($number) ?  NULL : " LIMIT 0, $number";
        
        $sql = 'SELECT * FROM student';
        $sql .= ' ORDER BY time DESC';
        $sql .= is_null($limit) ? '' : $limit;
       
        $result = self::$db->get_results( $sql );
        return $result;
    }
    
    public function getStudentById($id){
        $sql = "SELECT * FROM student WHERE id=$id";
        $result = $this->db->get_row($sql);
        
        return $result;
    }
    
}
