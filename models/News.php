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
        
        //haber kaydı başarılı ise
        if( $result == true ){
            $fileCount = 3;
            $news_id = $this->db->insert_id;
            
            for( $i=1; $i <= $fileCount; $i++ ){
                if( !empty($_FILES['image'.$i]['name']) ){
                    $filename = $_FILES['image'.$i]['name'];

                    $copy_result = move_uploaded_file($_FILES['image'.$i]['tmp_name'], BASE_PATH.'/files/news/'.$filename);
                    if( $copy_result == true ){
                        $this->insertFile($news_id, $filename);
                    }
                }
            }
        }
        
        return $result;
    }
    
    public function delete($id){
        $sql = "SELECT * FROM news_photo WHERE news_id=$id;";
        $news_photos = $this->db->get_results($sql);
        
        $sql = "DELETE FROM news WHERE id=$id;";
        $delete_result = $this->db->query($sql);
        
        //eğer delet işlemi başarılı ise ve fotoğraf varsa
        if($delete_result == true && !is_null($news_photos)){
            foreach ($news_photos as $news_photo) {
                unlink( BASE_PATH.'/files/news/'.$news_photo->filename );
            }
        }

        return $delete_result;
    }

    public function insertFile($news_id, $filename){
        $sql = 'INSERT INTO news_photo(news_id, filename)'
                . "VALUES('$news_id', '$filename');";
        
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
    
    public static function getTotalNews(){
        $sql = 'SELECT count(*) FROM news;';
        
        return self::db()->get_var($sql);
    }
    
}
