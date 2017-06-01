<?php

namespace App\Models;
use \Slim\Slim;

class BaseModel
{
    protected $app;
    
    public function __construct() {
        $this->app = Slim::getInstance();
    }
    
}
