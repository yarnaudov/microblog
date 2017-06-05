<?php

namespace App\Controllers;
use App\Controllers\BaseController;

/**
 * RestController
 * Implement methods for REST full api
 */
abstract class RestController extends BaseController
{
    
    /**
     * Get item
     * @param int $id Id of item to get
     */
    abstract public function get ($id);
    
    /**
     * Get many items
     */
    abstract public function getMany ();
    
    /**
     * Update item
     * @param int $id Id of item to update
     */
    abstract public function update ($id);
    
    /**
     * Create new item
     */
    abstract public function create ();
    
    /**
     * Delete item
     * @param int $id Id of item to delete
     */
    abstract public function delete ($id);
    
    /**
     * Set response
     * @param mixed $data Data to sent in response
     */
    public function sendResponse ($data) {
        $this->app->response->headers->set('Content-Type', 'application/json');
        $this->app->response->headers->set('Access-Control-Allow-Origin', '*');
        $this->app->response->setBody(json_encode($data));
    }
    
}

