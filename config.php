<?php

return [
    'mode' => 'development',
    'debug' => true,
    
    'log.enabled' => true,
    'log.level' => \Slim\Log::WARN,
    
    'templates.path' => './templates',
    'view' => new \App\View(),
    'layout.admin' => 'admin/main.php',
    'layout.site' => 'site/main.php',
    
    'database' => [
        'host' => 'localhost:3306',
        'dbname' => 'blog',
        'user' => 'root',
        'pass' => ''
    ],
    
    'session.path' => 'tmp',
    'session.name' => 'blog_session'
    
];
