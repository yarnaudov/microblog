<?php

namespace App\Models;
use \Slim\Slim;

class BaseModel
{
    protected $db;
    
    public function __construct() {
        $this->db = Slim::getInstance()->db;
    }
    
}
