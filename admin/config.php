<?php

return [
    'mode' => 'development',
    'debug' => true,
    
    'log.enabled' => true,
    'log.level' => \Slim\Log::WARN,
    
    'templates.path' => './src/templates',
    'view' => new \App\View(),
    
    'database' => [
        'host' => 'localhost:3306',
        'dbname' => 'blog',
        'user' => 'root',
        'pass' => ''
    ],
    
    'session' => [
        'name' => 'blog_session',
        'expires' => '5 minutes',
        'secret' => 'A@zC=wFjPn4fEi#1Q3#rR18Y'
    ]
    
];
