<?php

namespace App\Models;

class PostModel extends BaseModel
{
    
    public function delete ($id) {
        $query = $this->db->prepare("DELETE FROM posts WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }
    
    public function get ($id) {
        $query = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getAll () {
        return $this->db->query("SELECT * FROM posts");
    }
    
}
