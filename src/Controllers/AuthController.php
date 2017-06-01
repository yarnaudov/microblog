<?php

namespace App\Controllers;

use \App\Models\UserModel;

class AuthController extends BaseController
{
    
    public function login () {
        $this->app->render('admin/login.php');
        
    }
    
    public function authenticate () {
        
        $username = $this->app->request->post('username');
        $password = $this->app->request->post('password');
        
        $userModel = new UserModel();
        
        $user = $userModel->autenticate($username, $password);
        if ($user) {
            // set session
            $this->app->session->set('user', $user);
            $this->app->redirect('dashboard');
        } else {
            $this->app->flashNow('error', 'Wrong username or password');
        }
 
        $this->app->render('admin/login.php');
        
    }
    
    public function logout () {
        $this->app->session->destroy();
        $this->app->redirect('login');
    }
}

