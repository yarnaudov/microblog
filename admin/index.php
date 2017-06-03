<?php

use \Slim\Slim;
use \App\Models\UserModel;

require_once './vendor/autoload.php';

$config = require_once './config.php';

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
            $app->redirect('/login');
        }
    };
});

// append some view data
$app->hook('slim.before.dispatch', function () use($app) {
    $app->view->appendData([
        'isLoggedIn' => UserModel::model()->isLoggedIn(),
        'user' => UserModel::model()->getLogedUser(),
        'isCurrentRoute' => function ($path) use($app) {
            return strpos($app->request->getPath(), $path) !== false;
        }
    ]);
});

// authentication routes
$app->get('/login', '\App\Controllers\Admin\AuthController:login');
$app->post('/login', '\App\Controllers\Admin\AuthController:authenticate');
$app->get('/logout', '\App\Controllers\Admin\AuthController:logout');

// posts routes
$app->get('/posts', $app->protectRoute, '\App\Controllers\Admin\PostsController:get');
$app->map('/posts/edit/:id', $app->protectRoute, '\App\Controllers\Admin\PostsController:update')->via('GET', 'POST')->conditions(['id' => '[0-9]+']);
$app->map('/posts/create', $app->protectRoute, '\App\Controllers\Admin\PostsController:create')->via('GET', 'POST');
$app->map('/posts/delete/:id', $app->protectRoute, '\App\Controllers\Admin\PostsController:delete')->via('GET', 'POST')->conditions(['id' => '[0-9]+']);

// users routes
$app->get('/users', $app->protectRoute, '\App\Controllers\Admin\UsersController:get');
$app->map('/users/edit/:id', $app->protectRoute, '\App\Controllers\Admin\UsersController:update')->via('GET', 'POST')->conditions(['id' => '[0-9]+']);
$app->map('/users/create', $app->protectRoute, '\App\Controllers\Admin\UsersController:create')->via('GET', 'POST');
$app->map('/users/delete/:id', $app->protectRoute, '\App\Controllers\Admin\UsersController:delete')->via('GET', 'POST')->conditions(['id' => '[0-9]+']);

// redirect to posts route
$app->get('/', function () use ($app) {
    $app->redirect('/posts');
});

// API REST
$app->group('/api', function () use ($app) {
    $app->get('/posts', '\App\Controllers\Api\PostsController:getMany');
    $app->get('/posts/:id', '\App\Controllers\Api\PostsController:get')->conditions(['id' => '[0-9]+']);
    //$app->put('/posts/:id', '\App\Controllers\Api\PostsController:update')->conditions(['id' => '[0-9]+']);
    //$app->delete('/posts/:id', '\App\Controllers\Api\PostsController:delete')->conditions(['id' => '[0-9]+']);
    //$app->post('/posts', '\App\Controllers\Api\PostsController:create');
});

$app->run();