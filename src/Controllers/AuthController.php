<?php

namespace App\Controllers;

use \App\Models\UserModel;

class AuthController extends BaseController
{
    
    private $user;
    
    public function __construct() {
        parent::__construct();
        $this->user = new UserModel();
    }
    
    public function login () {
        $this->app->render('admin/login.php');  
    }
    
    private function validate ($data) {
        $errors = [];
        
        // check username
        if (!isset($data['username']) || empty($data['username'])) {
            $errors['error.username'] = 'Please fill Username';
        }
        
        // check password
        if (!isset($data['password']) || empty($data['password'])) {
            $errors['error.password'] = 'Please fill Password';
        }
        
        return $errors;
    }
    
    public function authenticate () {
        
        $data = $this->app->request->post();
 
        $errors = $this->validate($data);
        if ($errors) {
            foreach ($errors as $key => $value) {
                $this->app->flashNow($key, $value);
            }
        } else {
            // try to login user
            if ($this->user->login($data['username'], $data['password'])) {
                $this->app->redirect('/admin/posts');
            } else {
                $this->app->flashNow('error', 'Wrong username or password');
            }
            
        }
 
        $this->app->render('/admin/login.php', ['data' => $data]);
        
    }
    
    public function logout () {
        $this->user->logout();
        $this->app->redirect('/admin/login');
    }
}

