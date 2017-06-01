<?php

namespace App\Models;

class PostModel extends BaseModel
{
    
    public function delete ($id) {
        $query = $this->app->db->prepare("DELETE FROM posts WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }
    
    public function get ($id) {
        $query = $this->app->db->prepare("SELECT * FROM posts WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getAll () {
        return $this->app->db->query("SELECT * FROM posts");
    }
    
    public function update ($id, $data) {
        $query = $this->app->db->prepare("UPDATE posts SET title = :title, text = :text WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->bindParam(':title', $data['title'], \PDO::PARAM_STR);
        $query->bindParam(':text', $data['text'], \PDO::PARAM_STR);
        //$query->bindParam(':updated_at', time(), \PDO::PARAM_INT);
        return $query->execute();
        
    }
    
}
