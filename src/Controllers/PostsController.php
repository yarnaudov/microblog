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
    
    public function get ($id) {
        $post = $this->post->get($id);
        $this->app->render('admin/post.php', ['post' => $post]);
    }
    
    public function getAll () {
        $this->app->render('admin/posts.php', [
            'posts' => $this->post->getAll(),
            'getUrl' => function ($id) {
                return $this->app->urlFor('post', ['id' => $id]);
            },
            'dateHelper' => function ($timestamp) {
                $date = new \DateTime();
                $date->setTimestamp($timestamp);
                return $date->format('d M Y H:i');
            }
        ]);
    }
    
    public function update ($id) {
        
        $data = $this->app->request->post();
        
        if ($this->post->update($id, $data)) {
            $this->app->redirect('/admin/posts');
        }
        $this->app->flashNow('error', 'Could not update the post');
    }
   
}

