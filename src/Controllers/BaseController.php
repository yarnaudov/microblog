<?php

namespace App\Controllers;

use \Slim\Slim;

class BaseController
{
    
    protected $app;
    
    public function __construct() {
        $this->app = Slim::getInstance();
    }
    
}

