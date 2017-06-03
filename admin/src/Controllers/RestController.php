<?php

namespace App\Controllers;

use App\Controllers\BaseController;

abstract class RestController extends BaseController
{
    
    abstract public function get ($id);
    
    abstract public function getMany ();
    
    abstract public function update ($id);
    
    abstract public function create ();
    
    abstract public function delete ($id);
    
    public function sendResponse ($data) {
        $this->app->response->headers->set('Content-Type', 'application/json');
        $this->app->response->headers->set('Access-Control-Allow-Origin', '*');
        $this->app->response->setBody(json_encode($data));
    }
    
}

