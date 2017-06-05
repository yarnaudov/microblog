<?php

namespace App\Controllers;
use \Slim\Slim;

/**
 * BaseController
 *
 * @property \Slim\Slim $app
 */
class BaseController
{
    /**
     * @var \Slim\Slim
     */
    protected $app;
    
    public function __construct() {
        // get slim app instance
        $this->app = Slim::getInstance();
    }
    
}

