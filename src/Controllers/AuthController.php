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
    
    public function authenticate () {
        
        $username = $this->app->request->post('username');
        $password = $this->app->request->post('password');
        
        if ($this->user->login($username, $password)) {
            $this->app->redirect('/admin/posts');
        } else {
            $this->app->flashNow('error', 'Wrong username or password');
        }
 
        $this->app->render('/admin/login.php');
        
    }
    
    public function logout () {
        $this->user->logout();
        $this->app->redirect('/admin/login');
    }
}

