<?php

namespace App\Models;

class UserModel extends BaseModel
{
    
    public static function model () {
        return new self();
    }
    
    public function login ($username, $password) {
        $query = $this->app->db->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(':username', $username, \PDO::PARAM_STR);
        $query->execute();
        
        $user = $query->fetch(\PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $this->app->session->put('user', $user);
            return true;
        }
        
        return false;
        
    }
    
    public function logout () {
        $this->app->session->remove('user');
    }
    
    public function isLoggedIn () {
        if ($this->app->session->get('user')) {
            return true;
        }
        return false;
    }
    
    public function getLogedUser () {
        return $this->app->session->get('user');
    }
    
    public function get ($id) {
        $query = $this->app->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getAll () {
        $query = $this->app->db->prepare("SELECT * FROM users");
        $query->execute();
        return $query->fetchAll (\PDO::FETCH_ASSOC);
    }
    
    public function create ($data) {
        
        $query = $this->app->db->prepare("
            INSERT INTO users (`name`, `username`, `email`, `password`) 
            VALUES (:name, :username, :email, :password)
        ");
        $query->bindParam(':name', $data['name'], \PDO::PARAM_STR);
        $query->bindParam(':username', $data['username'], \PDO::PARAM_STR);
        $query->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        $query->bindParam(':password', password_hash($data['password'], PASSWORD_DEFAULT), \PDO::PARAM_STR);
        return $query->execute();
        
    }
    
    public function update ($id, $data) {
        
        $query = $this->app->db->prepare("
            UPDATE users SET
                `name` = :name, 
                `username` = :username,
                `email` = :email
                " . (!empty($data['password']) ? ', `password` = :password' : '') . "
            WHERE `id` = :id
        ");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->bindParam(':name', $data['name'], \PDO::PARAM_STR);
        $query->bindParam(':username', $data['username'], \PDO::PARAM_STR);
        $query->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        if (!empty($data['password'])) {
            $query->bindParam(':password', password_hash($data['password'], PASSWORD_DEFAULT), \PDO::PARAM_STR);
        }
        return $query->execute();
        
    }
    
    public function delete ($id) {
        $query = $this->app->db->prepare("DELETE FROM users WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }
    
}
