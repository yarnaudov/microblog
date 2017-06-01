<?php

namespace App\Models;

class UserModel extends BaseModel
{
    
    public function autenticate ($username, $password) {
        $query = $this->db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $query->bindParam(':username', $username, \PDO::PARAM_STR);
        $query->bindParam(':password', $password, \PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function get ($id) {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getAll () {
        return $this->db->query("SELECT * FROM users");
    }
    
}
