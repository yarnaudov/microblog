<?php

namespace App\Controllers\Api;

use App\Controllers\RestController;
use \App\Models\PostModel;

class PostsController extends RestController
{
    
    public function get ($id) {
        $post = PostModel::model()->get($id);
        
        if (!$post) {
            $this->app->response->setStatus(400);
        }
    
        $this->sendResponse($post);
        
    }
    
    public function getMany () {
        $posts = PostModel::model()->getAll();
        
        if (!$posts) {
            $this->app->response->setStatus(400);
        }
    
        $this->sendResponse($posts);
        
    }
    
    public function update ($id) {
        
    }
    
    public function create () {
        
    }
    
    public function delete ($id) {
        
    }
}
