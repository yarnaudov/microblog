<?php

use \Slim\Slim;

require_once 'vendor/autoload.php';

$config = require_once 'config.php';

$app = new Slim($config);

// initialize database
$app->container->singleton('db', function () use ($app) {
    try {
        $db = new \App\Database($app->config('database'));
        return $db->connect();
    } catch (\Exception $e) {
        // set flash message
        $app->flashNow('error', $e->getMessage());
    }
});

//initialize session
$app->container->singleton('session', function () use ($app) {
    return new \App\Session($app->config('session.path'), $app->config('session.name'));
});

// admin panel routes
$app->group('/admin', function () use ($app) {
    
    $app->view->setLayout($app->config('layout.admin'));
    
    
    $app->get('/login', '\App\Controllers\AuthController:login');
    $app->post('/login', '\App\Controllers\AuthController:authenticate');
    $app->get('/logout', '\App\Controllers\AuthController:logout');
    
    
    $app->get('/posts', function () use ($app) {
        
        $postModel = new \App\Models\PostModel();
                
        var_dump($postModel->get(1));
        
        $posts = $postModel->getAll();
        
        $app->render('admin/posts.php', ['posts' => $posts]);
    });

    $app->get('/', function () use ($app) {
        
        $users = $app->db->query('SELECT * FROM users');
        foreach ($users as $user) {
            var_dump($user);    
        }
        
        $app->render('admin/dashboard.php');
    });
	
});

// frontend routes
$app->get('/', function ($name) {
    echo "Hello, " . $name;
});

$app->run();