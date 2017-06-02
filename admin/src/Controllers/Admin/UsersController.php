<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use \App\Models\UserModel;

class UsersController extends BaseController
{
    
    public function get () {
        $this->app->render('users.php', [
            'users' => UserModel::model()->getAll(),
            'dateHelper' => function ($timestamp) {
                // if timestamp is null return empty string 
                if (is_null($timestamp)) {
                    return "";
                }
                $date = new \DateTime();
                $date->setTimestamp($timestamp);
                return $date->format('d M Y H:i');
            }
        ]);
    }
    
    private function validate ($data, $validatePassword = false) {
        $errors = [];
        
        // check name
        if (!isset($data['name']) || empty($data['name'])) {
            $errors['error.name'] = 'Please fill Name';
        } else if (mb_strlen($data['name']) > 100) {
            $errors['error.name'] = 'Name can be maximum 100 characters';
        }
        
        // check username
        if (!isset($data['username']) || empty($data['username'])) {
            $errors['error.username'] = 'Please fill Username';
        } else if (mb_strlen($data['username']) > 20) {
            $errors['error.username'] = 'Username can be maximum 20 characters';
        }
        
        // check email
        if (!isset($data['email']) || empty($data['email'])) {
            $errors['error.email'] = 'Please fill Email';
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['error.email'] = 'Email is not valid';
        } else if (mb_strlen($data['email']) > 20) {
            $errors['error.email'] = 'Email can be maximum 100 characters';
        }
        
        //check password
        if ($validatePassword && (!isset($data['password']) || empty($data['password']))) {
            $errors['error.password'] = 'Please fill Password';
        }
        
        return $errors;
    }   
    
    private function save ($id = null) {
        
        $data = $this->app->request->post();
        
        // validate input data and set flash errors
        $errors = $this->validate($data, $id ? false : true);
        if ($errors) {
            foreach ($errors as $key => $value) {
                $this->app->flashNow($key, $value);
            }
            return false;
        }
        
        if ($id) {
            $result = UserModel::model()->update($id, $data);
        } else {
            $result = UserModel::model()->create($data);
        }
        
        if ($result) {
            $this->app->flash('success', 'User was saved successfuly');
            $this->app->redirect('/users');
        } else {
            $this->app->flashNow('error', 'Could not update user');
        }
        
    }
    
    public function update ($id) {
        
         $data = UserModel::model()->get($id);
        
        // if post request save model
        if ($this->app->request->isPost()) {
            $data = array_merge($data, $this->app->request->post());
            $this->save($id, $data);
        }
        
        $this->app->render('user.php', ['data' => $data]);
    }
    
    public function create () {
        
        $data = [];
        
        // if post request save model
        if ($this->app->request->isPost()) {
            $data = $this->app->request->post();
            $this->save(null, $data);
        }
        
        $this->app->render('user.php', ['data' => $data]);
        
    }
   
    public function delete ($id) {
        if (UserModel::model()->delete($id)) {
            $this->app->flash('error', 'Could not delete user');
        } else {
            $this->app->flash('error', 'User was deleted successfuly');
        }
        $this->app->redirect('/users');
    }
    
}

