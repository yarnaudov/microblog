<?php

namespace App\Models;
use \Slim\Slim;

/**
 * BaseModel
 *
 * @property \Slim\Slim $app
 */
class BaseModel
{
    
    /*
     * @var \Slim\Slim
     */
    protected $app;
    
    public function __construct() {
        // get slim app instance
        $this->app = Slim::getInstance();
    }
    
}
