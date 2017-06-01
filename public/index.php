<?php

use \Slim\Slim;

require_once '../vendor/autoload.php';

$config = require_once '../config.php';

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

//route protect middleware
$app->container->singleton('protectRoute', function () use ($app) {
   return function () use ($app) {
        $user = new \App\Models\UserModel();
        if (!$user->isLogedIn()) {
            echo "user is not loged in!!!!";
            $app->redirect('login');
        }
    };
});

// admin panel routes
$app->group('/admin', function () use ($app) {
    
    // set layout template
    $app->view->setLayout($app->config('layout.admin'));
    
    // authentication routes
    $app->get('/login', '\App\Controllers\AuthController:login');
    $app->post('/login', '\App\Controllers\AuthController:authenticate');
    $app->get('/logout', '\App\Controllers\AuthController:logout');
    
    // posts routes
    $app->get('/posts/:id', $app->protectRoute, '\App\Controllers\PostsController:get')->name('post')->conditions(['id' => '[0-9]+']);
    $app->get('/posts', $app->protectRoute, '\App\Controllers\PostsController:getAll');
    $app->post('/posts/:id', $app->protectRoute, '\App\Controllers\PostsController:update')->conditions(['id' => '[0-9]+']);
    $app->post('/posts', $app->protectRoute, '\App\Controllers\PostsController:create');
	
});

// frontend routes
$app->get('/', function ($name) {
    echo "Hello, " . $name;
});

$app->run();