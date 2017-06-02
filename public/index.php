<?php

use \Slim\Slim;
use \App\Models\UserModel;

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
    return new \App\Session($app->config('session'));
});

//route protect middleware
$app->container->singleton('protectRoute', function () use ($app) {
   return function () use ($app) {
        if (!UserModel::model()->isLoggedIn()) {
            $app->redirect('/admin/login');
        }
    };
});

// admin panel routes
$app->group('/admin', function () use ($app) {
    
    // set layout template
    $app->view->setLayout($app->config('layout.admin'));
    
    // authentication routes
    $app->get('/login', '\App\Controllers\Admin\AuthController:login');
    $app->post('/login', '\App\Controllers\Admin\AuthController:authenticate');
    $app->get('/logout', '\App\Controllers\Admin\AuthController:logout');
    
    // posts routes
    $app->get('/posts', $app->protectRoute, '\App\Controllers\Admin\PostsController:get');
    $app->map('/posts/edit/:id', $app->protectRoute, '\App\Controllers\Admin\PostsController:update')->via('GET', 'POST')->conditions(['id' => '[0-9]+']);
    $app->map('/posts/create', $app->protectRoute, '\App\Controllers\Admin\PostsController:create')->via('GET', 'POST');
	
});

// frontend routes
$app->get('/', function () use ($app) {
    // set layout to false to prevend rendering it
    $app->view->setLayout(false);
    $app->render($app->config('layout.site'));
});
$app->get('/posts', '\App\Controllers\Frontend\PostsController:getMany');
$app->get('/posts/:id', '\App\Controllers\Frontend\PostsController:get')->conditions(['id' => '[0-9]+']);

$app->run();