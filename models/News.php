<?php
/**
 * Description of News
 *
 * @author YtuUzem
 */
class News extends ModelBase{
    public function insert( $title, $summary, $content ){
        $time = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO news(title,summary,content,time)'
                . "VALUES('$title', '$summary', '$content', '$time');";
        
        $result = $this->db->query( $sql );
        return $result;
    }
    
    public function getNews($number=NULL) {
        $limit = is_null($number) ?  NULL : " LIMIT 0, $number";
        
        $sql = 'SELECT * FROM news';
        $sql .= ' ORDER BY time DESC';
        $sql .= is_null($limit) ? '' : $limit;
       
        $result = $this->db->get_results( $sql );
        return $result;
    }
}
