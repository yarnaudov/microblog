<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use \App\Models\PostModel;

class PostsController extends BaseController
{
    
    public function get () {
        $this->app->render('posts.php', [
            'posts' => PostModel::model()->getAll(),
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
    
    private function validate ($data) {
        $errors = [];
        
        // check title
        if (!isset($data['title']) || empty($data['title'])) {
            $errors['error.title'] = 'Please fill Title';
        } else if (mb_strlen($data['title']) > 200) {
            $errors['error.title'] = 'Title can be maximum 200 characters';
        }
        
        // check brief text
        if (!isset($data['brief_text']) || empty($data['brief_text'])) {
            $errors['error.brief_text'] = 'Please fill Brief text';
        } else if (mb_strlen($data['brief_text']) > 200) {
            $errors['error.brief_text'] = 'Brief text can be maximum 200 characters';
        }
        
        // check text
        if (!isset($data['text']) || empty($data['text'])) {
            $errors['error.text'] = 'Please fill Text';
        }
        
        return $errors;
    }   
    
    private function save ($id = null) {
        
        $data = $this->app->request->post();
        
        // validate input data and set flash errors
        $errors = $this->validate($data);
        if ($errors) {
            foreach ($errors as $key => $value) {
                $this->app->flashNow($key, $value);
            }
            return false;
        }
        
        if ($id) {
            $result = PostModel::model()->update($id, $data);
        } else {
            $result = PostModel::model()->create($data);
        }
        
        if ($result) {
            $this->app->flash('success', 'Post was saved successfuly');
            $this->app->redirect('/posts');
        } else {
            $this->app->flashNow('error', 'Could not update the post');
        }
        
    }
    
    public function update ($id) {
        
         $data = PostModel::model()->get($id);
        
        // if post request save model
        if ($this->app->request->isPost()) {
            $data = array_merge($data, $this->app->request->post());
            $this->save($id, $data);
        }
        
        $this->app->render('post.php', ['data' => $data]);
    }
    
    public function create () {
        
        $data = [];
        
        // if post request save model
        if ($this->app->request->isPost()) {
            $data = $this->app->request->post();
            $this->save(null, $data);
        }
        
        $this->app->render('post.php', ['data' => $data]);
        
    }
   
    public function delete ($id) {
        if (PostModel::model()->delete($id)) {
            $this->app->flash('error', 'Could not delete the post');
        } else {
            $this->app->flash('error', 'Post was deleted successfuly');
        }
        $this->app->redirect('/posts');
    }
    
}

