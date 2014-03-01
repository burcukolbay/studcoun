<?php
/**
 * Description of Activity
 *
 * @author YtuUzem
 */
class Activity extends ModelBase{
    public function insert( $title, $content, $quota, $place, $activity_time ){
        $time = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO activity(title, content, quota, place, time, activity_time)'
                . "VALUES('$title', '$content', '$quota', '$place', '$time', '$activity_time');";
        
        $result = $this->db->query( $sql );
        return $result;
    }
    
    
    public function getActivities($number=NULL) {
        $limit = is_null($number) ?  NULL : " LIMIT 0, $number";
        
        $sql = 'SELECT * FROM activity';
        $sql .= ' ORDER BY time DESC';
        $sql .= is_null($limit) ? '' : $limit;
       
        $result = $this->db->get_results( $sql );
        return $result;
    }
    
}
