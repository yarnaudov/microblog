<?php

namespace App\Models;

class UserModel extends BaseModel
{
    
    public static function model () {
        return new self();
    }
    
    public function login ($username, $password) {
        $query = $this->app->db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $query->bindParam(':username', $username, \PDO::PARAM_STR);
        $query->bindParam(':password', $password, \PDO::PARAM_STR);
        $query->execute();
        
        $user = $query->fetch(\PDO::FETCH_ASSOC);
        if ($user) {
            $this->app->session->write('user', $user);
            return true;
        }
        
        return false;
        
    }
    
    public function logout () {
        $this->app->session->remove('user');
    }
    
    public function isLogedIn () {
        if ($this->app->session->read('user')) {
            return true;
        }
        return false;
    }
    
    public function getLogedUser () {
        return $this->app->session->read('user');
    }
    
    public function get ($id) {
        $query = $this->app->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getAll () {
        return $this->db->query("SELECT * FROM users");
    }
    
}
