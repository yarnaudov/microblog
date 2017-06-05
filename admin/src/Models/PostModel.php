<?php

namespace App\Models;

class PostModel extends BaseModel
{
    /**
     * Create new class instance
     * @return \PostModel
     */
    public static function model () {
        return new self();
    }
    
    /**
     * Get item
     * @param int $id Id of item to get
     * @return array 
     */
    public function get ($id) {
        $query = $this->app->db->prepare("
            SELECT 
                p.*,
                u.name AS user
            FROM 
                posts p
                JOIN users u ON (u.id = p.user_id)
            WHERE p.id = :id
        ");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    
    /**
     * Get all items
     * @return array 
     */
    public function getAll () {
        $query = $this->app->db->prepare("
            SELECT 
                p.*,
                u.name AS user
            FROM 
                posts p
                JOIN users u ON (u.id = p.user_id)
        ");
        $query->execute();
        return $query->fetchAll (\PDO::FETCH_ASSOC);
    }
    
    /**
     * Create new item
     * @param array $data Data for new item
     * @return bool true on success or false on failure
     */
    public function create ($data) {
        
        $user = UserModel::model()->getLogedUser();
        
        $query = $this->app->db->prepare("
            INSERT INTO posts (`user_id`, `title`, `brief_text`, `text`, `created_at`)
            VALUES (:user_id, :title, :brief_text, :text, :created_at)
        ");
        $query->bindParam(':user_id', $user['id'], \PDO::PARAM_INT);
        $query->bindParam(':title', $data['title'], \PDO::PARAM_STR);
        $query->bindParam(':brief_text', $data['brief_text'], \PDO::PARAM_STR);
        $query->bindParam(':text', $data['text'], \PDO::PARAM_STR);
        $query->bindParam(':created_at', time(), \PDO::PARAM_INT);
        return $query->execute();
        
    }
    
    /**
     * Update item
     * @param int $id Id of item to update
     * @param array $data Data for new item
     * @return bool true on success or false on failure
     */
    public function update ($id, $data) {
        $query = $this->app->db->prepare("
            UPDATE posts SET 
                `title` = :title,
                `brief_text` = :brief_text,
                `text` = :text,
                `updated_at` = :updated_at
            WHERE `id` = :id
        ");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->bindParam(':title', $data['title'], \PDO::PARAM_STR);
        $query->bindParam(':brief_text', $data['brief_text'], \PDO::PARAM_STR);
        $query->bindParam(':text', $data['text'], \PDO::PARAM_STR);
        $query->bindParam(':updated_at', time(), \PDO::PARAM_INT);
        return $query->execute();
        
    }
    
    /**
     * Delete item
     * @param int $id Id of item to delete
     * @return bool true on success or false on failure
     */
    public function delete ($id) {
        $query = $this->app->db->prepare("DELETE FROM posts WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }
    
}
