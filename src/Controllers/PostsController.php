<?php

namespace App\Controllers;

use \App\Models\PostModel;

class PostsController extends BaseController
{
    
    private $post;
    
    function __construct() {
        parent::__construct();
        $this->post = new PostModel();
    }
    
    public function get () {
        $this->app->render('admin/posts.php', [
            'posts' => $this->post->getAll(),
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
            $result = $this->post->update($id, $data);
        } else {
            $result = $this->post->create($data);
        }
        
        if ($result) {
            $this->app->redirect('/admin/posts');
        } else {
            $this->app->flashNow('error', 'Could not update the post');
        }
        
    }
    
    public function update ($id) {
        
         $data = $this->post->get($id);
        
        // if post request save model
        if ($this->app->request->isPost()) {
            $data = $this->app->request->post();
            $this->save($id, $data);
        }
        
        $this->app->render('admin/post.php', ['data' => $data]);
    }
    
    public function create () {
        
        $data = [];
        
        // if post request save model
        if ($this->app->request->isPost()) {
            $data = $this->app->request->post();
            $this->save(null, $data);
        }
        
        $this->app->render('admin/post.php', ['data' => $data]);
        
    }
   
}

